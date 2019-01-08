<?php

namespace App\Libs\Services;

use App\Libs\Contracts\PendaftaranDetailContract;
use App\PendaftaranDetail;

class PendaftaranDetailService implements PendaftaranDetailContract
{
    private $model;

    public function __construct(PendaftaranDetail $model)
    {
        $this->model = $model;
    }

    public function createPendaftaranDetail(array $data)
    {
        $this->model->createPendaftaranDetail($data);
    }

    public function getPendaftaranDetailByPendaftaran(int $pendaftaranId)
    {
        return $this->model->where('pendaftaran_id', $pendaftaranId)->get();
    }

    public function updatePendaftaranDetailByKey(String $key, array $data)
    {
        $this->model->where('key', $key)->update($data);
    }
}
