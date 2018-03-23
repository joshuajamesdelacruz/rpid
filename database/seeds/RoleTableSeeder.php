<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{

        public function run()
		  {

		  	$role_admin = new Role();
		    $role_admin->name = 'admin';
		    $role_admin->description = 'An Administrator';
		    $role_admin->save();

		    $role_employee = new Role();
		    $role_employee->name = 'employee';
		    $role_employee->description = 'A Employee User';
		    $role_employee->save();

		    $role_manager = new Role();
		    $role_manager->name = 'manager';
		    $role_manager->description = 'A Manager User';
		    $role_manager->save();

		   

		  }
    
}
