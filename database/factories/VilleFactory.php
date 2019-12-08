<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ville;
use Faker\Generator as Faker;

$factory->define(Ville::class, function (Faker $faker) {

    $idpays = DB::table('Pays')->pluck('id_pays');
    return [
       	'nom_ville' => $faker->unique()->city,
	'code_postal' => rand(10000,99999),
	'id_pays' => $faker->randomElement($idpays),
    ];
});
