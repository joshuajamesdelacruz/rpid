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
}
