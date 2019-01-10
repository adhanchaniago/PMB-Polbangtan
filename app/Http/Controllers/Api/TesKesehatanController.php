<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\Services\PendaftaranService;
use Illuminate\Http\Request;

class TesKesehatanController extends Controller
{
    public function index(Request $request, PendaftaranService $service)
    {
        return response()->json($service->paginatePendaftaran([
            'state' => 'tes_kesehatan'
        ]));
    }
}
