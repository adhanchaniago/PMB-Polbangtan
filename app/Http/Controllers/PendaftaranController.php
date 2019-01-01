<?php

namespace App\Http\Controllers;

use App\Libs\Services\PendaftaranService;
use App\Libs\Traits\InfoSiswa;
use Illuminate\Http\Request;
use Redirect;

class PendaftaranController extends Controller
{
	use InfoSiswa;

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
    public function destroy($id)
    {
        //
    }

    public function jalur(PendaftaranService $service)
    {
		$pendaftaran = $this->getPendaftaran();

    	$view  = 'jalur-' . $pendaftaran->jalur;
    	$jalur = str_replace("-", " ", $pendaftaran->jalur);
    	$title = "Pendaftaran Mahasiswa Baru Jalur " . ucwords($jalur);

        return view('pendaftaran.jalur', [
        	'title' => $title,
        	'view' => $view
        ]);
    }

    public function store_jalur(Request $request, PendaftaranService $service)
    {
    	$pendaftaran = $this->getPendaftaran();
    	dd($pendaftaran);
    	dd($request->all());
    }

    public function jurusan()
    {
    	return view('pendaftaran.jurusan');
    }

    public function success()
    {
    	return view('pendaftaran.success');
    }    
}
