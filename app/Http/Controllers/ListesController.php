<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Bateau;

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
			$users = DB::table('Utilisateur')->skip(($page-1)*10)->take(10)->orderBy('nom_utilisateur');
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
			$fourni = DB::table('Fournisseur')->skip(($page-1)*10)->take(10)->orderBy('nom_fourni');
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

	public function getBateaux($page = 1){

			$idu = Auth::user()->id;
			
			$id_boats = DB::table('Possede')->where('id_utilisateur', $idu)->skip(($page-1)*10)->take(10)->orderBy('id_bateau')->pluck('id_bateau');
			$return = [];

			//bateau
			foreach($id_boats as $idb){
				$boat = Bateau::where('id_bateau', $idb)->get()[0];
				array_push($return, ['nom_bateau' => $boat->nom_bateau, 'entretien' => $boat->updated_at, 'created_at' => $boat->created_at, 'id' => $idb]);
			}
	
			$max = ceil(DB::table('Possede')->where('id_utilisateur', $idu)->count()/10);

			if(($page+1)*10>($max*10)){
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
		
			return view('boats', ['boats'=> $return, 'previous' => $previous, 'next' => $next, 'page' => $page, 'max' => $max]);
	
	}

	public function getMessages($page = 1){

			$msg = DB::table('Message')->skip(($page-1)*10)->take(10)->orderBy('date_msg');
			$msg = $msg->get();
			$max = ceil(DB::table('Message')->count()/10);

			if(($page+1)*10>(ceil(DB::table('Message')->count()/10)*10)){
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
		
			return view('messages', ['messages'=> $msg, 'previous' => $previous, 'next' => $next, 'page' => $page, 'max' => $max]);
	
	}
}
