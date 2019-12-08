<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Moteur;
use Faker\Generator as Faker;

$factory->define(Moteur::class, function (Faker $faker) {
   
$idequip= DB::table('Equipement')->pluck('id_equipement');
 	return [
		'puissance_moteur' => rand(1, 50), 
		'kilometrage' => rand(1, 10000),
		'horametre_compte' => rand(1, 10000), 
		'id_equipement' => $faker->unique()->randomElement($idequip),
    ];
});
