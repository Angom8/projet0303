<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;
	protected $table = 'Utilisateur';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'login', 'mail_utilisateur', 'password','nom_utilisateur', 'prenom_utilisateur', 'tel_utilisateur','type_utilisateur', 'id_adresse'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function adresse(){
		return $this->belongsTo(Adresse::class);
	}
	
	public function bateau() {
        return $this->belongsToMany('App\Bateau', 'possède', 'id', 'id_bateau');
    }
	
	// public function bateau() {
        // return $this->belongsToMany('App\Bateau', 'utilise_couramment', 'id', 'id_bateau');
    // }
	
}














