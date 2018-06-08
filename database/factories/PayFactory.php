<?php

use Faker\Generator as Faker;

$factory->define(App\Pay::class, function (Faker $faker) {


    $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');

    return [
        'user_id' => $faker->numberBetween(1,190),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
