<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    public function adresse(){
		return $this->belongsTo(Adresse::class);
	}
	
	 public function Bateaus(){
		return $this->hasMany(Bateau::class);
	}
}
