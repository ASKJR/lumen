<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(App\Singer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'dob' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'country' => $faker->country,
        'genre' => 'all'
    ];
});
