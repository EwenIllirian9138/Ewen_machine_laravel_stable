<?php

use Faker\Generator as Faker;

$factory->define(\App\Boisson::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => rand(20, 100),
    ];
});
