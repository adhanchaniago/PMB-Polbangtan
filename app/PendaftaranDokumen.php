<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftaranDokumen extends Model
{
    protected $guarded = [];

    public static function createPendaftaranDokumen(array $data)
    {
	    return PendaftaranDokumen::create($data);
    }
}
