<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'verification_code', 'person_id', 'person_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function person()
    {
        return $this->morphTo();
    }

    public static function createUser(array $data)
    {
	    return User::create($data);
    }

    public static function updateUser(int $id, array $data)
    {
    	$user = User::findOrFail($id);
    	$user->update($data);
	    return $user;
    }

    public static function updateUserPegawai(int $personId, array $data)
    {
    	$user = User::where('person_id', $personId)
    				->where('person_type', '<>', 'siswa');
		$user->update($data);
	    return $user->first();
    }

    public static function updateUserSiswa(int $personId, array $data)
    {
    	$user = User::where('person_id', $personId)
    				->where('person_type', 'siswa');
		$user->update($data);
	    return $user->first();
    }

    public function querySearch(array $filter)
    {
        $query = $this->newQuery();

        if (isset($filter['verification_code'])) {
            $query->where('verification_code', $filter['verification_code']);
        }
        if (isset($filter['email'])) {
            $query->where('email', $filter['email']);
        }
        if (isset($filter['status'])) {
            $query->where('status', $filter['status']);
        }

        return $query->get();
    }
}
