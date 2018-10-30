<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
	 use Searchable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function searchableAs(){
        //check on database what are you going to search
        return 'name';
    }
}
