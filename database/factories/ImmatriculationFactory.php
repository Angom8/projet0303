<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Immatriculation;
use Faker\Generator as Faker;

$factory->define(Immatriculation::class, function (Faker $faker) {
    return [
        'id_immatr'=>$faker->unique()->isbn10,
	'date_immatr' => $faker->dateTime(),
    ];
});
