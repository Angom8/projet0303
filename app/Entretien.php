<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
	public $timestamps = false;
	protected $table = 'Entretien';
	protected $fillable = [
       'id_entretien', 'date_entretien', 'id_bateau', 'id_equipement', 'id_piece', 'libellé'
    ];
	
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
