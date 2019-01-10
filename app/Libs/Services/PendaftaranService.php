<?php

namespace App\Libs\Services;

use App\Pendaftaran;
use App\Libs\Contracts\PendaftaranContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PendaftaranService implements PendaftaranContract
{
    private $model;

    public function __construct(Pendaftaran $model)
    {
        $this->model = $model;
    }

    public function createPendaftaran(array $data) : Void
    {
    	$this->model->createPendaftaran($data);
    }

    public function getPendaftaranById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function getPendaftaranBySiswa(int $siswaId) : ?Collection
    {
    	return $this->model->querySearch(['siswa_id' => $siswaId]);
    }

    public function paginatePendaftaran(array $filter)
    {
        return $this->model->paginatePendaftaran($filter);
    }

    public function searchPendaftaran(array $filter)
    {
        return $this->model->querySearch($filter);
    }

    public function updatePendaftaran(int $id, array $data)
    {
    	$this->model->updatePendaftaran($id, $data);
    }
}
