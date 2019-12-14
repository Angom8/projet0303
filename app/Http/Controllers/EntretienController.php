<?php

namespace App\Http\Controllers;

use App\Entretien;
use App\Bateau;
use Illuminate\Http\Request;

class EntretienController extends Controller
{

    /**
     * Show the form for creating a new Entretien.
     *
     */
    public function create()
    {
       $boat = Bateau::get()->pluck('id_bateau');
	return view('gen-entretien', ['boats' => $boat]);
    }
}
