<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Message;
use App\Entretien;
use App\Bateau;
use App\Immatriculation;
use App\Type_equipement;
use App\Type_piece;
use App\Marque;
use App\Modele;	
use App\Moteur;
use App\Fournisseur;	
use App\Etat;
use App\Piece;
use App\Equipement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
/*Handling Forms controller*/
class FormController extends Controller
{

    /**
     * Check and send a mail request
     *
     * @param  Request
     */
    public function contact(Request $request)
    {
       		    if(isset($request->inputMsg)
			&& isset($request->inputNom)
			&& isset($request->inputPrenom) 
			&& isset($request->inputProblem)
			&& isset($request->inputMail)
			){

			$entete  = 'MIME-Version: 1.0' . "\r\n";
			$entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$entete .= 'De: ' . htmlentities($request->inputMail) . "\r\n";
			$objet = 'Message depuis le site '.htmlentities($request->inputProblem);

			$mail_cleaning = array("content-type","bcc:","to:","cc:","href");
   			$msg = str_replace($mail_cleaning,"",htmlentities($request->inputMsg));


			$message = '<h1>'.$objet.'</h1>
			<p><strong>' . htmlentities($request->inputNom) .' '. htmlentities($request->inputPrenom) .'</strong> a écrit :</p>
			<p><strong>Message : </strong>' . $msg . '</p>';

			$desti = 'ohmonbato@orange.fr';

			if($retour = mail($desti,  $objet, $message, $entete)){
				return view('contact', ['contactmail' => 1]);
			}
			else{
				return view('contact', ['contactmail' => 0]);
			}
			}
			else{
				return view('contact', ['contactmail' => 0]);
			}

	}

    /**
     * Check and send a new boat request from an User
     *
     * @param  Request
     */
    public function sendboat(Request $request)
    {
       		   	 if(isset($request->id_utilisateur)
				&& $request->hasFile('joint'))
				{
					$data = [
					    	'id_utilisateur' => $request->id_utilisateur,
					   	];
	
					$validator = Validator::make($data, [
					    	'id_utilisateur' => ['required', 'int'],
					]);
						
					 if ($validator->fails()) {
            					return back()->withErrors($validator)->withInput();
       					 }
 					else{
						$message = htmlentities($request->id_utilisateur).' create bateau';					
						$i = 1;
						
						foreach ($request->file('joint') as $file) {
							

							if ($file->isValid()) {
							    if($file->extension() == 'png'
								||$file->extension() == 'PNG'
								||$file->extension() == 'JPEG'
								||$file->extension() == 'jpeg'
								||$file->extension() == 'jpg'
								||$file->extension() == 'JPG'
								||$file->extension() == 'pdf'
								||$file->extension() == 'PDF'){

								$file->storeAs('user_upload', 'user'.htmlentities($request->id_bateau).'_'.htmlentities($request->id_utilisateur).'create'.$i.'.'.$file->extension(), 'user_upload');
								$message .= 'join:'.htmlentities($request->id_bateau).htmlentities($request->id_utilisateur).'create'.$i.'.'.$file->extension();
								$i += 1;

							    }
							    else{
								$message .= "echectype".$i;
								}
							}	
							else{
								$message .= "echecvalid".$i;
							}


						}
						
							$timestamp = time();
							$date = new \DateTime();
							$date->setTimestamp($timestamp);

							try{
							Message::create([
								   'date_msg' => $date,
								    'libellé' => $message,
								    'id_utilisateur' => htmlentities($request->id_utilisateur),
								    'id_bateau' => null,
							]);
							}
							catch(Exception $e){return view('send-boat', ['contactmail' => 0]);
							}
							return view('send-boat', ['contactmail' => 1]);

					}
				}

			else{
				return view('user-global');
			}

	}

