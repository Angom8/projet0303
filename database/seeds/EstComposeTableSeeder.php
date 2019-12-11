<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstComposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
	 $id_piece= DB::table('Piece')->pluck('id_piece');
	 $id_equip = DB::table('Equipement')->pluck('id_equipement');
	 $faker = Faker\Factory::create('fr_FR');

         for ($i = 0; $i < 20; $i++) {
        	DB::table('Est_composé')->insert([
		    'id_piece' => $faker->randomElement($id_piece),
		    'id_equipement' =>$faker->randomElement($id_equip),
        	]);
        }
    }
}


