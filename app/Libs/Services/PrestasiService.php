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
     * [getPrestasiByPendaftaran description]
     * @param  int    $pendaftaranId [description]
     * @return Collection
     */
    public function getPrestasiByPendaftaran(int $pendaftaranId) : ?Collection
    {
    	return $this->model->where('pendaftaran_id', $pendaftaranId)->get();
    }

    /**
     * [updatePrestasi description]
     * @param  int    $id   [description]
     * @param  array  $data [description]
     */
    public function updatePrestasi(int $id, array $data) : Void
    {
        $this->model->updatePrestasi($id, $data);
    }

    /**
     * [deletePrestasi description]
     * @param  int    $id [description]
     */
    public function deletePrestasi(int $id) : Void
    {
    	$this->model->deletePrestasi($id);
    }
}
