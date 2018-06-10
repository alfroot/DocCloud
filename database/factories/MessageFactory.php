<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'from' => $faker->numberBetween(1,190),
        'to' => $faker->numberBetween(1,190),
        'content' => $faker->text($maxNbChars = 400),
        'subject' => $faker->text($maxNbChars = 40),
        'read' => $faker->numberBetween(0,1)
    ];
});
