<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntretiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Entretien', function (Blueprint $table) {
	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

        $table->bigIncrements('id_entretien');
	    $table->time('date_entretien');
        
		//foreign : Equipement 0-1  
		$table->biginteger('id_equipement')->unsigned()->nullable();
		$table->foreign('id_equipement')
          ->references('id_equipement')->on('Equipement');
		
		//foreign : Piece 0-1  
		$table->biginteger('id_piece')->unsigned()->nullable();
		$table->foreign('id_piece')
          ->references('id_piece')->on('Piece');
		
		//foreign : Bateau 0-1  
		$table->biginteger('id_bateau')->unsigned()->nullable();
		$table->foreign('id_bateau')
          ->references('id_bateau')->on('Bateau');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Entretien');
    }
}
