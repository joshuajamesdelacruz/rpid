<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class UserController extends Controller
{
     public function index()
    {
      
      $cruds = Crud::all()->toArray();   
      return view('user.crud.index', compact('cruds'));

     
    }
}
