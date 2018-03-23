<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
 use Searchable;

	public function users()
	{
	  return $this->belongsToMany('App\User');
	}

	
      public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}