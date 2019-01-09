<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface SiswaContract
{
    public function createSiswa(String $nama);

    public function getSiswaById(int $id);

    public function paginateSiswa(String $keyword);

    public function updateSiswa(int $id, Request $request);
}