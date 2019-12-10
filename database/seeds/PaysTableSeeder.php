<?php

use Illuminate\Database\Seeder;

use App\Pays;
class PaysTableSeeder extends Seeder {
    public function run()
    {
		$country = factory(App\Pays::class, 125)->create();
    }
}
