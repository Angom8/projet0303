<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Message;
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
