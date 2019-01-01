<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurusanController extends Controller
{
    public function getJurusanByInstitusi($id) : ?Array
    {
    	return config('institusi.jurusan.' . $id);
    }

    public function getJurusanBySekolah($id) : ?Array
    {
    	return config('pendidikan.jurusan.' . $id);
    }
}
