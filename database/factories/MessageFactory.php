<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
   	 $idu = DB::table('Utilisateur')->pluck('id');
	 $idb = DB::table('Possede')->where('id_utilisateur', $idu)->pluck('id_bateau');

    return [
	'libellé' => "J'ai besoin d'aide",
	'id_utilisateur' => $faker->randomElement($idu),
	'id_bateau' => $faker->randomElement($idb),
    ];
});
