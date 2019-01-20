<?php

namespace App\Libs\Services;

use App\Pegawai;
use App\Libs\Contracts\PegawaiContract;

class PegawaiService implements PegawaiContract
{
    private $model;

    public function __construct(Pegawai $model)
    {
        $this->model = $model;
    }

    public function createPegawai(array $data)
    {
    	return $this->model->create($data);
    }

    public function getPegawai()
    {
    	return $this->model->get();
    }

    public function updatePegawai(int $id, array $data)
    {
    	return $this->model->findOrFail($id)->update($data);
    }
}
