<?php

namespace App\Libs\Services;

use App\VerifikasiPendaftaran;
use App\Libs\Contracts\VerifikasiPendaftaranContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class VerifikasiPendaftaranService implements VerifikasiPendaftaranContract
{
    private $model;

    public function __construct(VerifikasiPendaftaran $model)
    {
        $this->model = $model;
    }

    /**
     * [createVerifikasi]
     * @param  array  $data
     * @return VerifikasiPendaftaran
     */
    public function createVerifikasi(array $data) : VerifikasiPendaftaran
    {
    	return $this->model->createVerifikasi($data);
    }

    /**
     * [updateVerifikasi]
     * @param  int    $id
     * @param  array  $data
     * @return VerifikasiPendaftaran
     */
    public function updateVerifikasi(int $id, array $data) : VerifikasiPendaftaran
    {
    	$this->model->updateVerifikasi($id, $data);
    }
}
