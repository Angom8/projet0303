<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Adresse', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

		$table->bigIncrements('id_adresse');

	    $table->string('numero_adresse');//en cas de bis/ter
	    $table->string('voierie');

	    //foreign : id_ville 1-1
		$table->integer('id_ville')->unsigned();
		$table->foreign('id_ville')
          ->references('id_ville')->on('Ville');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Adresse');
    }
}
