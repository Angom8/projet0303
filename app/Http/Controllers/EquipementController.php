<?php

namespace App\Http\Controllers;

use App\Equipement;
use Illuminate\Http\Request;
use App\Http\Controllers\PieceController;
use Illuminate\Support\Facades\DB;

class EquipementController extends Controller
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
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function show(Equipement $equipement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipement $equipement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function destroy_from_boat($id)
    {
        $this->destroy($id);
	DB::table('Comporte')->where('id_equipement', $id)->delete();
	return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$compose = DB::table('Est_composé')->where('id_equipement', $id)->get();
		foreach($compose as $piece){
			$id_piece = DB::table('Piece')->where('id_piece', $piece->id_piece)->value('id_piece');
			(new PieceController)->destroy($id_piece);
		}   
		 DB::table('Est_composé')->where('id_equipement', $id)->delete();
		 DB::table('Equipement')->where('id_equipement', $id)->delete();

    }
}
