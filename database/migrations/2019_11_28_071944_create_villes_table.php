<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ville', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

		$table->bigIncrements('id_ville');

	    $table->string('nom_ville');

	    $table->integer('code_postal');

		//foreign : pays 1-1

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ville');
    }
}
