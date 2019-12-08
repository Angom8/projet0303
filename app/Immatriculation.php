<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immatriculation extends Model
{
	protected $fillable = [
		'id_immatr', 'date_immatr'
	];
	
    public function immatriculation(){
		return $this->BelongsTo(Bateau::class);
	}
}
