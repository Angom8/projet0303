<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type_piece;
use Faker\Generator as Faker;

$factory->define(Type_piece::class, function (Faker $faker) {

//main source : https://www.inautia.fr/blog/conseils/les-parties-dun-bateau/

   $type=['Quille courte', 'AIS', 'Anénomètre', 'Bouée', 'Chandelier', 'Gaffe', 'Quille semi-longue', 'Quille droite', 'Quille de roulis', 'Quille à bulbe', 'Dérive pivotante', 'Dérive rétractable', 'Gouvernail à quille', 'Gouvernail avec aileron', 'Gouvernail suspendu', 'Gouvernail sur la traverse', 'Sloop', 'Cutter', 'Mat', 'Manille', 'Cables du tableau de bord', 'Cables du Gouvernail', 'Générateur électrique', 'Batterie', 'Anode sacrificielle', 'Bois', 'Coque', 'Rame', 'Kit de survie', 'Voile principale', 'Voile Secondaire', 'Cordage de la voile', 'Cordage accessoire', 'Cables de sécurité', 'Roulements', 'Coulis'];

    return [
        'nom_type_piece' => $faker->unique()->randomElement($type),
    ];
});
