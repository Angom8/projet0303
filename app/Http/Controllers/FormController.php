<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Message;
use App\Entretien;
use App\Bateau;
use App\Immatriculation;	
use App\Moteur;
use App\Fournisseur;	
use App\Piece;
use App\Equipement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
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
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit(Accident $accident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accident $accident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accident $accident)
    {
        //
    }
}
