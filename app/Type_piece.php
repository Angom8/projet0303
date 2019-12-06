<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_piece extends Model
{
	protected $fillable = [
		'id_type_piece', 'nom_type_piece'
	];
    public function pieces(){
		return $this->hasMany(Piece::class);
	}
}
