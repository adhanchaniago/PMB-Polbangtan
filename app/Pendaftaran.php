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

    public function siswa()
    {
        return $this->hasOne('App\Siswa', 'id', 'siswa_id');
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
        if (isset($filter['institusi'])) {
            $query->where('institusi', $filter['institusi']);
        }
        if (isset($filter['no_pendaftaran'])) {
            $query->where('no_pendaftaran', $filter['no_pendaftaran']);
        }
        if (isset($filter['state'])) {
            $query->where('state', $filter['state']);
        }

        return $query->with('siswa')->get();
    }

    public function paginatePendaftaran(array $filter)
    {
        $query = $this->newQuery();

        if (isset($filter['siswa_id'])) {
            $query->where('siswa_id', $filter['siswa_id']);
        }
        if (isset($filter['institusi'])) {
            $query->where('institusi', $filter['institusi']);
        }
        if (isset($filter['no_pendaftaran'])) {
            $query->where('no_pendaftaran', $filter['no_pendaftaran']);
        }
        if (isset($filter['state'])) {
            $query->where('state', $filter['state']);
        }

        return $query->with('siswa')->paginate(15);
    }
}
