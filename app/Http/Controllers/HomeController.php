<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $request->user()->authorizeRoles(['employee', 'manager','admin']);
         
        if($request->user()->hasRole('employee')){
         return redirect('userhome');
         }elseif ($request->user()->hasRole('admin')) {
           return redirect('adminhome');
         }elseif($request->user()->hasRole('manager')){
            return redirect('managerhome');
         };
    }
}


