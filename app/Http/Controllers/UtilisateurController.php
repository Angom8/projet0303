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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
		'tel_utilisateur' => ['required', 'string', 'max:50'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
 	else{

		Utilisateur::create([
		    'login' => $data['login'],
		    'mail_utilisateur' => $data['mail_utilisateur'],
		    'password' => Hash::make($data['password']),
			'nom_utilisateur' => $data['nom_utilisateur'],
			'prenom_utilisateur' => $data['prenom_utilisateur'],
			'tel_utilisateur' => $data['tel_utilisateur'],
			'type_utilisateur' => 0,
		]);
		return route('users');

	}

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            	$user= Utilisateur::whereId($id);
		$id_boats = DB::table('Possede')->where('id_utilisateur', $id);
		foreach($id_boats->get() as $idb){
			Bateau::where('id_bateau', $idb->id_bateau)->delete();
		}
		$id_boats->delete();
    		$user->delete();
    		return back();
    }

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
