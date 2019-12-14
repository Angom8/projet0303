<?php

namespace App\Http\Controllers;

use App\Equipement;
use Illuminate\Http\Request;
use App\Http\Controllers\PieceController;
use Illuminate\Support\Facades\DB;

class EquipementController extends Controller
{

    /**
     * Remove the Equipment from its boat. We don't directly delete it to keep it in Entretien.
     *
     * @param  Equipment's ID
     */
    public function destroy_from_boat($id)
    {
	DB::table('Comporte')->where('id_equipement', $id)->delete();
	return back(); 
    }

    /**
     * Remove the Equipment from the database (Complete boat deletion). We directly delete it.
     *
     * @param  Equipment's ID
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
