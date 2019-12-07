<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moteur extends Model {
	
	protected $fillable = [
        'id_moteur', 'puisance_moteur', 'kilometrage','horametre_compte'
    ];
	
    public function equipement(){
		return $this->belongsTo(Equipement::class);
	}
	
	public function bateau(){
		return $this->belongsTo(Bateau::class);
	}
}
