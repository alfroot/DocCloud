<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {

    $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
    return [
        'from' => $faker->numberBetween(1,190),
        'to' => $faker->numberBetween(1,190),
        'body' => $faker->text($maxNbChars = 400),
        'subject' => $faker->text($maxNbChars = 40),
        'read' => $faker->numberBetween(0,1),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
