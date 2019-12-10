<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstLocaliseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
	 $id_adresse= DB::table('Adresse')->pluck('id_adresse');
	 $fournisseur = DB::table('Fournisseur')->pluck('id_fourni');
	 $faker = Faker\Factory::create('fr_FR');

         for ($i = 0; $i < 20; $i++) {
        	DB::table('Est_localisé')->insert([
		    'id_fourni' => $faker->randomElement($fournisseur),
		    'id_adresse' =>$faker->randomElement($id_adresse),
        	]);
        }
    }
}


