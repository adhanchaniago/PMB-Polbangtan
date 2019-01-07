<?php

namespace App\Libs\Services;

use App\VerifikasiDetail;
use App\Libs\Contracts\VerifikasiDetailContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class VerifikasiDetailService implements VerifikasiDetailContract
{
    private $model;

    public function __construct(VerifikasiDetail $model)
    {
        $this->model = $model;
    }

    /**
     * [createDetail]
     * @param  array  $data
     * @return VerifikasiDetail
     */
    public function createDetail(array $data) : VerifikasiDetail
    {
    	return $this->model->createDetail($data);
    }

    /**
     * [updateDetail]
     * @param  int    $id
     * @param  array  $data
     * @return VerifikasiDetail
     */
    public function updateDetail(int $id, array $data) : VerifikasiDetail
    {
    	$this->model->updateDetail($id, $data);
    }

}
