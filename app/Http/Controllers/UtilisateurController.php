<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Utilisateur;
use App\Bateau;
use App\Adresse;
use App\Pays;
use App\Ville;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use  App\Rules\MatchOldPassword;

class UtilisateurController extends Controller
{

    /**
     * The ONLY form-handling method outside FormController
     *
     * @param Request
     */
    public function create(Request $request)
    {
	$data = $request->all();
	$validator = Validator::make($data, [
            'login' => ['required', 'string', 'max:255', 'unique:Utilisateur'],
            'mail_utilisateur' => ['required', 'string', 'email', 'max:255', 'unique:Utilisateur'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
		'nom_utilisateur' => ['required', 'string', 'max:255'],
		'prenom_utilisateur' => ['required', 'string', 'max:255'],
		'nom_pays' => ['required', 'string', 'max:255'],
		'nom_ville' => ['required', 'string', 'max:255'],
		'numero_adresse' => ['required', 'string', 'max:255'],
		'voierie' => ['required', 'string', 'max:255'],
		'code_postal' => ['required', 'string', 'max:255'],

		'tel_utilisateur' => ['required', 'string', 'max:50'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
 	else{

		if($id_pays = DB::table('Pays')->where('nom_pays', $data['nom_pays'])->value('id_pays')){


			if($id_ville = DB::table('Ville')->where('id_pays', $id_pays)->where('nom_ville', $data['nom_ville'])->value('id_ville')){
			

				if($id_adresse = DB::table('Adresse')->where('id_ville', $id_ville)->where('numero_adresse',$data['numero_adresse'])->where('voierie',$data['voierie'])->value('id_adresse')){

				}
				else{

					Adresse::create([
					    	'id_ville' => $id_ville,
						'numero_adresse' => $data['numero_adresse'],
						'voierie' => $data['voierie'],
					]);
					$id_adresse = DB::table('Adresse')->where('id_ville', $id_ville)->where('numero_adresse',$data['numero_adresse'])->where('voierie',$data['voierie'])->value('id_adresse');

				}

			}
			else{
				Ville::create([
				    	'nom_ville' => $data['nom_ville'],
				    	'code_postal' => $data['code_postal'],
				    	'id_pays' => $id_pays,
				]);

				$id_ville = DB::table('Ville')->where('id_pays', $id_pays)->where('nom_ville', $data['nom_ville'])->value('id_ville');

				Adresse::create([
				    	'id_ville' => $id_ville,
					'numero_adresse' => $data['numero_adresse'],
					'voierie' => $data['voierie'],
				]);

				$id_adresse = DB::table('Adresse')->where('id_ville', $id_ville)->where('numero_adresse',$data['numero_adresse'])->where('voierie',$data['voierie'])->value('id_adresse');

			}	

			Utilisateur::create([
			    'login' => $data['login'],
			    'mail_utilisateur' => $data['mail_utilisateur'],
			    'password' => Hash::make($data['password']),
				'nom_utilisateur' => $data['nom_utilisateur'],
				'prenom_utilisateur' => $data['prenom_utilisateur'],
				'tel_utilisateur' => $data['tel_utilisateur'],
				'type_utilisateur' => 0,
				'id_adresse' => $id_adresse,
			]);
			return redirect('panel');

		}

		else{
			return back();
		}

	}

        
    }

    /**
     * Retrieve informations and display the create an user form
     *
     * @param  Request
     */
    public function store(Request $request)
    {
        $pays = DB::table('Pays')->orderBy('nom_pays')->pluck('nom_pays');

       return view('add-user', ['listPays' => $pays]);
    }

    /**
     * Retrive informations and display the user's page
     *
     * @param  User's ID
     */
    public function show($id)
    {
      	$user= Utilisateur::whereId($id)->get();
	$id_boats = DB::table('Possede')->where('id_utilisateur', $id)->pluck('id_bateau');

	//mesure de sécurité, même si id = unique
 	$user = $user[0];
	
	//adresse
	$adresse = Adresse::where('id_adresse', $user->id_adresse)->get()[0];
	$ville = Ville::where('id_ville', $adresse->id_ville)->get()[0];
	$pays = Pays::where('id_pays', $ville->id_pays)->get()[0];

	$localisation = ['voierie' => $adresse->voierie, 
			'numero_adresse' => $adresse->numero_adresse, 
			'code_postal' => $ville->code_postal, 
			'ville' => $ville->nom_ville, 
			'pays' => $pays->nom_pays];
	

	$return = [];

	//bateau
	foreach($id_boats as $idb){
		$boat = Bateau::where('id_bateau', $idb)->value('nom_bateau');
		array_push($return, ['nom' => $boat, 'id' => $idb]);
	}


	//user
	if(isset($user)){
	
    		return view('user', ['user' => $user, 'boats' => $return, 'localisation' => $localisation]);
	}
	else{
		return view('404');
	}
    }

    /**
     * Fully remove an User form the database
     *
     * @param  User's ID
     */
    public function destroy($id)
    {
            	$user= Utilisateur::whereId($id);
		$id_boats = DB::table('Possede')->where('id_utilisateur', $id);
		$id_boats->delete();
    		$user->delete();
    		return back();
    }

    /**
     * Change the User's password (helper only)
     *
     * @param Request
     */

    public function changePW(Request $request)

    {
        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

        Utilisateur::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return back();

    }
}
