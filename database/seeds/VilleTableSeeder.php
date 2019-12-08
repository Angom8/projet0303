<?php

use Illuminate\Database\Seeder;

use App\Ville;
class VilleTableSeeder extends Seeder {
    public function run()
    {
		$town = factory(App\Ville::class, 50)->create();
    }
}
