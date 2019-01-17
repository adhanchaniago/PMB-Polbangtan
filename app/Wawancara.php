<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    protected $guarded = [];

    public function pendaftaran()
    {
        return $this->hasOne('App\Pendaftaran', 'no_pendaftaran', 'no_pendaftaran');
    }
}
