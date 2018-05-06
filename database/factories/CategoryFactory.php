<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text($maxNbChars = 80),
        'category_parent_id' => $faker->numberBetween($min = 1, $max = 40),
        'user_id' => '1',
        'accepted'=>'1'

    ];

});
