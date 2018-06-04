<?php

use App\Document;
use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {

    $name = $faker->sentence($nbWords = 7, $variableNbWords = true);
    return [


        'name' => $name,
        'user_id' => $faker->unique()->numberBetween( 1, 190),
        'desciption' => str_slug($name),
        'category_id' => $faker->unique()->numberBetween( 2, 84),
        'premium' => $faker->numberBetween( 0, 1),

    ];
});
