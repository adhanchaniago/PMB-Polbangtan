<?php

namespace App\Http\Controllers;

use App\Libs\Services\PrestasiService;
use App\Libs\Traits\InfoSiswa;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
	use InfoSiswa;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PrestasiService $service)
    {
		$pendaftaran = $this->getPendaftaran();

        $data = $request->except(['_token']);
        $data['pendaftaran_id'] = $pendaftaran->id;
        $data['val_tingkat'] = $this->get_tingkat_value($data['tingkat']);
        $data['val_kepesertaan'] = $this->get_kepesertaan_value($data['kepesertaan']);
        $data['val_prestasi'] = $this->get_prestasi_value($data['prestasi']);
        $data['nilai_prestasi'] = $data['val_tingkat'] * ( $data['val_kepesertaan'] + $data['val_prestasi']);

        $service->createPrestasi($data);

        return redirect()->back()->withSuccess('Data prestasi berhasil ditambahkan');
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
    public function update(Request $request, $id, PrestasiService $service)
    {
		$pendaftaran = $this->getPendaftaran();

        $data = $request->except(['_method', '_token']);
        $data['pendaftaran_id'] = $pendaftaran->id;
        $data['val_tingkat'] = $this->get_tingkat_value($data['tingkat']);
        $data['val_kepesertaan'] = $this->get_kepesertaan_value($data['kepesertaan']);
        $data['val_prestasi'] = $this->get_prestasi_value($data['prestasi']);
        $data['nilai_prestasi'] = $data['val_tingkat'] * ( $data['val_kepesertaan'] + $data['val_prestasi']);

        $service->updatePrestasi($id, $data);

        return redirect()->back()->withSuccess('Data prestasi berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PrestasiService $service)
    {
        $service->deletePrestasi($id);
        return redirect()->back()->withSuccess('Data prestasi berhasil dihapus');        
    }

    private function get_tingkat_value(String $tingkat) : float
    {
    	switch ($tingkat) {
    		case 'Sekolah':
    			return 1.0;
    			break;
    		
    		case 'Kecamatan':
    			return 1.5;
    			break;

    		case 'Kabupaten':
    			return 3.0;
    			break;

    		case 'Provinsi':
    			return 6.0;
    			break;

    		case 'Nasional':
    			return 12.0;
    			break;

    		case 'Internasional':
    			return 24.0;
    			break;
    	}
    }

    private function get_kepesertaan_value(String $kepesertaan) : int
    {
    	switch ($kepesertaan) {
    		case 'Perorangan':
    			return 20;
    			break;
    		
    		case 'Beregu':
    			return 15;
    			break;
    	}
    }

    private function get_prestasi_value(String $prestasi) : int
    {
    	switch ($prestasi) {
    		case 'Juara 1':
    			return 100;
    			break;
    		
    		case 'Juara 2':
    			return 80;
    			break;

    		case 'Juara 3':
    			return 40;
    			break;

    		case 'Harapan 1':
    			return 20;
    			break;

    		case 'Harapan 2':
    			return 10;
    			break;
    	}
    }
}
