<?php

namespace App\Http\Controllers;

use App\Libs\Services\JadwalService;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JadwalService $service)
    {
    	$data = $service->getJadwal();

        return view('jadwal.index', ['data' => $data]);
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
    public function store(Request $request, JadwalService $service)
    {
        $data = $request->except('_token');
        $service->createJadwal($data);

        return redirect()->to('jadwal')->withSuccess('Data jadwal berhasil ditambahkan');
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
    public function update(Request $request, $id, JadwalService $service)
    {
        $data = $request->except(['_token', '_method']);
        $service->updateJadwal($id, $data);

        return redirect()->to('jadwal')->withSuccess('Data jadwal berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, JadwalService $service)
    {
        $service->deleteJadwal($id);
        return redirect()->to('jadwal')->withSuccess('Data jadwal berhasil dihapus');
    }
}
