<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    public function bateaus() {
		return $this->belongsToMany('App\Entretien', 'reçoit', 'id_entretien', 'id_bateau');
	}
	
	public function pieces() {
		return $this->belongsToMany('App\Piece', 'concerne', 'id_entretien', 'id_piece');
	}
	
	public function equipements() {
		return $this->belongsToMany('App\Piece', 'concerne', 'id_entretien', 'id_equipement');
	}
}
