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
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\MoteurController;

class BateauController extends Controller
{

    /**
     * Get all the users to add a first owner, then go to the form
     *
     * @return Create a boat form
     */
    public function add()
    {
	 $users = Utilisateur::get()->pluck('id');
         return view('add-boat', ['users' => $users]);
    }

    /**
     * Return the send a boat form for Users
     */
    public function send()
    {
        return view('send-boat');
    }

    /**
     * Show the boat
     *
     * @param  Boat's ID
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
     * Retrieve all ID from User, then show the add/remove owner form for boats/admin
     *
     * @param  Boat's ID
     */
    public function owner($id)
    {
        $id_users = Utilisateur::orderBy('id')->pluck('id');

	if($id_owners = DB::table('Possede')->where('id_bateau', $id)->orderBy('id_utilisateur')->pluck('id_utilisateur')){
	}
	else{$id_owners = null;}
	
	return view('add-boat-user', ['boat' => $id, 'users' => $id_users, 'owners' => $id_owners]);
    }

    /**
     * Retrieve all required infos about a boat to show the update form (depending on User's type)
     *
     * @param  Boat's ID
     */
    public function update($id)
    {
        
	$idu = Auth::user()->id;
	
	if(DB::table('Possede')->where('id_bateau', $id)->value('id_utilisateur')==$idu or Auth::user()->type_utilisateur == 2){

		if(Auth::user()->type_utilisateur == 2){//Ajout de pièces/equip

			if($id_equipements = DB::table('Comporte')->where('id_bateau', $id)->get()){

				$ensequip = [];

				foreach($id_equipements as $id_equip){
				
					$equip = Equipement::where('id_equipement', $id_equip->id_equipement)->value('id_equipement');
					array_push($ensequip, ['equipement' => $equip, 'moteur' => 0]);
				}

				if($id_moteur = DB::table('Bateau')->where('id_bateau', $id)->value('id_moteur')){
					$moteur = 1;
				}
				else{$moteur = 0;}

				return view('update-boat-adm', ['boat' => $id, 'equipements' => $ensequip, 'moteur' => $moteur]);
			}
			else{
				return view('update-boat-adm', ['boat' => $id, 'equipements' => null]);
			}
		}

		//moteur => si moteur : liste piece moteur
		else{

			return view('update-boat', ['boat' => $id]);

		}
	}
    }

    /**
     * Retire un bateau et toutes ses dépendances
     *
     * @param  Boat's ID
     */
    public function destroy($id)
    {
            	$boat= Bateau::where('id_bateau', $id)->get()[0];

		if($boat->id_moteur) {
			(new MoteurController)->destroy($boat->id_moteur);	
		}

		$comporte = DB::table('Comporte')->where('id_bateau', $id)->get();
		foreach($comporte as $equip){
			$id_equip = DB::table('Equipement')->where('id_equipement', $equip->id_equipement)->value('id_equipement');
			(new EquipementController)->destroy($id_equip);
		}
		 DB::table('Comporte')->where('id_bateau', $id)->delete();

		$contient = DB::table('Contient')->where('id_bateau', $id)->get();
		foreach($contient as $piece){
			$id_piece = DB::table('Piece')->where('id_piece', $piece->id_piece)->value('id_piece');
			(new PieceController)->destroy($id_piece);
		}
		DB::table('Contient')->where('id_bateau', $id)->delete();
		
		DB::table('Possede')->where('id_bateau', $id)->delete();
		DB::table('Entretien')->where('id_bateau', $boat->id_bateau)->delete();
		DB::table('Bateau')->where('id_bateau', $boat->id_bateau)->delete();
		

		DB::table('Immatriculation')->where('id_immatr', $boat->id_immatr)->delete();
    		return redirect()->route('boats'); 
    }
}
