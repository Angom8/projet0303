<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    public function villes(){
		return $this->hasMany(Ville::class);
	}
}
