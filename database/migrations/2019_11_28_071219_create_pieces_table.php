<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Piece', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

            $table->bigIncrements('id_pîece');
            $table->timestamps();

	    $table->time('revision_periodique_piece')->nullable();
	    $table->time('duree_vie_piece')->nullable();

	    $table->integer('quantite_piece');
	    $table->boolean('piece_origine');
	    $table->integer('q_piece_rechange')->nullable();
		
	    //foreign id_type_piece 1_1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Piece');
    }
}
