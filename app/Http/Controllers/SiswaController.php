<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Libs\Services\SiswaService;
use App\Libs\Traits\InfoSiswa;
use Illuminate\Http\Request;
use PDF, Redirect;

class SiswaController extends Controller
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

    public function kartu(Request $request)
    {
        $siswa = $request->user()->person;
        $pendaftaran = $this->getPendaftaran();
        $pendaftaran['jurusan_1_label'] = Jurusan::selectName($pendaftaran->jurusan_1);
        $pendaftaran['jurusan_2_label'] = Jurusan::selectName($pendaftaran->jurusan_2);

        $pdf = PDF::loadView('siswa.kartu', [
            'siswa' => $siswa,
            'pendaftaran' => $pendaftaran
        ]);
        return $pdf->stream();
    }
}
