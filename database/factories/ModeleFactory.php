<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modele;
use Faker\Generator as Faker;

$factory->define(Modele::class, function (Faker $faker) {
    return [
        'nom_modele' => $faker->ean13,
    ];
});
