<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class POST extends Model
{
    use Searchable;

    protected $dates = [
        'create_at',
        'updated_at'
    ];

    public function toSearchableArray()
        {
        $array = $this->toArray();
            
        return array('id' => $array['id'],'name' => $array['name']);
        }

}
