<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
public $timestamps = false;
protected $table = 'Adresse';
	protected $fillable = [
        'id_adresse', 'numero_adresse', 'voierie', 'id_ville'
	];
	
    public function ville(){
		return $this->belongsTo(Ville::class);
	}
	
	public function utilisateurs(){
		return $this->hasMany(Utilisateur::class);
	}
	
	public function fournisseurs() {
        return $this->belongsToMany('App\Fournisseur', 'est_localisé', 'id_adresse', 'id_fourni');
    }
	
}
