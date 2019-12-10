<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PossedeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
	 $id_utilisateur = DB::table('Utilisateur')->pluck('id');
	 $id_bateau = DB::table('Bateau')->pluck('id_bateau');
	 $faker = Faker\Factory::create('fr_FR');

         for ($i = 0; $i < 20; $i++) {
        	DB::table('Possede')->insert([
		    'id_utilisateur' => $faker->randomElement($id_utilisateur), 
		    'id_bateau' => $faker->randomElement($id_bateau),
        	]);
        }
    }
}


