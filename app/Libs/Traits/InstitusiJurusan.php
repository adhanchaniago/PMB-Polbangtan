<?php

namespace App\Libs\Traits;

use App\Jurusan;

trait InstitusiJurusan
{
    protected function getJurusan($institusiId)
    {
        return Jurusan::where('institusi_id', $institusiId)->get();
    }

    protected function getJurusanName($jurusanId)
    {
        return Jurusan::selectName($jurusanId);
    }
}
