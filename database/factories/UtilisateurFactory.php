<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Utilisateur;
use Faker\Generator as Faker;

$factory->define(Utilisateur::class, function (Faker $faker) {

	$idadresse = DB::table('Adresse')->pluck('id_adresse');
    return [
		'login' => $faker->unique()->lastName,
		'nom_utilisateur' => $faker->lastName,
		'prenom_utilisateur' => $faker->firstName,
		'mail_utilisateur' => $faker->unique()->email,
		'password' => Hash::make('123456'),
		'tel_utilisateur' => $faker->phoneNumber,
		'type_utilisateur' => 0,
		'created_at' => $faker->dateTime(),
		'updated_at' => $faker->dateTime(),
		'id_adresse'=> $faker->randomElement($idadresse),
    ];
});
