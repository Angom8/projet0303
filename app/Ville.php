<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function pays(){
		return $this->belongsTo(Pays::class);
	}
	
	public function adresses(){
		return $this->hasMany(Adresse::class);
	}
}
