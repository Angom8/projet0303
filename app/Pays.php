<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
public $timestamps = false;
protected $table = 'Pays';
	
	protected $fillable = [
		'id_pays',
		'nom_pays',
		'planete',
	];
	
    public function villes(){
		return $this->hasMany(Ville::class);
	}
}