    /**
     * Check and create a new boat
     *
     * @param  Request
     */
    public function add_boat(Request $request)
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
				&& isset($request->jauge_liquide_refroidissement)
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
				&& isset($request->id_utilisateur)
				){
		
					$data = ['nom_bateau' => $request->nom_bateau,
						'url_photo' => $request->url_photo,
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
						'jauge_liquide_refroidissement' => $request->jauge_liquide_refroidissement,
						'nb_mat' => $request->nb_mat,
						'surface_voilure' => $request->surface_voilure,
						'dimension_x_bateau' => $request->dimension_x_bateau,
						'dimension_y_bateau' => $request->dimension_y_bateau,
						'dimension_z_bateau' => $request->dimension_z_bateau,
						'volume_coque' => $request->volume_coque,
						'consommation' => $request->consommation,
						'masse_navire' => $request->masse_navire,
						'created_at' => $request->created_at,
						'id_immatr' => $request->id_immatr,
					];

					
					$dataim = ['id_immatr' => $request->id_immatr,
						'date_immatr' => $request->date_immatr];

					$users = $request->id_utilisateur;
					
					$validator = Validator::make($data, [
						'url_photo' => ['required', 'string', 'min:8', 'max:200'],
						'ancienne_cat' => ['required', 'int', 'min:1', 'max:6'],
						'auto_videur' => ['required', 'int', 'min:0', 'max:1'],
						'hors_bord' => ['required', 'int', 'min:0', 'max:1'],
						'francise' =>['required', 'int', 'min:0', 'max:1'],
						'distance_eloignement' => ['required', 'int', 'min:0'],
						'nb_places' => ['required', 'int', 'min:1'],
						'force_vent_max' => ['required', 'int', 'min:0'],
						'hauteur_max_vagues' => ['required', 'int', 'min:0'],
						'niveau_reserve' => ['required', 'int', 'min:0'],
						'niveau_carburant_max' => ['required', 'int', 'min:0'],
						'niveau_performance' => ['required', 'int', 'min:0', 'max:100'],
						'jauge_brut' => ['required', 'int', 'min:0'],
						'niveau_huile' => ['required', 'int', 'min:0'],
						'jauge_liquide_refroidissement' => ['required', 'int', 'min:0'],
						'nb_mat' => ['required', 'int', 'min:0'],
						'surface_voilure' => ['required', 'int', 'min:0'],
						'dimension_x_bateau' => ['required', 'int', 'min:0'],
						'dimension_y_bateau' => ['required', 'int', 'min:0'],
						'dimension_z_bateau' => ['required', 'int', 'min:0'],
						'volume_coque' => ['required', 'int', 'min:0'],
						'consommation' =>['required', 'int', 'min:0'],
						'masse_navire' => ['required', 'int', 'min:0'],
						'created_at' =>  ['required', 'date'],
						'id_immatr' => ['required', 'string'],
					]);

					$validator2 = Validator::make($dataim, [
						'date_immatr' =>  ['required', 'date'],
						'id_immatr' => ['required', 'string'],
						
					]);

					if ($validator->fails()) {
						return back()->withErrors($validator)->withInput();
					}
					if ($validator2->fails()) {
						return back()->withErrors($validator2)->withInput();
					}

					try{
						Immatriculation::create($dataim);
						Bateau::create($data);

						$id_bateau = Bateau::where('id_immatr', $dataim['id_immatr'])->value('id_bateau');

						foreach($users as $user){
							DB::table('Possede')->insert(['id_bateau' => $id_bateau, 'id_utilisateur' => $user]);
						}
						
						
					}
					catch(Exception $e){
						$timestamp = time();
							$date = new \DateTime();
							$date->setTimestamp($timestamp);
						Message::create([
							    'date_msg' => $date,
							    'libellé' => 'Une inscription dans la base de donnée a échouée',
							    'id_utilisateur' => 1,
							    'id_bateau' =>null,
							
						]);
						return back();
					}

					return redirect()->route('boat.show', ['id' => $id_bateau]); 
		}
		else{
			return back()->with(['contact' => 0]);
		}


    }

    /**
     * Check and create a new Fournisseur
     *
     * @param  Request
     */

    public function createFournisseur(Request $request)
    {
	$data = $request->all();
	$validator = Validator::make($data, [
           	 'mail_fourni' => ['required', 'string', 'email', 'max:255', 'unique:Fournisseur'],
		'nom_fourni' => ['required', 'string', 'max:255'],
		'tel_fourni' => ['required', 'string', 'max:50'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
	try{
		Fournisseur::create([
			        'mail_fourni' => $data['mail_fourni'],
				'nom_fourni' => $data['nom_fourni'],
				'tel_fourni' => $data['tel_fourni'],
			]);
	}
	catch(Exception $e){return back();}
	
	return redirect()->route('fournisseurs'); 

    }

    /**
     * Check and add a Piece Type to Fournit, linked to a Fournisseur
     *
     * @param  Request
     */
    public function addPieceFournisseur(Request $request)
    {
	$data = $request->all();
	$validator = Validator::make($data, [
           	 'id_fourni' => ['required', 'int', 'min:0'],
		'id_type_piece' => ['required', 'int', 'min:0'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
	try{
		DB::table('Fournit')->insert(['id_fourni' => $data['id_fourni'], 'id_type_piece' => $data['id_type_piece'], 'id_type_equipement' => null]);
	}
	catch(Exception $e){return back();}
	
	return redirect()->route('fournisseur.show', ['id' => $date['id_fourni']]); 

    }

    /**
     * Check and add an Equipment Type to Fournit, linked to a Fournisseur
     *
     * @param  Request
     */
    public function addEquipFournisseur(Request $request)
    {
	$data = $request->all();
	$validator = Validator::make($data, [
           	 'id_fourni' => ['required', 'int', 'min:0'],
		'id_type_equip' => ['required', 'int', 'min:0'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
	try{
		DB::table('Fournit')->insert(['id_fourni' => $data['id_fourni'], 'id_type_equip' => $data['id_type_equip'], 'id_type_piece' => null]);
	}
	catch(Exception $e){return back();}
	
	return redirect()->route('fournisseur.show', ['id' => $date['id_fourni']]); 

    }

    /**
     * Check and add an Owner to a boat, via Possede
     *
     * @param  Request
     */
    public function owner_add(Request $request)
    {
	$data = $request->all();
	$validator = Validator::make($data, [
           	 'id_utilisateur' => ['required', 'int', 'min:0'],
		 'id_bateau' => ['required', 'int', 'min:0'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
	try{
		DB::table('Comporte')->insert(['id_bateau' => $data['id_bateau'], 'id_utilisateur' => $data['id_utilisateur']]);

	}
	catch(Exception $e){return back();}
	
	return redirect()->route('boat.admin.owner'); 

    }

    /**
     * Check and remove an Owner to a boat, via Possede
     *
     * @param  Request
     */
    public function owner_remove(Request $request)
    {
	$data = $request->all();
	$validator = Validator::make($data, [
           	 'id_utilisateur' => ['required', 'int', 'min:0'],
		 'id_bateau' => ['required', 'int', 'min:0'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
	try{
		DB::table('Comporte')->where(['id_bateau' => $data['id_bateau'], 'id_utilisateur' => $data['id_utilisateur']])->delete();

	}
	catch(Exception $e){return back();}
	
	return redirect()->route('boat.admin.owner'); 

    }

    /**
     * Check and create an Entretien
     *
     * @param  Request
     */
    public function genEntretien(Request $request)
    {

 		if(isset($request->id_bateau)
				&& isset($request->date_entretien) 
				&& isset($request->libelle)){
		
				if(isset($request->id_piece)){
					if(isset($request->id_equip)){
						$data = ['id_bateau' => $request->id_bateau,
						    	'id_equipement' => $request->id_equip,
						   	'libellé' => $request->libelle,
							'id_piece' => $request->id_piece,
							'date_entretien' => $request->date_entretien];
	
						$validator = Validator::make($data, [
						    	'id_bateau' => ['required', 'int'],
						    	'id_equipement' => ['required', 'int'],
						   	'libellé' => ['required', 'string', 'min:8', 'max:200'],
							'id_piece' => ['required', 'int'],
							'date_entretien' => ['required', 'date'],
						]);
						 if ($validator->fails()) {
            						return back()->withErrors($validator)->withInput();
						}
       					}
 					else{
						$data = ['id_bateau' => $request->id_bateau,
						    	'id_equipement' => null,
						   	'libellé' => $request->libelle,
							'id_piece' => $request->id_piece,
							'date_entretien' => $request->date_entretien];
	
						$validator = Validator::make($data, [
						    	'id_bateau' => ['required', 'int'],
						   	'libellé' => ['required', 'string', 'min:8', 'max:120'],
							'id_piece' => ['required', 'int'],
							'date_entretien' => ['required', 'date'],
						]);
						 if ($validator->fails()) {
            						return back()->withErrors($validator)->withInput();
						}
					}	
				}
				else{
					if(isset($request->id_equip)){
						$data = ['id_bateau' => $request->id_bateau,
						    	'id_equipement' => $request->id_equip,
						   	'libellé' => $request->libelle,
							'id_piece' => null,
							'date_entretien' => $request->date_entretien];
	
						$validator = Validator::make($data, [
						    	'id_bateau' => ['required', 'int'],
						    	'id_equipement' => ['required', 'int'],
						   	'libellé' => ['required', 'string', 'min:8', 'max:120'],
							'date_entretien' => ['required', 'date'],
						]);
						 if ($validator->fails()) {
            						return back()->withErrors($validator)->withInput();
						}
					}	
					else{
							$data = ['id_bateau' => $request->id_bateau,
						    	'id_equipement' => null,
						   	'libellé' => $request->libelle,
							'id_piece' => null,
							'date_entretien' => $request->date_entretien];
	
						$validator = Validator::make($data, [
						    	'id_bateau' => ['required', 'int'],
						   	'libellé' => ['required', 'string', 'min:8', 'max:120'],
							'date_entretien' => ['required', 'date'],
						]);
						if ($validator->fails()) {
            						return back()->withErrors($validator)->withInput();
						}
					}
				}
				try{
					Entretien::create($data);
					return redirect()->route('admin.messages');
				}
				catch(Exception $e){return back();}
		
		}
		else{
			return view('user-global');
		}
    }

    /**
     * Check and send an update boat request
     *
     * @param  Request
     */

    public function updateboat(Request $request)
    {
       		   	 if(isset($request->id_bateau)
				&& isset($request->id_utilisateur)
				&& isset($request->msg) 
				&& isset($request->type_update)
				&& $request->hasFile('joint'))
				{
					$data = ['id_bateau' => $request->id_bateau,
					    	'id_utilisateur' => $request->id_utilisateur,
					   	 'msg' => $request->msg,
						'type_update' => $request->type_update];
	
					$validator = Validator::make($data, [
					    	'id_bateau' => ['required', 'int'],
					    	'id_utilisateur' => ['required', 'int'],
					   	 'msg' => ['required', 'string', 'min:8', 'max:120'],
						'type_update' => ['required', 'string'],
					]);
						
					 if ($validator->fails()) {
            					return back()->withErrors($validator)->withInput();
       					 }
 					else{

						$message = htmlentities($request->msg);

						$file = $request->file('joint');
						if ($file->isValid()) {
						    if($file->extension() == 'png'
							||$file->extension() == 'PNG'
							||$file->extension() == 'JPEG'
							||$file->extension() == 'jpeg'
							||$file->extension() == 'jpg'
							||$file->extension() == 'JPG'
							||$file->extension() == 'pdf'
							||$file->extension() == 'PDF'){

							$file->storeAs('user_upload', htmlentities($request->id_bateau).'_'.htmlentities($request->id_utilisateur).$file->getClientOriginalName(), 'user_upload');
							$message .= ' Piece jointe (Dossier user_upload du FTP) : '.htmlentities($request->id_bateau).htmlentities($request->id_utilisateur).$file->getClientOriginalName();
						    }
						    else{
							$message .= "L'utilisateur a voulu lié un fichier, mais celui-ci n'est pas du bon type";
							}
						}	
						else{
							$message .= "L'utilisateur a voulu lié un fichier, mais celui-ci n'était pas bon (Fichier .htacess par exemple)";
						}

							$timestamp = time();
							$date = new \DateTime();
							$date->setTimestamp($timestamp);

							Message::create([
							    'date_msg' => $date,
							    'libellé' => $message,
							    'id_utilisateur' => htmlentities($request->id_utilisateur),
							    'id_bateau' => htmlentities($request->id_bateau),
							]);

							return view('update-boat', ['boat' => htmlentities($request->id_bateau), 'contactmail' => 1]);

					}
				}

			else{
				return view('user-global');
			}

	}

    /**
     * Check and add an Equipement to a boat, via Comporte
     *
     * @param  Request
     */
    public function update_equip(Request $request)
    {

 		if(isset($request->id_bateau)
				&& isset($request->nom_marque) 
				&& isset($request->nom_modele)
				&& isset($request->desc_etat)
				&& isset($request->duree_vie_equip)
				&& isset($request->revision_periodique_equip)
				&& isset($request->quantite_equip)
				&& isset($request->equip_origine)
				&& isset($request->q_equip_rechange)
				&& isset($request->created_at)
				&& isset($request->updated_at)
				&& isset($request->nom_type_equipement)
				){
		
					$data = ['nom_marque' => $request->nom_marque,
						'nom_modele' => $request->nom_modele,
						'desc_etat' => $request->desc_etat,
						'duree_vie_equip' => $request->duree_vie_equip,
						'revision_periodique_equip' => $request->revision_periodique_equip,
						'quantite_equip' => $request->quantite_equip,
						'equip_origine' => $request->equip_origine,
						'q_equip_rechange' => $request->q_equip_rechange,
						'id_bateau' => $request->id_bateau,
						'created_at' => $request->created_at,
						'updated_at' => $request->updated_at,
						'nom_type_equipement' => $request->nom_type_equipement,
					];
					
					$validator = Validator::make($data, [
						'nom_marque' => ['required', 'string', 'max:125'],
						'nom_modele' => ['required', 'string', 'max:125'],
						'desc_etat' => ['required', 'string', 'min:0', 'max:255'],
						'duree_vie_equip' => ['required', 'min:0'],
						'revision_periodique_equip' =>  ['required', 'min:0'],
						'quantite_equip' =>  ['required', 'int', 'min:1'],
						'equip_origine' => ['required', 'int', 'min:0', 'max:1'],
						'q_equip_rechange' =>['required', 'int', 'min:0'],
						'id_bateau' => ['required', 'int', 'min:1'],
						'created_at' => ['required', 'date'],
						'updated_at' => ['required', 'date'],
						'nom_type_equipement' => ['required', 'string', 'min:0'],
					]);

					if ($validator->fails()) {
						return back()->withErrors($validator)->withInput();
					}

					try{
							if($id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele')){
								
							}
							else{
								Modele::create([
								    'nom_modele' => $data['nom_modele'],
								]);
								$id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele');
							}

							if($id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque')){
								
							}
							else{
								Marque::create([
								    'nom_marque' => $data['nom_marque'],
								]);
								$id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque');
							}
							if($id_type = DB::table('Type_equipement')->where('nom_type_equipement', $data['nom_type_equipement'])->value('id_type_equipement')){
								
							}
							else{
								Type_equipement::create([
								    'nom_type_equipement' => $data['nom_type_equipement'],
								]);
								$id_type = DB::table('Type_equipement')->where('nom_type_equipement', $data['nom_type_equipement'])->value('id_type_equipement');
							}

							if($id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat')){
								
							}
							else{
								Etat::create([
								    'desc_etat' => $data['desc_etat'],
								]);
								$id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat');
							}

							$equipement = Equipement::insertGetId([
								'created_at' => $data['created_at'],
								'updated_at' => $data['updated_at'],
								'id_modele' => $id_modele,
								'id_etat' => $id_etat,
								'id_type_equipement' => $id_type,
								'duree_vie_equip' => $data['duree_vie_equip'],
								'revision_periodique_equip' => $data['revision_periodique_equip'],
								'quantite_equip' => $data['quantite_equip'],
								'equip_origine' => $data['equip_origine'],
								'q_equip_rechange' => $data['q_equip_rechange'],
							], 'id_equipement');

							DB::table('Comporte')->insert(['id_bateau' => $data['id_bateau'], 'id_equipement' => $equipement->id_equipement]);

							

					}
					catch(Exception $e){

						return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]);
					}

					return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]); 
		}
		else{
			return back();
		}


    }

    /**
     * Check and add a Piece to a boat, via Comporte
     *
     * @param  Request
     */
    public function update_piece(Request $request)
    {

 		if(isset($request->id_bateau)
				&& isset($request->nom_marque) 
				&& isset($request->nom_modele)
				&& isset($request->desc_etat)
				&& isset($request->duree_vie_piece)
				&& isset($request->revision_periodique_piece)
				&& isset($request->quantite_piece)
				&& isset($request->piece_origine)
				&& isset($request->q_piece_rechange)
				&& isset($request->created_at)
				&& isset($request->updated_at)
				&& isset($request->nom_type_piece)
				){
		
					$data = ['nom_marque' => $request->nom_marque,
						'nom_modele' => $request->nom_modele,
						'desc_etat' => $request->desc_etat,
						'duree_vie_piece' => $request->duree_vie_piece,
						'revision_periodique_piece' => $request->revision_periodique_piece,
						'quantite_piece' => $request->quantite_piece,
						'piece_origine' => $request->piece_origine,
						'q_piece_rechange' => $request->q_piece_rechange,
						'id_bateau' => $request->id_bateau,
						'created_at' => $request->created_at,
						'updated_at' => $request->updated_at,
						'nom_type_piece' => $request->nom_type_piece,
					];
					
					$validator = Validator::make($data, [
						'nom_marque' => ['required', 'string', 'max:125'],
						'nom_modele' => ['required', 'string', 'max:125'],
						'desc_etat' => ['required', 'string', 'min:0', 'max:255'],
						'duree_vie_piece' => ['required', 'min:0'],
						'revision_periodique_piece' =>  ['required', 'min:0'],
						'quantite_piece' =>  ['required', 'int', 'min:1'],
						'piece_origine' => ['required', 'int', 'min:0', 'max:1'],
						'q_piece_rechange' =>['required', 'int', 'min:0'],
						'id_bateau' => ['required', 'int', 'min:1'],
						'created_at' => ['required', 'date'],
						'updated_at' => ['required', 'date'],
						'nom_type_piece' => ['required', 'string', 'min:0'],
					]);

					if ($validator->fails()) {
						return back()->withErrors($validator)->withInput();
					}

					try{
							if($id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele')){
								
							}
							else{
								Modele::create([
								    'nom_modele' => $data['nom_modele'],
								]);
								$id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele');
							}

							if($id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque')){
								
							}
							else{
								Marque::create([
								    'nom_marque' => $data['nom_marque'],
								]);
								$id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque');
							}
							if($id_type = DB::table('Type_piece')->where('nom_type_piece', $data['nom_type_piece'])->value('id_type_piece')){
								
							}
							else{
								Type_piece::create([
								    'nom_type_piece' => $data['nom_type_piece'],
								]);
								$id_type = DB::table('Type_piece')->where('nom_type_piece', $data['nom_type_piece'])->value('id_type_piece');
							}

							if($id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat')){
								
							}
							else{
								Etat::create([
								    'desc_etat' => $data['desc_etat'],
								]);
								$id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat');
							}

							$piece = Piece::insertGetId([
								'created_at' => $data['created_at'],
								'updated_at' => $data['updated_at'],
								'id_modele' => $id_modele,
								'id_etat' => $id_etat,
								'id_type_piece' => $id_type,
								'duree_vie_piece' => $data['duree_vie_piece'],
								'revision_periodique_piece' => $data['revision_periodique_piece'],
								'quantite_piece' => $data['quantite_piece'],
								'piece_origine' => $data['piece_origine'],
								'q_piece_rechange' => $data['q_piece_rechange'],
							], 'id_piece');

							DB::table('Contient')->insert(['id_bateau' => $data['id_bateau'], 'id_piece' => $piece]);

					}
					catch(Exception $e){

						return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]);
					}

					return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]); 
		}
		else{
			return back();
		}


    }

    /**
     * Check and add a Piece to an Equipement, via Est Composé
     *
     * @param  Request
     */
    public function add_piece(Request $request)
    {

 		if(isset($request->id_bateau)
				&& isset($request->nom_marque) 
				&& isset($request->nom_modele)
				&& isset($request->desc_etat)
				&& isset($request->duree_vie_piece)
				&& isset($request->revision_periodique_piece)
				&& isset($request->quantite_piece)
				&& isset($request->piece_origine)
				&& isset($request->q_piece_rechange)
				&& isset($request->created_at)
				&& isset($request->updated_at)
				&& isset($request->nom_type_piece)
				&& isset($request->equip)
				){
		
					$data = ['nom_marque' => $request->nom_marque,
						'nom_modele' => $request->nom_modele,
						'desc_etat' => $request->desc_etat,
						'duree_vie_piece' => $request->duree_vie_piece,
						'revision_periodique_piece' => $request->revision_periodique_piece,
						'quantite_piece' => $request->quantite_piece,
						'piece_origine' => $request->piece_origine,
						'q_piece_rechange' => $request->q_piece_rechange,
						'id_bateau' => $request->id_bateau,
						'created_at' => $request->created_at,
						'updated_at' => $request->updated_at,
						'nom_type_piece' => $request->nom_type_piece,
						'id_equip' => $request->equip,
					];
					
					$validator = Validator::make($data, [
						'nom_marque' => ['required', 'string', 'max:125'],
						'nom_modele' => ['required', 'string', 'max:125'],
						'desc_etat' => ['required', 'string', 'min:0', 'max:255'],
						'duree_vie_piece' => ['required', 'min:0'],
						'revision_periodique_piece' =>  ['required', 'min:0'],
						'quantite_piece' =>  ['required', 'int', 'min:1'],
						'piece_origine' => ['required', 'int', 'min:0', 'max:1'],
						'q_piece_rechange' =>['required', 'int', 'min:0'],
						'id_bateau' => ['required', 'int', 'min:1'],
						'created_at' => ['required', 'date'],
						'updated_at' => ['required', 'date'],
						'nom_type_piece' => ['required', 'string', 'min:0'],
						'id_equip' => ['required', 'int', 'min:1'],
					]);

					if ($validator->fails()) {
						return back()->withErrors($validator)->withInput();
					}

					try{
							if($id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele')){
								
							}
							else{
								Modele::create([
								    'nom_modele' => $data['nom_modele'],
								]);
								$id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele');
							}

							if($id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque')){
								
							}
							else{
								Marque::create([
								    'nom_marque' => $data['nom_marque'],
								]);
								$id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque');
							}
							if($id_type = DB::table('Type_piece')->where('nom_type_piece', $data['nom_type_piece'])->value('id_type_piece')){
								
							}
							else{
								Type_piece::create([
								    'nom_type_piece' => $data['nom_type_piece'],
								]);
								$id_type = DB::table('Type_piece')->where('nom_type_piece', $data['nom_type_piece'])->value('id_type_piece');
							}

							if($id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat')){
								
							}
							else{
								Etat::create([
								    'desc_etat' => $data['desc_etat'],
								]);
								$id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat');
							}

							$piece = Piece::insertGetId([
								'created_at' => $data['created_at'],
								'updated_at' => $data['updated_at'],
								'id_modele' => $id_modele,
								'id_etat' => $id_etat,
								'id_type_piece' => $id_type,
								'duree_vie_piece' => $data['duree_vie_piece'],
								'revision_periodique_piece' => $data['revision_periodique_piece'],
								'quantite_piece' => $data['quantite_piece'],
								'piece_origine' => $data['piece_origine'],
								'q_piece_rechange' => $data['q_piece_rechange'],
							], 'id_piece');
							
							DB::table('Est_composé')->insert(['id_equipement' => $data['id_equip'], 'id_piece' => $piece]);

					}
					catch(Exception $e){

						return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]);
					}

					return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]); 
		}
		else{
			return back();
		}


    }

    /**
     * Check and add a Moteur to a boat
     *
     * @param  Request
     */
    public function update_moteur(Request $request)
    {

 		if(isset($request->id_bateau)
				&& isset($request->nom_marque) 
				&& isset($request->nom_modele)
				&& isset($request->desc_etat)
				&& isset($request->duree_vie_equip)
				&& isset($request->revision_periodique_equip)
				&& isset($request->quantite_equip)
				&& isset($request->equip_origine)
				&& isset($request->q_equip_rechange)
				&& isset($request->created_at)
				&& isset($request->updated_at)
				&& isset($request->nom_type_equipement)
				&& isset($request->horametre_compte)
				&& isset($request->puissance_moteur)
				&& isset($request->kilometrage)
				){
		
					$data = ['nom_marque' => $request->nom_marque,
						'nom_modele' => $request->nom_modele,
						'desc_etat' => $request->desc_etat,
						'duree_vie_equip' => $request->duree_vie_equip,
						'revision_periodique_equip' => $request->revision_periodique_equip,
						'quantite_equip' => $request->quantite_equip,
						'equip_origine' => $request->equip_origine,
						'q_equip_rechange' => $request->q_equip_rechange,
						'id_bateau' => $request->id_bateau,
						'created_at' => $request->created_at,
						'updated_at' => $request->updated_at,
						'nom_type_equipement' => $request->nom_type_equipement,
						'horametre_compte' => $request->horametre_compte,
						'puissance_moteur' => $request->puissance_moteur,
						'kilometrage' => $request->kilometrage,
					];
					
					$validator = Validator::make($data, [
						'nom_marque' => ['required', 'string', 'max:125'],
						'nom_modele' => ['required', 'string', 'max:125'],
						'desc_etat' => ['required', 'string', 'min:0', 'max:255'],
						'duree_vie_equip' => ['required', 'min:0'],
						'revision_periodique_equip' =>  ['required', 'min:0'],
						'quantite_equip' =>  ['required', 'int', 'min:1'],
						'equip_origine' => ['required', 'int', 'min:0', 'max:1'],
						'q_equip_rechange' =>['required', 'int', 'min:0'],
						'id_bateau' => ['required', 'int', 'min:1'],
						'created_at' => ['required', 'date'],
						'updated_at' => ['required', 'date'],
						'nom_type_equipement' => ['required', 'string', 'min:0'],
						'horametre_compte' => ['required', 'int', 'min:0'],
						'puissance_moteur' => ['required', 'int', 'min:0'],
						'kilometrage' => ['required', 'int', 'min:0'],
					]);

					if ($validator->fails()) {
						return back()->withErrors($validator)->withInput();
					}

					try{
							if($id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele')){
								
							}
							else{
								Modele::create([
								    'nom_modele' => $data['nom_modele'],
								]);
								$id_modele = DB::table('Modele')->where('nom_modele', $data['nom_modele'])->value('id_modele');
							}

							if($id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque')){
								
							}
							else{
								Marque::create([
								    'nom_marque' => $data['nom_marque'],
								]);
								$id_marque = DB::table('Marque')->where('nom_marque', $data['nom_marque'])->value('id_marque');
							}
							if($id_type = DB::table('Type_equipement')->where('nom_type_equipement', $data['nom_type_equipement'])->value('id_type_equipement')){
								
							}
							else{
								Type_equipement::create([
								    'nom_type_equipement' => $data['nom_type_equipement'],
								]);
								$id_type = DB::table('Type_equipement')->where('nom_type_equipement', $data['nom_type_equipement'])->value('id_type_equipement');
							}

							if($id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat')){
								
							}
							else{
								Etat::create([
								    'desc_etat' => $data['desc_etat'],
								]);
								$id_etat = DB::table('Etat')->where('desc_etat', $data['desc_etat'])->value('id_etat');
							}

							$equipement = Equipement::insertGetId([
								'created_at' => $data['created_at'],
								'updated_at' => $data['updated_at'],
								'id_modele' => $id_modele,
								'id_etat' => $id_etat,
								'id_type_equipement' => $id_type,
								'duree_vie_equip' => $data['duree_vie_equip'],
								'revision_periodique_equip' => $data['revision_periodique_equip'],
								'quantite_equip' => $data['quantite_equip'],
								'equip_origine' => $data['equip_origine'],
								'q_equip_rechange' => $data['q_equip_rechange'],
							], 'id_equipement');

							Moteur::create([
								'id_equip' => $data['$equipement'],
								'kilometrage' => $data['kilometrage'],
								'horametre_compte' => $data['horametre_compte'],
								'puissance_moteur' => $data['puissance_moteur'],
							]);
							

					}
					catch(Exception $e){

						return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]);
					}

					return redirect()->route('boat.admin.update', ['id' => $data['id_bateau']]); 
		}
		else{
			return back();
		}


    }
}
