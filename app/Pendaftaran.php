<?php

namespace App;

use Brexis\LaravelWorkflow\Traits\WorkflowTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use WorkflowTrait;

    protected $guarded = [];

    protected $attributes = [
        'state' => 'start',
    ];

    public function dokumen()
    {
    	return $this->hasMany('App\PendaftaranDetail', 'pendaftaran_id');
    }

    public function minstitusi()
    {
        return $this->hasOne('App\Institusi', 'id', 'institusi');
    }

    public static function createPendaftaran(array $data)
    {
	    return Pendaftaran::create($data);
    }

    public static function updatePendaftaran(int $id, array $data)
    {
    	$user = Pendaftaran::findOrFail($id);
    	$user->update($data);
	    return $user;
    }

    public function querySearch(array $filter) : ?Collection
    {
        $query = $this->newQuery();

        if (isset($filter['siswa_id'])) {
            $query->where('siswa_id', $filter['siswa_id']);
        }

        return $query->get();
    }
}
