<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
			$entete .= 'De: ' . htmlspecialchars($request->inputMail) . "\r\n";
			$objet = 'Message depuis le site '.htmlspecialchars($request->inputProblem);

			$message = '<h1>'.$objet.'</h1>
			<p><strong>' . htmlspecialchars($request->inputNom) .' '. htmlspecialchars($request->inputPrenom) .'</strong> a écrit :</p>
			<p><strong>Message : </strong>' . htmlspecialchars($request->inputMsg) . '</p>';

			$desti = 'ohmonbato@orange.fr';

			$retour = mail($desti,  $objet, $message, $entete);

			return view('contact', ['contactmail' => 1]);
			}
			else{
				return view('contact', ['contactmail' => 0]);
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
