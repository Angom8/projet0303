<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Utilisateur;
use Faker\Generator as Faker;

$factory->define(Utilisateur::class, function (Faker $faker) {
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
    ];
});
