<?php

use Faker\Generator as Faker;

$factory->define(App\Mac::class, function (Faker $faker) {
    return [
        'numMac' => $faker->unique()->numberBetween(1, 50),
        'isActive'  => 1
    ];
});
