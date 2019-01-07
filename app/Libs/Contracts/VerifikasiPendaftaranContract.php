<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface VerifikasiPendaftaranContract
{
    public function createVerifikasi(array $data);

    public function updateVerifikasi(int $id, array $data);
}