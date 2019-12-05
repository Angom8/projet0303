<?php

use Illuminate\Database\Seeder;
use App\Fournisseur;

class FournisseurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++) {
            $fourni = new Fournisseur;

            $fourni->nom_fourni = $faker->lastName;
            $fourni->mail_fourni = $faker->unique()->email;
            $fourni->tel_fourni = $faker->phoneNumber;

	    $fourni->created_at = $faker->dateTime();
	    $fourni->updated_at = $faker->dateTime();
            $fourni->save();
        }
    }
}


