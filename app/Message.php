<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public $timestamps = false;
	protected $table = 'Message';
	protected $fillable = [
       'date_msg', 'libellé', 'id_bateau', 'id_utilisateur',
    ];
}
