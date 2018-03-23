<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Role;

class CrudUserController extends Controller
{

    public function index()
    {
          
        $user =  DB::table('users')  
                ->leftjoin('user_role','users.id','=','user_role.user_id')
                ->leftjoin('roles','roles.id','=','user_role.role_id')
                ->select('users.id','users.name as uname' , 'users.email' , 'users.division', 'roles.name as rname')
                ->get();
      
        return view('admin.users.index', compact('user'));

    }


    public function create()
    {
         $roles =  DB::table('roles')
                  ->get();  

        return view('admin.users.create', compact('roles'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'division' => 'required',
            'role' => 'required'
         ]);

       

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password =bcrypt($request['password']);
        $user->division = $request['division'];    
        $user->save();
        $user->roles()->attach( Role::where('name', $request['role'])->first() );



         // DB::table('users')->insert([

         //    'name' => $request->get('name'),
         //    'email' => $request->get('email'), 
         //    'password' => $request->get('password'),
         //    'division' => $request->get('division')

         //    ]);

         // $users_get = DB::table('users')->count() - 1;

         // DB::table('user_role')->insert([
            
         //    'role_id' => $request->get('role'),
         //    'user_id' => $users_get + 1,

         //    ]);


        return redirect('/users');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
         $user = User::find($id);
         $user->delete();

         DB::table('user_role')->where('id', '=', $id)->delete();

          return redirect('/users');
    }
}
