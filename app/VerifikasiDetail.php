<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiDetail extends Model
{
    protected $guarded = [];

    public function verifikasi()
    {
    	return $this->hasOne('App\Verifikasi', 'id', 'verifikasi_id');
    }

    public static function createDetail(array $data)
    {
	    return VerifikasiDetail::create($data);
    }

    public static function updateDetail(int $id, array $data)
    {
    	$verifikasi = VerifikasiDetail::findOrFail($id);
    	$verifikasi->update($data);
	    return $verifikasi;
    }
}
