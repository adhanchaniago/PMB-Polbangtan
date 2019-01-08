<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface PendaftaranDetailContract
{
    public function createPendaftaranDetail(array $data);

    public function getPendaftaranDetailByPendaftaran(int $pendaftaranId);

    public function updatePendaftaranDetailByKey(String $key, array $data);
}