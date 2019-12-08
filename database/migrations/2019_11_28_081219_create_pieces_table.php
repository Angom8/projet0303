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
		$table->bigIncrements('id_piece');
		$table->timestamps();
		$table->float('revision_periodique_piece')->nullable()->unsigned();
		$table->float('duree_vie_piece')->nullable()->unsigned();
		$table->integer('quantite_piece');
		$table->boolean('piece_origine');
		$table->integer('q_piece_rechange')->nullable();
		//foreign id_type_piece 1_1
		$table->biginteger('id_type_piece')->unsigned();
		$table->foreign('id_type_piece')
          ->references('id_type_piece')->on('Type_piece');
          //->onDelete('cascade');

	    
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
