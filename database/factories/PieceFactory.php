<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Piece;
use Faker\Generator as Faker;

$factory->define(Piece::class, function (Faker $faker) {
    $idtype= DB::table('Type_piece')->pluck('id_type_piece');
$idmod= DB::table('Modele')->pluck('id_modele');
	$idetat= DB::table('Etat')->pluck('id_etat');
    return [
	'revision_periodique_piece' => rand(0,10),
	'duree_vie_piece' => rand(0,10),
	'quantite_piece' => rand(0,10),
	'piece_origine' => rand(0,1),
	'q_piece_rechange' => rand(0,10),
		'created_at' => $faker->dateTime(),
		'updated_at' => $faker->dateTime(),
	'id_type_piece' => $faker->randomElement($idtype),
	'id_modele' => $faker->randomElement($idmod),
	'id_etat' => $faker->randomElement($idetat),
    ];
});
