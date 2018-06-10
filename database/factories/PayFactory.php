<?php

use Faker\Generator as Faker;

$factory->define(App\Pay::class, function (Faker $faker) {


    $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');

    return [

        'created_at' => $date,
        'updated_at' => $date,

    ];
});
