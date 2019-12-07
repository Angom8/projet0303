<?php

use Illuminate\Database\Seeder;

use App\Utilisateur;
class UtilisateurTableSeeder extends Seeder {
    public function run()
    {
		$user = factory(App\Utilisateur::class, 50)->create();
    }
}
