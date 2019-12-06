<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immatriculation extends Model
{
    public function immatriculation(){
		return $this->BelongsTo(Bateau::class);
	}
}
