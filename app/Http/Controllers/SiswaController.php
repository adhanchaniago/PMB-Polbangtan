<?php

namespace App\Http\Controllers;

use App\Libs\Services\SiswaService;
use Illuminate\Http\Request;
use Redirect;

class SiswaController extends Controller
{
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $data = $request->user()->person;

        return view('siswa.show', [
        	'data' => $data
        ]);
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
    public function update(Request $request, $id, SiswaService $service)
    {
    	$this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
        	'provinsi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'max:2000',
            'ktp' => 'max:2000',
            'nisn' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'no_ijazah' => 'required',
            'tahun_lulus' => 'required|numeric',
            'ijazah' => 'max:2000',
            'tinggi_badan' => 'required|numeric',
            'sk_sehat' => 'max:2000',
            'sk_tidak_hamil' => 'max:2000',
        ]);

        
    	$service->updateSiswa($id, $request);

        return Redirect::to('siswa/'.$id)->withSuccess('Data siswa berhasil diperbaharui');
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
}
