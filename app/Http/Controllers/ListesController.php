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
			$users = DB::table('Utilisateur')->where('id', '>', ($page-1)*10)->where('id', '<',($page-1)*10+11)->orderBy('id');
			$users = $users->get();
			
			return view('users', ['users'=> $users, 'previous' => $previous, 'next' => $next]);
	
	}	
}
