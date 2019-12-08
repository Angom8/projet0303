<?php

use Illuminate\Database\Seeder;

use App\Entretien;
class EntretienTableSeeder extends Seeder {
    public function run()
    {
		$user = factory(App\Entretien::class, 50)->create();
    }
}
