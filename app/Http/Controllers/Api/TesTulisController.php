<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\Services\PendaftaranService;
use App\Libs\Traits\InfoOperator;
use Illuminate\Http\Request;

class TesTulisController extends Controller
{
    use InfoOperator;

    public function index(Request $request, PendaftaranService $service)
    {
        $institusi = $this->getInstitusi();

        return response()->json($service->paginatePendaftaran([
            'institusi' => $institusi->id,
            'state' => 'tes_tulis'
        ]));
    }
}
