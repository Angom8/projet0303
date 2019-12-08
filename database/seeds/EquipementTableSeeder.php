<?php

use Illuminate\Database\Seeder;

use App\Equipement;
class EquipementTableSeeder extends Seeder {
    public function run()
    {
		$user = factory(App\Equipement::class, 50)->create();
    }
}
