<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FournitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
	 $id_type_piece = DB::table('Type_piece')->pluck('id_type_piece');
	 $id_type_equipement = DB::table('Type_equipement')->pluck('id_type_equipement');
	 $fournisseur = DB::table('Fournisseur')->pluck('id_fourni');
	 $faker = Faker\Factory::create('fr_FR');

         for ($i = 0; $i < 20; $i++) {
		$s = rand(1, 4);//On s'amuse comme on peut xD
        	DB::table('Fournit')->insert([
		    'id_fourni' => $faker->randomElement($fournisseur),
		    'id_type_piece' => (($s == 2 or $s == 4) ? $faker->randomElement($id_type_piece) : null), 
		    'id_type_equipement' => (($s == 1 or $s == 3) ? $faker->randomElement($id_type_equipement) : null),
        	]);
        }
    }
}


