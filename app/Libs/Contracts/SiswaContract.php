<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface SiswaContract
{
    public function createSiswa(String $nama);

    public function getSiswaById(int $id);

    public function updateSiswa(int $id, Request $request);
}