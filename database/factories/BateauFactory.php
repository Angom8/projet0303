<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bateau;
use Faker\Generator as Faker;

$factory->define(Bateau::class, function (Faker $faker) {
   	 $idim= DB::table('Immatriculation')->pluck('id_immatr');
	$idmot= DB::table('Moteur')->pluck('id_moteur');
    return [
        'nom_bateau' => $faker->lastName, 
	'nb_mat' => rand(1, 5), 
	'surface_voilure'  => rand(0, 50), 
	'dimension_x_bateau' => rand(2, 50), 
	'dimension_y_bateau' => rand(2, 50), 
	'ancienne_cat' => rand(1,6), 
	'distance_eloignement' => rand(2, 500), 
	'volume_coque' => rand(2, 5000), 
	'force_vent_max' => rand(2, 100), 
	'hauteur_max_vagues' => rand(2, 50),
	'dimension_z_bateau' => rand(2, 50), 
	'consommation' => rand(0, 50), 
	'niveau_reserve' => rand(0, 50), 
	'nb_places' => rand(1, 50), 
	'auto_videur' => rand(0, 1), 
	'niveau_carburant_max' => rand(0, 100), 
	'niveau_performance' => rand(0, 100), 
	'url_photo' => $faker->imageUrl, 
	'jauge_brut' => rand(0, 100), 
	'masse_navire' => rand(0, 100000), 
	'hors_bord' => rand(0, 1), 
	'francise' => rand(0, 1), 
	'niveau_huile' => rand(0, 100), 
	'jauge_liquide_refroidissement'=> rand(0, 100),
	'id_immatr' => $faker->unique()->randomElement($idim),
	'id_moteur'=> (rand(0,1)+rand(0,1) == 0 ? $faker->unique()->randomElement($idmot) : null),

    ];
});
