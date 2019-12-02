<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Moteur', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

            $table->bigIncrements('id_moteur');

            $table->float('puissance_moteur', 8, 2);
            $table->float('kilometrage', 8, 2);
            $table->float('horametre_compte', 8, 2);

	    //foreign : equipment 1-1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Moteur');
    }
}
