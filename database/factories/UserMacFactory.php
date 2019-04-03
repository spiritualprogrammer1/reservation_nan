<?php

use Faker\Generator as Faker;

$factory->define(App\UserMac::class, function (Faker $faker) {
    $countUser = App\User::all()->count();
    $countMac = App\Mac::all()->count();
    $countPeriode = App\PeriodeJour::all()->count();

    return [
        'user_id'   =>  $faker->numberBetween(1, $countUser),
        'mac_id'  =>  $faker->numberBetween(1, $countMac),
        'periode_jour_id'   =>  $faker->numberBetween(111, $countPeriode)
    ];
});
