<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    public function ville(){
		return $this->belongsTo(Ville::class);
	}
	
	public function utilisateurs(){
		return $this->hasMany(Utilisateur::class);
	}
	
	public function fournisseurs() {
        return $this->belongsToMany('App\Fournisseur', 'est_localisé', 'id_adresse', 'id_fourni');
    }
	
	public function ports(){
		return $this->hasMany(Port::class);
	}
}
