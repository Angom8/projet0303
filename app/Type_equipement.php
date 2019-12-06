<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_equipement extends Model
{
    //
	protected $fillable = [
		'id_type_equipement', 'nom_type_equipement'
	];
	
	public function equipements() {
		return $this->hasMany(Equipement::class);
	}
}
