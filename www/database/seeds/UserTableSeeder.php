<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_admin = Role::where('name', 'administrator')->first();
    	$role_user = Role::where('name', 'user')->first();

    	$user_admin = User::create([
    		"name" => "Dev Admin",
    		"email" => "admin@test.com",
    		"password" => bcrypt("admin123")
    	]);
		$user_admin->roles()->attach($role_admin);

		$user_test = User::create([
    		"name" => "Dev User",
    		"email" => "user@test.com",
    		"password" => bcrypt("user123")
    	]);

		$user_test->roles()->attach($role_user);

    }
}
