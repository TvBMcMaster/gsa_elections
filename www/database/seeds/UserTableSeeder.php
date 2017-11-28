<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Organization;

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
    		"password" => bcrypt("admin123"),
            "role_id" => $role_admin->id
    	]);

        $test_org = Organization::where('slug', 'testorg')->first();

		$user_test = User::create([
    		"name" => "Dev User",
    		"email" => "user@test.com",
    		"password" => bcrypt("user123"),
            'role_id' => $role_user->id
    	]);
        $user_test->organization()->associate($test_org);
		
        $user_test->save();

    }
}
