<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmatriculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Immatriculation', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

        $table->string('id_immatr');
	    $table->primary('id_immatr');
	    $table->time('date_immatr');

	    //foreign : bateau 1-1
		$table->integer('id_bateau')->unsigned();
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
        Schema::dropIfExists('Immatriculation');
    }
}
