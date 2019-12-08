<?php

use Illuminate\Database\Seeder;

use App\Marque;
class MarqueTableSeeder extends Seeder {
    public function run()
    {
		$te = factory(App\Marque::class, 50)->create();
    }
}
