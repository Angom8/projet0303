<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
	 $id_bateau= DB::table('Bateau')->pluck('id_bateau');
	 $id_equip = DB::table('Piece')->pluck('id_piece');
	 $faker = Faker\Factory::create('fr_FR');

         for ($i = 0; $i < 20; $i++) {
        	DB::table('Contient')->insert([
		    'id_bateau' => $faker->randomElement($id_bateau),
		    'id_piece' =>$faker->randomElement($id_equip),
        	]);
        }
    }
}


