<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
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
    	$admin = Admin::create([
    		"name" => "Dev Admin",
    		"email" => "admin@test.com",
    		"password" => bcrypt("admin123")
    	]);

        $test_org = Organization::where('slug', 'testorg')->first();

		$user_test = User::create([
    		"name" => "Dev User",
    		"email" => "user@test.com",
    		"password" => bcrypt("user123"),
            "organization_id" => $test_org->id,
    	]);
        		
        $user_test->save();

    }
}
