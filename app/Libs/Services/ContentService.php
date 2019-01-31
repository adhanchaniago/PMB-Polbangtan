<?php

namespace App\Libs\Services;

use App\Content;
use App\Libs\Contracts\ContentContract;

class ContentService implements ContentContract
{
    private $model;

    public function __construct(Content $model)
    {
        $this->model = $model;
    }

    public function createContent(String $key, array $data)
    {
    	return $this->model->updateOrCreate(['key' => $key], $data);
    }

    public function destroyDokumen(int $id)
    {
    	$this->model->findOrFail($id)->delete();
    }

    public function getContentByKey(String $key)
    {
    	return $this->model->where('key', $key)->first();
    }

    public function getDokumen()
    {
    	return $this->model->where('key', 'dokumen-pmb')->get();
    }
}
