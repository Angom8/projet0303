<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{

	public $timestamps = false;
	protected $table = 'Modele';

	protected $fillable = [
		'id_modele',
		'nom_modele'
	];
	
    public function marques(){
		return $this->belongsToMany(Marque::class, 'produit_par', 'id_modele', 'id_marque');
	}
	
	public function pieces(){
		return $this->hasMany('App/Piece', 'est_renseigné_sous', 'id_modele', 'id_piece');
	}
	
	public function equipements(){
		return $this->hasMany('App/Equipement', 'est_renseigné_sous', 'id_modele', 'id_equipement');
	}
	
	public function bateaus(){
		return $this->hasMany('App/Bateau', 'est_renseigné_sous', 'id_modele', 'id_bateau');
	}
}
