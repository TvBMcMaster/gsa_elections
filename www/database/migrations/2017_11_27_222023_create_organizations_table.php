<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string("description");
            $table->string('slug');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('organization_id')->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('organization_id');
        });
    }
}