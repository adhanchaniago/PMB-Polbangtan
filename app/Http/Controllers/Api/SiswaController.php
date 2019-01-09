<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\Services\SiswaService;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request, SiswaService $service)
    {
        $filter = $request->q == '' ? '%' : $request->q;
        return response()->json($service->paginateSiswa($filter));
    }

}
