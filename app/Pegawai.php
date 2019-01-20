<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $guarded = [];

    public function minstitusi()
    {
        return $this->hasOne('App\Institusi', 'id', 'institusi_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'person_id');
    }
}
