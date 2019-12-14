<?php

namespace App\Http\Controllers;

use App\Moteur;
use App\Http\Controllers\EquipementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoteurController extends Controller
{

    /**
     * Remove the link between a boat and a moteur (Similar to destroy_from_boat from EquipementController)
     *
     * @param  Moteur's ID
     */
    public function destroy_from_boat($id)
    {
	DB::table('Bateau')->where('id_bateau', $id)->update(['id_moteur' => null]);
	return back(); 
    }

    /**
     * Remove completly a moteur from database
     *
     * @param  Moteur's ID
     */
    public function destroy($id)
    {
	$id_equip = Moteur::where('id_moteur', $id)->value('id_equipement');
	(new EquipementController)::destroy($id_equip);
	Moteur::where('id_moteur', $id)->delete();

    }
}
