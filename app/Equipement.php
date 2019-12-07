<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
	
	protected $fillable = [
		'id_equipement',
		'revisions_periodiques_equip',
		'duree_vie_equip',
		'equip_origine',
		'q_piece_rechange',
		'quantite_equip',
		'id_type_equipement'
	];
	
    public function type_equipement(){
		return $this->belongsTo(Type_equipement::class);
	}
	
    public function moteurs() {
		return $this->hasMany(Moteur::class);
	}
	
	public function bateaus() {
		return $this->belongsToMany('App\Bateau', 'comporte', 'id_equipement', 'id_bateau');
	}
	
	public function entretiens() {
		return $this->belongsToMany('App\Entretien', 'concerne' 'id_equipement', 'id_entretien',);
	}
	
	public function etat() {
		return $this->belongsTo('App\Etat', 'est_dans', 'id_equipement', 'id_etat');
	}
	
	public function pieces() {
		return $this->belongsToMany('App\Piece', 'est_composé', 'id_equipement', 'id_piece');
	}
}
