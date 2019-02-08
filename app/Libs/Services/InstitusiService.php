<?php

namespace App\Libs\Services;

use App\Institusi;
use App\Libs\Contracts\InstitusiContract;

class InstitusiService implements InstitusiContract
{
    private $model;

    public function __construct(Institusi $model)
    {
        $this->model = $model;
    }

    public function getAllInstitusi()
    {
    	return $this->model->all();
    }

    public function getOnlyCabang()
    {
    	return $this->model->where('id', '>', 1)->get();
    }
}
