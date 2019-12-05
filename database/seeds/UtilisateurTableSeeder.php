<?php
use Illuminate\Database\Seeder;
use App\Utilisateur;
class UtilisateurTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++) {
            $user = new Utilisateur;
	    $user->login = $faker->unique()->lastName;
            $user->nom_utilisateur = $faker->lastName;
            $user->prenom_utilisateur = $faker->firstName;
            $user->mail_utilisateur = $faker->unique()->email;
            $user->password = Hash::make('123456');
            $user->tel_utilisateur = $faker->phoneNumber;
	    $user->type_utilisateur = 0;
	    $user->created_at = $faker->dateTime();
	    $user->updated_at = $faker->dateTime();
            $user->save();
        }
    }
}
