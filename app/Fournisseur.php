<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
	protected $table = 'Fournisseur';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'mail_fourni','nom_fourni', 'tel_fourni'
    ];

	public function adresses() {
        return $this->belongsToMany('App\Adresse', 'est_localisé', 'id_fourni', 'id_adresse');
    }
	
	public function pieces() {
		return $this->belongsToMany('App\Piece', 'fournit', 'id_fourni', 'id_piece');
	}
	
	public function equipements() {
		return $this->belongsToMany('App\Equipement', 'fournit', 'id_fourni', 'id_equipement');
	}
	
}
