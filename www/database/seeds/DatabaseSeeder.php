<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the development database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganizationTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
