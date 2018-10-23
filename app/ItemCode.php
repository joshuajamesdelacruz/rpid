<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ItemCode extends Model
{
    use Searchable;
    protected $fillable = ['category'];


    public function toSearchableArray()
    {
    $array = $this->toArray();
        
    return array('id' => $array['id'],'category' => $array['category']);
    }

}
