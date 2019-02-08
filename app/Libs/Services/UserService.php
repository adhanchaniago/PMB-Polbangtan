<?php

namespace App\Libs\Services;

use App\User;
use App\Libs\Contracts\UserContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserService implements UserContract
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * [createUser]
     * @param  array  $data
     * @return User
     */
    public function createUser(array $data)
    {
    	return $this->model->createUser($data);
    }

    /**
     * [getUserByEmail]
     * @param  String $email
     */
    public function getUserByEmail(String $email)
    {
    	return $this->model->whereEmail($email)->first();
    }

    /**
     * [searchUser]
     * @param  array  $filter
     * @return Collection : null
     */
    public function searchUser(array $filter)
    {
    	return $this->model->querySearch($filter);
    }

    /**
     * @param int $id
     * @param array $data
     * @return User
     */
    public function updateUser(int $id, array $data)
    {
    	return $this->model->updateUser($id, $data);
    }

    public function updateUserPegawai(int $personId, array $data)
    {
    	return $this->model->updateUserPegawai($personId, $data);
    }

    public function updateUserSiswa(int $personId, array $data)
    {
    	return $this->model->updateUserSiswa($personId, $data);    	
    }
}
