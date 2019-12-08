<?php

use Illuminate\Database\Seeder;

use App\Type_equipement;
class TypeEquipementTableSeeder extends Seeder {
    public function run()
    {
		$te = factory(App\Type_equipement::class, 9)->create();
    }
}
