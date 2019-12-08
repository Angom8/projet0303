<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entretien;
use Faker\Generator as Faker;

$factory->define(Entretien::class, function (Faker $faker) {
 
	$idbat= DB::table('Bateau')->pluck('id_bateau');
	$idequip= DB::table('Equipement')->pluck('id_equipement');
	$idpi= DB::table('Piece')->pluck('id_piece');
	$s = rand(1, 6);//On s'amuse comme on peut xD
    return [
	'date_entretien' => $faker->datetime(), 
	'id_bateau' => (($s == 1 or $s == 6 or $s == 5) ? $faker->randomElement($idbat) : null), 
	'id_equipement'=> (($s == 2 or $s == 6 or $s == 4) ? $faker->randomElement($idequip) : null), 
	'id_piece' => (($s == 3 or $s == 6  or $s == 5  or $s == 4) ? $faker->randomElement($idpi) : null),
    ];
});
