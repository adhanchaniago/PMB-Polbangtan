<?php

namespace App\Http\Controllers;

use App\Libs\Services\ContentService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
	protected $service;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ContentService $service)
    {
    	$page = $request->page;
    	$this->service = $service;

    	switch ($page) {
    		case 'homepage':
    			$view = $this->homepage();
    			break;

    		case 'informasi-pendaftaran':
    			$view = $this->informasiPendaftaran();
    			break;

    		case 'brosur-pmb':
    			$view = $this->brosur();
    			break;
    	}

    	return $view;
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
    public function store(Request $request, ContentService $service)
    {
        $data = $request->konten;
        foreach ($data as $key => $value) {
        	if($key == 'brosur-pmb') {
        		$value = $value->store($key);
        	}
        	$service->createContent($key, [
        		'key' => $key,
        		'value' => $value
        	]);
        }

        return redirect()->back()->withSuccess('Konten berhasil diperbaharui');
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

    private function homepage()
    {
    	$data['judul'] = $this->service->getContentByKey('judul')->value;
    	$data['sub'] = $this->service->getContentByKey('sub-judul')->value;
    	$data['deskripsi'] = $this->service->getContentByKey('deskripsi')->value;
    	$data['countdown'] = $this->service->getContentByKey('countdown')->value;
    	$data['alamat'] = $this->service->getContentByKey('alamat')->value;
    	$data['telepon'] = $this->service->getContentByKey('no-telepon')->value;

        return view('cms.homepage', $data);
    }

    private function informasiPendaftaran()
    {
    	$data['informasi'] = $this->service->getContentByKey('informasi-pendaftaran')->value;

        return view('cms.informasi', $data);
    }

    private function brosur()
    {
    	$data['brosur'] = $this->service->getContentByKey('brosur-pmb')->value;

        return view('cms.brosur', $data);
    }
}
