<?php

use Faker\Generator as Faker;

$factory->define(App\TypeUser::class, function (Faker $faker) {
    return [
        'libelle'   =>  $faker->jobTitle
    ];
});
