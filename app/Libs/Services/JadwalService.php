<?php

namespace App\Libs\Services;

use App\Jadwal;
use App\Libs\Contracts\JadwalContract;

class JadwalService implements JadwalContract
{
    private $model;

    public function __construct(Jadwal $model)
    {
        $this->model = $model;
    }

    public function createJadwal(array $data)
    {
    	return $this->model->create($data);
    }

    public function deleteJadwal(int $id)
    {
    	return $this->model->findOrFail($id)->delete();
    }

    public function getJadwal()
    {
    	return $this->model->get();
    }

    public function updateJadwal(int $id, array $data)
    {
    	return $this->model->findOrFail($id)->update($data);
    }    
}
