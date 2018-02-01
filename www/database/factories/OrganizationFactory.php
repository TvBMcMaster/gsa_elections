<?php

use Faker\Generator as Faker;

$factory->define(App\Organization::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'slug' => $faker->word,
        'description' => $faker->bs
    ];
});
