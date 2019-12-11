<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public $timestamps = false;
	protected $table = 'Message';
	protected $fillable = [
       'id_utilisateur', 'id_msg', 'id_bateau', 'id_utilisateur',
    ];
}
