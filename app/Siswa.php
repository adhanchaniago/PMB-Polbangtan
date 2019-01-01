<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public static function createSiswa(array $data)
    {
	    return Siswa::create($data);
    }

    public static function updateSiswa(int $id, array $data)
    {
    	$siswa = Siswa::findOrFail($id);
    	$siswa->update($data);
	    return $siswa;
    }
}
