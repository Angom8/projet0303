<?php

use Illuminate\Database\Seeder;

use App\Modele;
class ModeleTableSeeder extends Seeder {
    public function run()
    {
		$modele = factory(App\Modele::class, 50)->create();
    }
}
