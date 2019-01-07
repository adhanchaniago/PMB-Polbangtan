<?php

namespace App\Libs\Services;

use App\PendaftaranDokumen;
use App\Libs\Contracts\PendaftaranDokumenContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PendaftaranDokumenService implements PendaftaranDokumenContract
{
    private $model;

    public function __construct(PendaftaranDokumen $model)
    {
        $this->model = $model;
    }

    public function createPendaftaranDokumen(int $pendaftaranId, Request $request) : Void
    {
    	$data = $request->except(['_token']);
    	foreach ($data as $key => $value) {
    		if ( $request->hasFile($key) ) {
    			$value = $request->file($key)->store("pendaftaran");
    		}
	    	$this->model->createPendaftaranDokumen([
	    		'pendaftaran_id' => $pendaftaranId,
	    		'key' => $key,
	    		'value' => $value
	    	]);
    	}
    }
}
