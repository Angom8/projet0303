<?php

use Illuminate\Database\Seeder;

use App\Bateau;
class BateauTableSeeder extends Seeder {
    public function run()
    {
		$town = factory(App\Bateau::class, 20)->create();
    }
}
