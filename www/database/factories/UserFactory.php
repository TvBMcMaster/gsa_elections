<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$role_user = App\Role::where('slug', 'user')->first();

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->state(App\User::class, 'admin', [
	'role_id' => App\Role::where('slug', 'admin')->first()->id
]);

$factory->state(App\User::class, 'user', [
	'role_id' => $role_user->id
]);
