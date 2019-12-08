<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Piece;
use Faker\Generator as Faker;

$factory->define(Piece::class, function (Faker $faker) {
    $idtype= DB::table('Type_Piece')->pluck('id_type_piece');
    return [
	'revisions_periodiques_piece' => rand(0,10),
	'duree_vie_piece' => rand(0,10),
	'quantite_piece' => rand(0,10),
	'piece_origine' => rand(0,1),
	'q_piece_rechange' rand(0,10),
	'id_type_piece' => $faker->randomElement($idtype),
    ];
});
