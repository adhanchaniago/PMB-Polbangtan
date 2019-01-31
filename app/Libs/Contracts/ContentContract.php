<?php

namespace App\Libs\Contracts;

interface ContentContract
{
    public function createContent(String $key, array $data);

    public function destroyDokumen(int $id);

    public function getContentByKey(String $key);

    public function getDokumen();
}