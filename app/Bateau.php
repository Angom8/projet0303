<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bateau extends Model {

	protected $table = 'Bateau';
	protected $fillable = [
        'id_bateau', 'nom_bateau', 'nb_mat', 'surface_voilure', 'dimension_x_bateau', 'dimension_y_bateau', 'ancienne_cat', 'distance_eloignement', 'volume_coque', 'force_vent_max', 'hauteur_max_vagues',
		'dimension_z_bateau', 'consommation', 'niveau_reserve', 'nb_places', 'auto_videur', 'niveau_carburant_max', 'niveau_performance', 
		'url_photo', 'jauge_brut', 'masse_navire', 'hors_bord', 'francise', 'niveau_huile', 'jauge_liquide_refroidissement',
		'id_immatr', 'id_moteur',

    ];
	
	
    public function immatriculation(){
		return $this->hasOne(Immatriculation::class);
	}
	
	public function utilisateurs() {
        return $this->belongsToMany('App\Utilisateur', 'possède', 'id_bateau', 'id_utilisateur');
    }
	
	public function moteur() {
		return $this->hasOne(Moteur::class);
	}
	
	public function modele(){
		return $this->belongsTo('App/Modele', 'est_renseigné_sous', 'id_bateau', 'id_modele');
	}
	
	public function utilisateurscourant() {
        return $this->belongsToMany('App\Utilisateur', 'utilise_couramment', 'id_bateau', 'id_utilisateur');
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
