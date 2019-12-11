<?php

namespace App\Http\Controllers;

use App\Bateau;
use App\Moteur;
use App\Piece;
use App\Equipement;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Entretien;
use Illuminate\Http\Request;

class BateauController extends Controller
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
        //
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
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

	$idu = Auth::user()->id;
	
	if(DB::table('Possede')->where('id_bateau', $id)->value('id_utilisateur')==$idu or Auth::user()->type_utilisateur == 2){
		$boat = Bateau::where('id_bateau', $id)->get()[0]->toArray();

		$moteur = $boat['id_moteur'];

		if($moteur != null){
			$moteur = Moteur::where('id_moteur', $moteur)->get()[0]->toArray();
			$equipmoteur = Equipement::where('id_equipement', $moteur['id_equipement'])->get()[0]->toArray();
		}
		else{$equipmoteur = null;}

		//modele : $equip = [l'equip, le modele, type_equip]*x

		$id_equipements = DB::table('Comporte')->where('id_bateau', $id)->get()->toArray();

		$ensequip = null;

		if($id_equipements){
			$ensequip = [];

			foreach($id_equipements as $id_equip){
			
				$equip = Equipement::where('id_equipement', $id_equip->id_equipement)->get()[0]->toArray();
				$modele = DB::table('Modele')->where('id_modele', $equip['id_modele'])->value('nom_modele');
				$type = DB::table('Type_equipement')->where('id_type_equipement', $equip['id_type_equipement'])->value('nom_type_equipement');
				array_push($ensequip, ['equipement' => $equip, 'modele' => $modele, 'nom' => $type]);

			}
		}
		if($equipmoteur){

				$modele = DB::table('Modele')->where('id_modele', $equipmoteur['id_modele'])->value('nom_modele');
				$type = DB::table('Type_equipement')->where('id_type_equipement', $equipmoteur['id_type_equipement'])->value('nom_type_equipement');
				$equipmoteur = ['equipement' => $equipmoteur, 'modele' => $modele, 'nom' => $type];

		}
		
	
		//modele : $piece = [la piece en tableau, le modele, type_piece]*x

		$piece = DB::table('Contient')->where('id_bateau', $id)->get()->toArray();

		$enspiece = null;

		if($piece){
			$enspiece = [];

			foreach($enspiece as $id_piece){

				$piece = Piece::where('id_equipement', $id_piece['id_piece'])->get()[0]->toArray();
				$modele = DB::table('Modele')->where('id_modele', $piece['id_modele'])->value('nom_modele');
				$type = DB::table('Type_piece')->where('id_type_piece', $equip['id_type_piece'])->value('nom_type_piece');
				array_push($enspiece, ['piece' => $piece, 'modele' => $modele, 'nom' => $type]);

			}
		}
		if($id_equipements){

			if($enspiece == null){$enspiece = [];}
			foreach($id_equipements as $id_equip){

				$pieces_de_equip = DB::table('Est_composé')->where('id_equipement', $equip['id_equipement'])->get()->toArray();
	
					foreach($pieces_de_equip as $piece_equip){
						$piece_de_equip =Piece::where('id_piece', $piece_equip->id_piece)->get()[0]->toArray();
						$modele = DB::table('Modele')->where('id_modele',  $piece_equip['id_modele'])->value('nom_modele');
						$type = DB::table('Type_piece')->where('id_type_piece',  $piece_equip['id_type_piece'])->value('nom_type_piece');
						array_push($enspiece, ['piece' =>  $piece_equip, 'modele' => $modele, 'nom' => $type]);

					}


			}
		}
		if($equipmoteur){
			if($enspiece == null){$enspiece = [];}

				$pieces_de_equip = DB::table('Est_composé')->where('id_equipement', $equipmoteur['equipement']['id_equipement'])->get()->toArray();
	
					foreach($pieces_de_equip as $piece_equip){
						
						$piece_equip =Piece::where('id_piece', $piece_equip->id_piece)->get()[0]->toArray();
						$modele = DB::table('Modele')->where('id_modele',  $piece_equip['id_modele'])->value('nom_modele');
						$type = DB::table('Type_piece')->where('id_type_piece',  $piece_equip['id_type_piece'])->value('nom_type_piece');
						array_push($enspiece, ['piece' =>  $piece_equip, 'modele' => $modele, 'nom' => $type]);

					}


		}

		$entretiens = Entretien::where('id_bateau', $id)->get()[0]->toArray();
		

		if(isset($boat)){
			
	    		return view('boat', ['boat' => $boat, 'equipements' => $ensequip , 'pieces' => $enspiece, 'moteur' => $moteur, 'equipmoteur' => $equipmoteur, 'entretiens' => $entretiens]);
		}
		else{
			return view('404');
		}
	}
	else{
		return view('404');
	}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function edit(Bateau $bateau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bateau $bateau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bateau $bateau)
    {
        //
    }
}
