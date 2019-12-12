<?php

namespace App\Http\Controllers;

use App\Bateau;
use App\Immatriculation;	
use App\Moteur;
use App\Piece;
use App\Equipement;
use App\Utilisateur;
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
    public function store()
    {
 		if(isset($request->nom_bateau)
				&& isset($request->url_photo) 
				&& isset($request->ancienne_cat)
				&& isset($request->auto_videur)
				&& isset($request->hors_bord)
				&& isset($request->francise)
				&& isset($request->distance_eloignement)
				&& isset($request->nb_places)
				&& isset($request->force_vent_max)
				&& isset($request->hauteur_max_vagues)
				&& isset($request->niveau_reserve)
				&& isset($request->niveau_carburant_max)
				&& isset($request->niveau_performance)
				&& isset($request->jauge_brut)
				&& isset($request->niveau_huile)
				&& isset($request->jauge_liquide_refrodissement)
				&& isset($request->nb_mat)
				&& isset($request->surface_voilure)
				&& isset($request->dimension_x_bateau)
				&& isset($request->dimension_y_bateau)
				&& isset($request->dimension_z_bateau)
				&& isset($request->volume_coque)
				&& isset($request->consommation)
				&& isset($request->masse_navire)
				&& isset($request->id_immatr)
				&& isset($request->date_immatr)
				&& isset($request->created_at)
				){
		
					$data = ['url_photo' => $request->url_photo,
						'ancienne_cat' => $request->ancienne_cat,
						'auto_videur' => $request->auto_videur,
						'hors_bord' => $request->hors_bord,
						'francise' => $request->francise,
						'distance_eloignement' => $request->distance_eloignement,
						'nb_places' => $request->nb_places,
						'force_vent_max' => $request->force_vent_max,
						'hauteur_max_vagues' => $request->hauteur_max_vagues,
						'niveau_reserve' => $request->niveau_reserve,
						'niveau_carburant_max' => $request->niveau_carburant_max,
						'niveau_performance' => $request->niveau_performance,
						'jauge_brut' => $request->jauge_brut,
						'niveau_huile' => $request->niveau_huile,
						'jauge_liquide_refrodissement' => $request->jauge_liquide_refrodissement,
						'nb_mat' => $request->nb_mat,
						'surface_voilure' => $request->surface_voilure,
						'dimension_x_bateau' => $request->dimension_x_bateau,
						'dimension_y_bateau' => $request->dimension_y_bateau,
						'dimension_z_bateau' => $request->dimension_z_bateau,
						'jauge_liquide_refrodissement' => $request->jauge_liquide_refrodissement,
						'nb_mat' => $request->nb_mat,
						'volume_coque' => $request->volume_coque,
						'consommation' => $request->consommation,
						'masse_navire' => $request->masse_navire,
						'id_immatr' => $request->id_immatr,
						'date_immatr' => $request->date_immatr,
						'created_at' => $request->created_at,
					];
	
					$validator = Validator::make($data, [
						'url_photo' => ['required', 'string', 'min:8', 'max:200'],
						'ancienne_cat' => ['required', 'int', 'min:1', 'max:6'],
						'auto_videur' => ['required', 'int', 'min:0', 'max:1'],
						'hors_bord' => ['required', 'int', 'min:0', 'max:1'],
						'francise' =>['required', 'int', 'min:0', 'max:1'],
						'distance_eloignement' => ['required', 'int'],
						'nb_places' => ['required', 'int', 'min:1'],
						'force_vent_max' => ['required', 'int'],
						'hauteur_max_vagues' => $request->hauteur_max_vagues,
						'niveau_reserve' => $request->niveau_reserve,
						'niveau_carburant_max' => $request->niveau_carburant_max,
						'niveau_performance' => $request->niveau_performance,
						'jauge_brut' => $request->jauge_brut,
						'niveau_huile' => $request->niveau_huile,
						'jauge_liquide_refrodissement' => $request->jauge_liquide_refrodissement,
						'nb_mat' => $request->nb_mat,
						'surface_voilure' => $request->surface_voilure,
						'dimension_x_bateau' => $request->dimension_x_bateau,
						'dimension_y_bateau' => $request->dimension_y_bateau,
						'dimension_z_bateau' => $request->dimension_z_bateau,
						'jauge_liquide_refrodissement' => $request->jauge_liquide_refrodissement,
						'nb_mat' => $request->nb_mat,
						'volume_coque' => $request->volume_coque,
						'consommation' => $request->consommation,
						'masse_navire' => $request->masse_navire,
						'id_immatr' => $request->id_immatr,
						'date_immatr' =>  ['required', 'date'],
						'created_at' =>  ['required', 'date'],
						]);
		
		}
		else{
			return view('user-global');
		}


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
	 $users = Utilisateur::get()->pluck('id');
         return view('add-boat', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        return view('send-boat');
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

		$boat = Bateau::where('id_bateau', $id)->first();

		if($boat){
			$boat = $boat->toArray();
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
					$etat = DB::table('Etat')->where('id_etat', $equip['id_etat'])->value('desc_etat');
					array_push($ensequip, ['equipement' => $equip, 'modele' => $modele, 'nom' => $type, 'etat' => $etat]);

				}
			}
			if($equipmoteur){

					$modele = DB::table('Modele')->where('id_modele', $equipmoteur['id_modele'])->value('nom_modele');
					$type = DB::table('Type_equipement')->where('id_type_equipement', $equipmoteur['id_type_equipement'])->value('nom_type_equipement');
					$etat = DB::table('Etat')->where('id_etat', $equipmoteur['id_etat'])->value('desc_etat');
					$equipmoteur = ['equipement' => $equipmoteur, 'modele' => $modele, 'nom' => $type, 'etat' => $etat];

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
					$etat = DB::table('Etat')->where('id_etat', $piece['id_etat'])->value('desc_etat');
					array_push($enspiece, ['piece' => $piece, 'modele' => $modele, 'nom' => $type, 'etat' => $etat]);

				}
			}
			if($id_equipements){

				if($enspiece == null){$enspiece = [];}
				foreach($id_equipements as $id_equip){

					$pieces_de_equip = DB::table('Est_composé')->where('id_equipement', $equip['id_equipement'])->get()->toArray();
		
						foreach($pieces_de_equip as $piece_equip){
							$piece_equip =Piece::where('id_piece', $piece_equip->id_piece)->get()[0]->toArray();
							$modele = DB::table('Modele')->where('id_modele',  $piece_equip['id_modele'])->value('nom_modele');
							$type = DB::table('Type_piece')->where('id_type_piece',  $piece_equip['id_type_piece'])->value('nom_type_piece');
							$etat = DB::table('Etat')->where('id_etat', $piece_equip['id_etat'])->value('desc_etat');
							array_push($enspiece, ['piece' =>  $piece_equip, 'modele' => $modele, 'nom' => $type, 'etat' => $etat]);

						}


				}
			}
			if($equipmoteur){
				if($enspiece == null){$enspiece = [];}

					$pieces_de_equip = DB::table('Est_composé')->where('id_equipement', $equipmoteur['equipement']['id_equipement'])->get()->toArray();
		
						foreach($pieces_de_equip as $piece_equip){
							
							$piece_equi = Piece::where('id_piece', $piece_equip->id_piece)->get()[0]->toArray();
							$modele = DB::table('Modele')->where('id_modele',  $piece_equi['id_modele'])->value('nom_modele');
							$type = DB::table('Type_piece')->where('id_type_piece',  $piece_equi['id_type_piece'])->value('nom_type_piece');
							$etat = DB::table('Etat')->where('id_etat', $piece_equi['id_etat'])->value('desc_etat');
							array_push($enspiece, ['piece' =>  $piece_equi, 'modele' => $modele, 'nom' => $type, 'etat' => $etat]);

						}


			}

			$entretiens = Entretien::where('id_bateau', $id)->get()->toArray();
			$immatr = Immatriculation::where('id_immatr', $boat['id_immatr'])->get()[0]->toArray();
			

			if(isset($boat)){
				
		    		return view('boat', ['boat' => $boat, 'equipements' => $ensequip , 'pieces' => $enspiece, 'moteur' => $moteur, 'equipmoteur' => $equipmoteur, 'entretiens' => $entretiens, 'immatr' => $immatr]);
			}
			else{
				return view('404');
			}
		
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
    public function update($id)
    {
        
	$idu = Auth::user()->id;
	
	if(DB::table('Possede')->where('id_bateau', $id)->value('id_utilisateur')==$idu or Auth::user()->type_utilisateur == 2){

		if(Auth::user()->type_utilisateur == 2){//Ajout de pièces/equip

			if($id_equipements = DB::table('Comporte')->where('id_bateau', $id)->get()){

				$ensequip = [];

				foreach($id_equipements as $id_equip){
				
					$equip = Equipement::where('id_equipement', $id_equip->id_equipement)->get()[0]->toArray();
					$modele = DB::table('Modele')->where('id_modele', $equip['id_modele'])->value('nom_modele');
					$type = DB::table('Type_equipement')->where('id_type_equipement', $equip['id_type_equipement'])->value('nom_type_equipement');
					array_push($ensequip, ['equipement' => $equip, 'modele' => $modele, 'nom' => $type]);
				}
				
				return view('update-boat-adm', ['boat' => $id, 'equipements' => $ensequip]);
			}
			else{
				return view('update-boat-adm', ['boat' => $id]);
			}
		}

		else{

			return view('update-boat', ['boat' => $id]);

		}
	}
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
