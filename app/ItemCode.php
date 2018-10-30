<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ItemCode extends Model
{
    use Searchable;
    protected $fillable = ['category'];


    public function searchableAs(){
        //check on database what are you going to search
        return 'category';
    }
    


}
