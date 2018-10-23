<?php

namespace App\Http\Controllers;

use App\myaccount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Role;
use Auth;

class MyaccountController extends Controller
{

    public function index()
    {

        $users = DB::table('users')  
                ->leftjoin('user_role','users.id','=','user_role.user_id')
                ->leftjoin('roles','roles.id','=','user_role.role_id')
                ->select('users.id','users.name as uname' , 'users.username' , 'users.division', 'roles.name as rname')
                ->where('users.id', Auth::user()->id )
                ->Orderby('rname')
                ->get();

        return view('admin.crud.myaccount', compact('users') );
    
    }

   
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
       
    }

    
    public function show(myaccount $myaccount)
    {
        
    }

   
    public function edit(myaccount $myaccount)
    {
        //
    }

    
    public function update(Request $request, myaccount $myaccount)
    {
        //
    }

 
    public function destroy(myaccount $myaccount)
    {
        //
    }
}
