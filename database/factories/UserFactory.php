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

$factory->define(App\User::class, function (Faker $faker) {


    $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
    return [

        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'), // secret
        'profilephoto' => 'profiles/'.$faker->unique()->numberBetween(1,189).'.jpg',
        'created_at' => $date,
        'updated_at' => $date,
        'remember_token' => str_random(10)

    ];



});




