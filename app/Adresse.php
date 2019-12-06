<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    public function ville(){
		return $this->belongsTo(Ville::class);
	}
}
