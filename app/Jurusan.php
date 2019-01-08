<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $guarded = [];

    public static function selectName(int $jurusanId) : String
    {
        $jurusan = Jurusan::findOrFail($jurusanId);

        return $jurusan->nama;
    }
}
