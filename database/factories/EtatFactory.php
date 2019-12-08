<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etat;
use Faker\Generator as Faker;

$factory->define(Etat::class, function (Faker $faker) {

	$etat=['Bon', 'Un peu rouillé', 'HS', 'Bientôt HS', 'Neuf'];
    return [
        'desc_etat' => $faker->unique()->randomElement($etat),
    ];
});
