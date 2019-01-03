<?php

namespace App\Http\Controllers;

use App\Institusi;
use App\Jurusan;
use App\Libs\Services\PendaftaranService;
use App\Libs\Services\PendaftaranDokumenService;
use App\Libs\Traits\InfoPendaftaran;
use App\Libs\Traits\InfoSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class PendaftaranController extends Controller
{
	use InfoSiswa, InfoPendaftaran;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PendaftaranService $service)
    {
    	$pendaftaran = [];
    	$access = $this->cekKelengkapanDokumen();

    	if ( $access ) {
    		$pendaftaran = $this->getPendaftaran();

    		if ( $pendaftaran !== null ) {
				$pendaftaran['jalur_label'] = ucwords(str_replace("-", " ", $pendaftaran->jalur));
    		}
    	}

        return view('pendaftaran.index', [
        	'access' => $access,
        	'data' => $pendaftaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, PendaftaranService $service)
    {
    	$this->validate($request,[
            'jalur' => 'required'
        ]);

    	$service->createPendaftaran([
    		'siswa_id' => $user = auth()->user()->person_id,
    		'jalur' => $request->jalur
    	]);

        return redirect()->route('pilih-jalur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, String $jalur, PendaftaranService $service)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PendaftaranService $service)
    {
        $service->updatePendaftaran($id, ['state' => 'cancel']);

        return Redirect::to('pendaftaran');
    }

    public function jalur()
    {
		$pendaftaran = $this->getPendaftaran();

		if ( $pendaftaran->state != 'start' ) {
	        return Redirect::to('pendaftaran')->withError('Anda tidak dapat memilih jalur');
		}

    	$view  = 'jalur-' . $pendaftaran->jalur;
    	$jalur = str_replace("-", " ", $pendaftaran->jalur);
    	$title = "Pendaftaran Mahasiswa Baru Jalur " . ucwords($jalur);

        return view('pendaftaran.jalur', [
        	'title' => $title,
        	'view' => $view
        ]);
    }

    public function store_jalur(Request $request, PendaftaranService $service,
    	PendaftaranDokumenService $d_service)
    {
    	$pendaftaran = $this->getPendaftaran();
    	$cekPersyaratan = $this->cekPersyaratan($pendaftaran->jalur, $request->all());
    	
    	if ( $cekPersyaratan == '') {
    		DB::transaction(function() use ($request, $pendaftaran, $service, $d_service) {
	    		//Update pendaftaran (state)
	    		$this->updateState($pendaftaran->id, 'menyelesaikan_pemberkasan');

	    		//Simpan dokumen
    			$d_service->createPendaftaranDokumen($pendaftaran->id, $request);
    		});
    	} else {
    		if ( $pendaftaran->jalur == 'undangan-petani' ||
    			 $pendaftaran->jalur == 'undangan-smk' ) {
	    		DB::transaction(function() use ($request, $pendaftaran, $service, $d_service, $cekPersyaratan) {
		    		//Update pendaftaran (state)
		    		$this->updateState($pendaftaran->id, 'menyelesaikan_pemberkasan');
		    		$service->updatePendaftaran($pendaftaran->id, ['keterangan' => $cekPersyaratan]);

		    		//Simpan dokumen
	    			$d_service->createPendaftaranDokumen($pendaftaran->id, $request);
	    		});
    		} else {
				return Redirect::to('pendaftaran')->withError($cekPersyaratan);
    		}
    	}

    	return redirect()->route('pilih-jurusan');
    }

    public function jurusan()
    {
    	$pendaftaran = $this->getPendaftaran();
		if ( $pendaftaran->state != 'pemilihan_jurusan' ) {
	        return Redirect::to('pendaftaran')->withError('Anda tidak dapat memilih jurusan');
		}

    	$institusi = Institusi::all();
    	$jurusan = Jurusan::where('institusi_id', $institusi[0]->id)->get();

    	return view('pendaftaran.jurusan', [
    		'institusi' => $institusi,
    		'jurusan' => $jurusan
    	]);
    }

    public function store_jurusan(Request $request, PendaftaranService $service)
    {
    	$data = $request->only(['institusi', 'jurusan_1', 'jurusan_2']);

    	if ( $data['jurusan_1'] == $data['jurusan_2'] ) {
    		return redirect()->back()->withError('Jurusan tidak boleh sama');
    	}

    	$pendaftaran = $this->getPendaftaran();
		DB::transaction(function() use ($data, $pendaftaran, $service) {
	    	$service->updatePendaftaran($pendaftaran->id, [
	    		'institusi' => $data['institusi'],
	    		'jurusan_1' => $data['jurusan_1'],
	    		'jurusan_2' => $data['jurusan_2']
	    	]);
			$this->updateState($pendaftaran->id, 'mereview_pendaftaran');
		});

		return redirect()->route('pendaftaran.resume');
    }

    public function resume()
    {

    	return view('pendaftaran.resumea');
    }
}
