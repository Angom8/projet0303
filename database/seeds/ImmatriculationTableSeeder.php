<?php

use Illuminate\Database\Seeder;

use App\Immatriculation;
class ImmatriculationTableSeeder extends Seeder {
    public function run()
    {
		$tp = factory(App\Immatriculation::class, 50)->create();
    }
}
