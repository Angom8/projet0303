<?php

use Illuminate\Database\Seeder;

use App\Adresse;
class AdresseTableSeeder extends Seeder {
    public function run()
    {
		$localisation = factory(App\Adresse::class, 50)->create();
    }
}
