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

    public function createPendaftaranDokumen(Request $request) : Void
    {
    	$data = $request->except(['_token']);
    	foreach ($data as $key => $value) {
    		if ( $request->hasFile($key) ) {
    			$key = $request->file($key)->store("pendaftaran");
    		}
	    	$this->model->createPendaftaranDokumen([
	    		'key' => $key,
	    		'value' => $value
	    	]);
    	}
    }
}
