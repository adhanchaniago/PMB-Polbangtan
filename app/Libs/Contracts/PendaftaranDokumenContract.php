<?php

namespace App\Libs\Contracts;

use Illuminate\Http\Request;

interface PendaftaranDokumenContract
{
    public function createPendaftaranDokumen(int $pendaftaranId, Request $request);
}