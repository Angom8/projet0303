<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    public function modeles(){
		return $this->belongsToMany(Modele::class, 'produit_par', 'id_modele', 'id_marque');
	}
}
