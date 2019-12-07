<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    public function piece(){
		return $this->hasMany('App\Piece', 'est_dans', 'id_etat', 'id_piece');
	}
	
	public function equipement(){
		return $this->hasMany('App\Equipement', 'est_dans', 'id_etat', 'id_equipement');
	}
}
