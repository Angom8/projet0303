<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    public function marques(){
		return $this->belongsToMany(Marque::class, 'produit_par', 'id_marque', 'id_modele');
	}
}
