<?php

use Illuminate\Database\Seeder;

use App\Moteur;
class MoteurTableSeeder extends Seeder {
    public function run()
    {
		$user = factory(App\Moteur::class, 10)->create();
    }
}
