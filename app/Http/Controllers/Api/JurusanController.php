<?php

namespace App\Http\Controllers\Api;

use App\Jurusan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function getJurusanByInstitusi($id) : ?Array
    {
    	return Jurusan::where('institusi_id', $id)->get()->toArray();
    }

    public function getJurusanBySekolah($id) : ?Array
    {
    	return config('pendidikan.jurusan.' . $id);
    }
}
