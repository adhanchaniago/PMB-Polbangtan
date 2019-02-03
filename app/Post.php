<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = [];

    public function user()
    {
    	return $this->hasOne('App\User', 'id');
    }

    public function querySearch(array $filter, int $limit)
    {
        $query = $this->newQuery();
        $query->with('user');

        if (isset($filter['state'])) {
            $query->whereIn('state', $filter['state']);
        }

        $query->orderBy('updated_at');
        
        if ($limit == 0) {
        	return $query->get();
        } else {
        	return $query->paginate($limit);
        }
    }

}
