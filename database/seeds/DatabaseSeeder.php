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
	$this->call(TypeEquipementTableSeeder::class);
	$this->call(UtilisateurTableSeeder::class);
	$this->call(MarqueTableSeeder::class);
	$this->call(ModeleTableSeeder::class);
	$this->call(PieceTableSeeder::class);
	$this->call(EquipementTableSeeder::class);
	$this->call(MoteurTableSeeder::class);
	$this->call(ImmatriculationTableSeeder::class);
	$this->call(BateauTableSeeder::class);
	$this->call(EntretienTableSeeder::class); 
	$this->call(FournitTableSeeder::class);
	$this->call(EstLocaliseTableSeeder::class);
	$this->call(PossedeTableSeeder::class);
	$this->call(ComporteTableSeeder::class);
	$this->call(MessageTableSeeder::class);   
	$this->call(EstComposeTableSeeder::class); 
	$this->call(ContientTableSeeder::class); 
	}
}
