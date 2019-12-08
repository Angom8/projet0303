<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Adresse;
use Faker\Generator as Faker;

$factory->define(Adresse::class, function (Faker $faker) {

    $idville = DB::table('Ville')->pluck('id_ville');
    return [
       	'voierie' => $faker->streetName ,
	'numero_adresse' => rand(1,150),
	'id_ville' => $faker->randomElement($idville),
    ];

});



