<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
public $timestamps = false;
protected $table = 'Ville';
	
	 protected $fillable = [
        'id_ville', 'nom_ville', 'code_postal', 'id_pays'
    ];
	
    public function pays(){
		return $this->belongsTo(Pays::class);
	}
	
	public function adresses(){
		return $this->hasMany(Adresse::class);
	}
}
