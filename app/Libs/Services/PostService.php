<?php

namespace App\Libs\Services;

use App\Post;
use App\Libs\Contracts\PostContract;

class PostService implements PostContract
{
    private $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function createPost(array $data)
    {
    	return $this->model->create($data);
    }

    public function deletePost(int $id)
    {

    }

    public function getPost(array $filter, int $limit)
    {
    	return $this->model->querySearch($filter, $limit);
    }

    public function getPostById(int $id)
    {
    	return $this->model->findOrFail($id);
    }

    public function updatePost(int $id, array $data)
    {
    	return $this->model->findOrFail($id)->update($data);
    }
}
