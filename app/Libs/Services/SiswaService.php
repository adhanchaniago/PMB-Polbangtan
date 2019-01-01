<?php

namespace App\Libs\Services;

use App\Siswa;
use App\Libs\Contracts\SiswaContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SiswaService implements SiswaContract
{
    private $model;

    public function __construct(Siswa $model)
    {
        $this->model = $model;
    }

    /**
     * [createSiswa]
     * @param  array  $data
     * @return Siswa
     */
    public function createSiswa(String $nama) : Siswa
    {
    	return $this->model->createSiswa([
	        'nama' => $nama
    	]);
    }

    /**
     * [getSiswaById]
     * @param  int    $id
     * @return Pelamar
     */
    public function getSiswaById(int $id) : ?Siswa
    {
    	return $this->model->findOrFail($id);
    }

    /**
     * [updateSiswa]
     * @param  int    $id
     * @param  array  $data
     */
    public function updateSiswa(int $id, Request $request) : Void
    {
    	$data = $request->except(['_token', '_method']);

    	if ( $request->has('foto') ) {
        	$data['foto'] = $request->file('foto')->store("siswa/$id");
    	}
    	if ( $request->has('ktp') ) {
        	$data['ktp'] = $request->file('ktp')->store("siswa/$id");    		
    	}
    	if ( $request->has('ijazah') ) {
        	$data['ijazah'] = $request->file('ijazah')->store("siswa/$id");
    	}
    	if ( $request->has('sk_sehat') ) {
        	$data['sk_sehat'] = $request->file('sk_sehat')->store("siswa/$id");
    	}
    	if ( $request->has('sk_tidak_hamil') ) {
	        $data['sk_tidak_hamil'] = $request->file('sk_tidak_hamil')->store("siswa/$id");
    	}

        $this->model->updateSiswa($id, $data);
    }
}
