<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bateau extends Model {
	
	protected $fillable = [
        'id_bateau', 'nom_bateau', 'nb_mat', 'surface_voilure', 'dimension_x_bateau', 'dimension_y_bateau', 'ancienne_cat', 'distance_eloignement', 'volume_coque', 'force_vent_max', 'hauteur_max_vagues',
		'dimension_z_bateau', 'consommation', 'niveau_reserve', 'nb_places', 'date_construction', 'auto_videur', 'niveau_carburant_max', 'niveau_performance', 
		'url_photo_Bateau', 'jauge_brut', 'masse_navire', 'hors_bord', 'francise', 'niveau_huile', 'niveau_liquide_refroidissement',
		'id_immatr', 'id_moteur', 'id_port'

    ];
	
	
    public function immatriculation(){
		return $this->hasOne(Immatriculation::class);
	}
	
	public function accidents()
    {
        return $this->belongsToMany('App\Accident', 'est_impliqué', 'id_bateau', 'id_accident');
    }
	
	public function utilisateurs() {
        return $this->belongsToMany('App\Utilisateur', 'possède', 'id_bateau', 'id_utilisateur');
    }
	
	public function permis() {
        return $this->belongsToMany('App\Permis', 'necessite', 'id_bateau', 'id_permis');
    }
	
	public function moteur() {
		return $this->hasOne(Moteur::class);
	}
	
	public function utilisateurs() {
        return $this->belongsToMany('App\Utilisateur', 'utilise_couramment', 'id_bateau', 'id_utilisateur');
    }
	
	public function ports() {
        return $this->belongsTo('App\Port');
    }
	
	public function equipements() {
		return $this->belongsToMany('App\Equipement', 'comporte', 'id_bateau', 'id_equipement');
	}
	
	public function pieces() {
		return $this->belongsToMany('App\Equipement', 'contient', 'id_bateau', 'id_piece');
	}
	
	public function entretients() {
		return $this->belongsToMany('App\Entretien', 'reçoit', 'id_bateau', 'id_entretien');
	}
}
