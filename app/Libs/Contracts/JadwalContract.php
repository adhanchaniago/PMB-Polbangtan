<?php

namespace App\Libs\Contracts;

interface JadwalContract
{
    public function createJadwal(array $data);

    public function deleteJadwal(int $id);

    public function getJadwal();

    public function updateJadwal(int $id, array $data);
}