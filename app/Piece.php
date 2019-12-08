<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
	
	protected $fillable = [
		'id_piece',
		'revisions_periodiques_piece',
		'duree_vie_piece',
		'quantite_piece',
		'piece_origine',
		'q_piece_rechange',
		'id_type_piece'
	];
	
    public function type_piece(){
		return $this->belongsTo(Type_piece::class);
	}
	
	public function bateaus() {
		return $this->belongsToMany('App\Bateau', 'contient', 'id_piece', 'id_bateau');
	}
	
	public function entretiens() {
		return $this->belongsToMany('App\Entretien', 'concerne', 'id_piece', 'id_entretien');
	}
	
	public function etat() {
		return $this->belongsTo('App\Etat', 'est_dans', 'id_piece', 'id_etat');
	}
	
	public function equipements() {
		return $this->belongsToMany('App\Equipement', 'est_composé', 'id_piece', 'id_equipement');
	}
	
	public function modele(){
		return $this->belongsTo('App/Modele', 'est_renseigné_sous', 'id_piece', 'id_modele');
	}
}
