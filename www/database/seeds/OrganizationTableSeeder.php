<?php

use Illuminate\Database\Seeder;
use App\Organization;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_org = Organization::create([
        	"name" => "Testing Organization",
        	"slug" => "testorg",
        	"description" => "The Testing Organization"
        ]);
    }
}
