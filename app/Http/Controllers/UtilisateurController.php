<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Utilisateur;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

    	return view('user', ['user' => $user[0]]);
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
