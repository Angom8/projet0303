<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use App\Adresse;
use App\Pays;
use App\Ville;
use App\Type_piece;
use Auth;
use App\Type_equipement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
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
    public function create()
    {
       $pays = DB::table('Pays')->orderBy('nom_pays')->pluck('nom_pays');

       return view('add-fourni', ['listPays' => $pays]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fourni = Fournisseur::where('id_fourni', $id)->get();
	$fourni = $fourni[0];

	//adresse(s)

	$id_adresse = DB::table('Est_localisé')->where('id_fourni', $id)->pluck('id_adresse');
	$franchise = [];

	foreach($id_adresse as $id_adr){
		$adresse = Adresse::where('id_adresse', $id_adr)->get()[0];
		$ville = Ville::where('id_ville', $adresse->id_ville)->get()[0];
		$pays = Pays::where('id_pays', $ville->id_pays)->get()[0];

		$localisation = ['voierie' => $adresse->voierie, 
				'numero_adresse' => $adresse->numero_adresse, 
				'code_postal' => $ville->code_postal, 
				'ville' => $ville->nom_ville, 
				'pays' => $pays->nom_pays];
	
		array_push($franchise, $localisation);
	}
	
	$id_fourn = DB::table('Fournit')->where('id_fourni', $id)->get();

	$piece = [];
	$equipement = [];

	//pieces
	foreach($id_fourn as $idf){
		if($idf->id_type_piece != null){
			array_push($piece, Type_piece::where('id_type_piece',  $idf->id_type_piece)->get()[0]->nom_type_piece);
		}
		if($idf->id_type_equipement !=  null){
			array_push($equipement, Type_equipement::where('id_type_equipement',  $idf->id_type_equipement)->get()[0]->nom_type_equipement);
		}
	}

	if(Auth::user()->type_utilisater == 2){
		$listePiece = Type_piece::value('id_type_piece', 'nom_type_piece');
		$listeEquip = Type_equipement::value('id_type_equipement', 'nom_type_equipement');
	}
	else{
		$listePiece = null;
		$listeEquip = null;
	}

	if(isset($fourni)){
	
    		return view('fournisseur', ['fourni' => $fourni, 'franchise' => $franchise, 'piece' => $piece, 'equipement' => $equipement, 'listeEquip' => $listeEquip, 'listPiece' => $listePiece]);
	}
	else{
		return view('404');
	}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $fourni= Fournisseur::where('id_fourni', $id)->delete();
		$id_local = DB::table('Est_localisé')->where('id_fourni', $id)->delete();
		$id_fournit = DB::table('Fournit')->where('id_fourni', $id)->delete();

    		return back();
    }
}
