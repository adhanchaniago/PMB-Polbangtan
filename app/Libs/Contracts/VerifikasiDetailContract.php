<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface VerifikasiDetailContract
{
    public function createDetail(array $data);

    public function updateDetail(int $id, array $data);
}