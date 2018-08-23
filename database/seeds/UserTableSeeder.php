<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    
    public function run()
    {
    	$role_admin    = Role::where('name', 'admin')->first();
        $role_employee = Role::where('name', 'employee')->first();
	    $role_manager  = Role::where('name', 'manager')->first();


    	$admin = new User();
	    $admin->name = 'administrator';
	    $admin->email = 'admin';
	    $admin->password = bcrypt('admin');
	    $admin->division = 'test';
	    $admin->save();
	    $admin->roles()->attach($role_admin);
	    
	    $employee = new User();
	    $employee->name = 'Employee Name';
	    $employee->email = 'employee';
	    $employee->password = bcrypt('secret');
	    $employee->division = 'test';
	    $employee->save();
	    $employee->roles()->attach($role_employee);

	 	$manager = new User();
	    $manager->name = 'Manager Name';
	    $manager->email = 'manager';
	    $manager->password = bcrypt('secret');
	    $manager->division = 'test';
	    $manager->save();
    	$manager->roles()->attach($role_manager);

	    
    }
}
