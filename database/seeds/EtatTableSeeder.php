<?php

use Illuminate\Database\Seeder;

use App\Etat;
class EtatTableSeeder extends Seeder {
    public function run()
    {
		$etat = factory(App\Etat::class, 5)->create();
    }
}
