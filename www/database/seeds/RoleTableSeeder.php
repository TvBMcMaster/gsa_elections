<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = "administrator";
        $role_admin->slug = 'admin';
        $role_admin->description = "Sitewide Administrators";
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = "user";
        $role_user->slug = "user";
        $role_user->description = "Generic Site User";
        $role_user->save();
    }
}
