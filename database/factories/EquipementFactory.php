<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Equipement;
use Faker\Generator as Faker;

$factory->define(Equipement::class, function (Faker $faker) {
    $idtype= DB::table('Type_equipement')->pluck('id_type_equipement');
$idmod= DB::table('Modele')->pluck('id_modele');
	$idetat= DB::table('Etat')->pluck('id_etat');
    return [
	'revision_periodique_equip' => rand(0,10),
	'duree_vie_equip' => rand(0,10),
	'quantite_equip' => rand(0,10),
	'equip_origine' => rand(0,1),
	'q_equip_rechange' => rand(0,10),
		'created_at' => $faker->dateTime(),
		'updated_at' => $faker->dateTime(),
	'id_type_equipement' => $faker->randomElement($idtype),
	'id_modele' => $faker->randomElement($idmod),
	'id_etat' => $faker->randomElement($idetat),
    ];
});
