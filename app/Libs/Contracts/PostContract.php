<?php

namespace App\Libs\Contracts;

interface PostContract
{
    public function createPost(array $data);

    public function deletePost(int $id);

    public function getPost(array $filter, int $limit);

    public function getPostById(int $id);

    public function updatePost(int $id, array $data);
}