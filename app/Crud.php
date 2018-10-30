<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
	 use Searchable;

     protected $fillable = [
     
        'division', 
        'document', 
        'year_release',
        'item_code',
        'file', 
        'user_id',
        'sharetoken',
        'privacy',
        'document_owner'

     ];

    public function searchableAs(){
        //check on database what are you going to search
        return 'cruds';
    }
   
}
