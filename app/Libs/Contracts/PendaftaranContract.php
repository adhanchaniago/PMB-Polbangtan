<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface PendaftaranContract
{
    public function createPendaftaran(array $data);

    public function getPendaftaranBySiswa(int $siswaId);

    public function updatePendaftaran(int $id, array $data);
}