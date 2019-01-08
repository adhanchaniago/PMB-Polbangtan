<?php

namespace App\Libs\Services;

use App\Prestasi;
use App\Libs\Contracts\PrestasiContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PrestasiService implements PrestasiContract
{
    private $model;

    public function __construct(Prestasi $model)
    {
        $this->model = $model;
    }

    /**
     * [createPrestasi description]
     * @param  array  $data [description]
     * @return Prestasi
     */
    public function createPrestasi(array $data) : Prestasi
    {
    	return $this->model->createPrestasi($data);
    }

    /**
     * @param int $pendaftaranId
     * @return Collection|null
     */
    public function getPrestasiByPendaftaran(int $pendaftaranId) : ?Collection
    {
    	return $this->model->where('pendaftaran_id', $pendaftaranId)->get();
    }

    /**
     * @param int $id
     * @param array $data
     * @return Void
     */
    public function updatePrestasi(int $id, array $data)
    {
        $this->model->updatePrestasi($id, $data);
    }

    /**
     * @param int $id
     */
    public function deletePrestasi(int $id)
    {
    	$this->model->deletePrestasi($id);
    }
}
