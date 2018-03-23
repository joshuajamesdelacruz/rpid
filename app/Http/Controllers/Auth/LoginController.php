<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;



    /*
     * Where to redirect users after login
     */
   public function authenticated(Request $request){
    
         // Logic that determines where to send the user
         if($request->user()->hasRole('employee')){
         return redirect('userhome');
         }elseif ($request->user()->hasRole('admin')) {
           return redirect('adminhome');
         }elseif($request->user()->hasRole('manager')){
            return redirect('managerhome');
         }
       

        
    }

    // protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
