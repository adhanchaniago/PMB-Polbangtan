<?php

namespace App\Libs\Contracts;

interface ContentContract
{
    public function createContent(String $key, array $data);

    public function getContentByKey(String $key);
}