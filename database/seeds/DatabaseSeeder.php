<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	$this->call(PaysTableSeeder::class);
	$this->call(VilleTableSeeder::class);
        $this->call(AdresseTableSeeder::class);
        $this->call(EtatTableSeeder::class);
	$this->call(FournisseurTableSeeder::class);
	$this->call(TypePieceTableSeeder::class);
    }
}
