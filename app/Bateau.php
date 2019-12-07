<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bateau extends Model
{
    public function immatriculation(){
		return $this->hasOne(Immatriculation::class);
	}
	
	public function accidents()
    {
        return $this->belongsToMany('App\Accident', 'est_impliqué', 'id_bateau', 'id_accident');
    }
	
	public function utilisateurs() {
        return $this->belongsToMany('App\Utilisateur', 'possède', 'id_bateau', 'id_utilisateur');
    }
	
	public function utilisateurs() {
        return $this->belongsToMany('App\Utilisateur', 'utilise_couramment', 'id_bateau', 'id_utilisateur');
    }
	
	public function ports()
    {
        return $this->belongsTo('App\Port');
    }
}
