<?php

namespace App\Http\Controllers;

use App\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PieceController extends Controller
{

    /**
     * Remove the link betweet a piece and a boat
     *
     * @param  Piece's ID
     */
    public function destroy_from_boat($id)
    {
	DB::table('Contient')->where('id_piece', $id)->delete();
	return back(); 
    }

    /**
     * Remove completly the Piece from database
     *
     * @param  Piece's ID
     */
    public function destroy($id)
    {
        Piece::where('id_piece', $id)->delete();
    }
}
