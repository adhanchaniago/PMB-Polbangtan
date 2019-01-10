<?php

namespace App\Libs\Traits;

use App\Institusi;

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
}
