<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface UserContract
{
	public function createUser(array $data);
	
    public function getUserByEmail(String $email);

    public function searchUser(array $filter);

    public function updateUser(int $id, array $data);
}