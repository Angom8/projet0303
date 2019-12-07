<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    public function bateau()
    {
        return $this->belongsToMany('App\Bateau', 'est_impliqué', 'id_accident', 'id_bateau');
    }
}
