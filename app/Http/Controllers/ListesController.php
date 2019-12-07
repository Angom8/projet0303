<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function getUtilisateurs($page = 1){
			$users = DB::table('Utilisateur')->skip($page*10)->take(10)->orderBy('nom_utilisateur');
			$users = $users->get();
			$max = ceil(DB::table('Utilisateur')->count()/10);

			if(($page+1)*10>(ceil(DB::table('Utilisateur')->count()/10)*10)){
				$next = 0;
			}
			else{
				$next = $page + 1;
			}

			if($page == 1){

				$previous = 0;
			}
			else{
				$previous = $page-1;
			}
		
			return view('users', ['users'=> $users, 'previous' => $previous, 'next' => $next, 'page' => $page, 'max' => $max]);
	
	}
	public function getFournisseurs($page = 1){
			$fourni = DB::table('Fournisseur')->skip($page*10)->take(10)->orderBy('nom_fourni');
			$fourni = $fourni->get();
			$max = ceil(DB::table('Fournisseur')->count()/10);

			if(($page+1)*10>(ceil(DB::table('Fournisseur')->count()/10)*10)){
				$next = 0;
			}
			else{
				$next = $page + 1;
			}

			if($page == 1){

				$previous = 0;
			}
			else{
				$previous = $page-1;
			}
		
			return view('fournisseurs', ['fournisseurs'=> $fourni, 'previous' => $previous, 'next' => $next, 'page' => $page, 'max' => $max]);
	
	}
}
