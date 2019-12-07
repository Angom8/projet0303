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
	
}
