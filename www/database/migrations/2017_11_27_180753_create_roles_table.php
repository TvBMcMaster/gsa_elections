<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
        });

        $this->initRoles();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }

    /**
     * Initialize the project roles
     *
     * @return void
     */
    public function initRoles() 
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
