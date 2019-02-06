<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface UserContract
{
	public function createUser(array $data);
	
    public function getUserByEmail(String $email);

    public function searchUser(array $filter);

    public function updateUser(int $id, array $data);

    public function updateUserPegawai(int $personId, array $data);

    public function updateUserSiswa(int $personId, array $data);
}