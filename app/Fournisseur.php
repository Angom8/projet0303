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

}
