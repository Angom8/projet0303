<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moteur extends Model {
	public $timestamps = false;
	protected $table = 'Moteur';

	protected $fillable = [
        'id_moteur', 'puissance_moteur', 'kilometrage','horametre_compte', 'id_equipement',
    ];
	
    public function equipement(){
		return $this->belongsTo(Equipement::class);
	}
	
	public function bateau(){
		return $this->belongsTo(Bateau::class);
	}
}
