<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiPendaftaran extends Model
{
	protected $guarded = [];
	
    public function verifikasi_detail()
    {
    	return $this->hasMany('App\VerifikasiDetail', 'id', 'verifikasi_id');
    }

    public static function createVerifikasi(array $data)
    {
	    return VerifikasiPendaftaran::updateOrCreate([
	    	'pendaftaran_id' => $data['pendaftaran_id']
	    ], $data);
    }

    public static function updateVerifikasi(int $id, array $data)
    {
    	$verifikasi = VerifikasiPendaftaran::findOrFail($id);
    	$verifikasi->update($data);
	    return $verifikasi;
    }
}
