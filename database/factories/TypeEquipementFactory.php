<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type_equipement;
use Faker\Generator as Faker;

$factory->define(Type_equipement::class, function (Faker $faker) {

   $type=['Système de Navigation', 'Sécurité', 'Radeau de Sauvetage', 'Tableau de bord', 'Système de Flottaison', 'Système Electrique', 'Embrayage', 'Disjoncteur', 'Bois', 'Système de voile'];

    return [
        'nom_type_equipement' => $faker->unique()->randomElement($type),
    ];

});
