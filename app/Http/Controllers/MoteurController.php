<?php

namespace App\Http\Controllers;

use App\Moteur;
use App\Http\Controllers\EquipementController;
use Illuminate\Http\Request;

class MoteurController extends Controller
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
     * @param  \App\Moteur  $moteur
     * @return \Illuminate\Http\Response
     */
    public function show(Moteur $moteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Moteur  $moteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Moteur $moteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Moteur  $moteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moteur $moteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Moteur  $moteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	id_equip = Moteur::where('id_moteur', $id)->value('id_equipement');
	EquipementController::destroy($id_equip);
	Moteur::where('id_moteur', $id)->destroy();

    }
}
