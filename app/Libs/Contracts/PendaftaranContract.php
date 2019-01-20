<?php

namespace App\Libs\Contracts;

interface PendaftaranContract
{
    public function createPendaftaran(array $data);

    public function getPendaftaranBySiswa(int $siswaId);

    public function getPendaftaranById(int $id);

    public function getPendaftaranGroupByInstitusi(array $filter);

    public function paginatePendaftaran(array $filter);

    public function updatePendaftaran(int $id, array $data);
}