<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
	
	protected $fillable = [
		'id_piece',
		'revisions_periodiques_piece',
		'duree_vie_piece',
		'quantite_piece',
		'piece_origine',
		'q_piece_rechange',
		'id_type_piece'
	];
	
    public function type_piece(){
		return $this->belongsTo(Type_piece::class);
	}
}
