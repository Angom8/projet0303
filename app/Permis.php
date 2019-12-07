<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permis extends Model
{
    public function utilisateurs()
    {
        return $this->belongsToMany('App\Utilisateur', 'a_passé', 'id_permis', 'id_utilisateur');
    }
}
