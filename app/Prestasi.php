<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestasi extends Model
{
	use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public static function createPrestasi(array $data)
    {
	    return Prestasi::create($data);
    }

    public static function updatePrestasi(int $id, array $data)
    {
    	$user = Prestasi::findOrFail($id);
    	$user->update($data);
	    return $user;
    }

    public static function deletePrestasi(int $id)
    {
    	return Prestasi::findOrFail($id)->delete();
    }
}
