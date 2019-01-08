<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftaranDetail extends Model
{
    protected $guarded = [];

    public static function createPendaftaranDetail(array $data)
    {
	    return PendaftaranDetail::create($data);
    }
}
