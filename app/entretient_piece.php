<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entretient_piece extends Model
{
    protected $fillable = [
        'id_entretien', 'date_entretien'
	];
}
