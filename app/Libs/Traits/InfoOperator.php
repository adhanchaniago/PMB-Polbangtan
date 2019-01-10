<?php

namespace App\Libs\Traits;

use App\Institusi;
use App\Jurusan;

trait InfoOperator
{
    protected function getOperatorInfo()
    {
        return auth()->user()->person;
    }

    protected function getInstitusi()
    {
        $operator = auth()->user()->person;
        $institusi = Institusi::findOrFail($operator->institusi_id);

        return $institusi;
    }

    protected function getJurusan($institusiId)
    {
        return Jurusan::where('institusi_id', $institusiId)->get();
    }
}
