<?php

namespace App\Libs\Contracts;

interface PegawaiContract
{
    public function createPegawai(array $data);

    public function getPegawai();

    public function updatePegawai(int $id, array $data);
}