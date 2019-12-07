<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utilisateur;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
	protected $table = 'Utilisateur';


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => ['required', 'string', 'max:255', 'unique:Utilisateur'],
            'mail_utilisateur' => ['required', 'string', 'email', 'max:255', 'unique:Utilisateur'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
		'nom_utilisateur' => ['required', 'string', 'max:255'],
		'prenom_utilisateur' => ['required', 'string', 'max:255'],
		'tel_utilisateur' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Utilisateur::create([
            'login' => $data['login'],
            'mail_utilisateur' => $data['mail_utilisateur'],
            'password' => Hash::make($data['password']),
		'nom_utilisateur' => $data['nom_utilisateur'],
		'prenom_utilisateur' => $data['prenom_utilisateur'],
		'tel_utilisateur' => $data['tel_utilisateur'],
        ]);
    }
}
