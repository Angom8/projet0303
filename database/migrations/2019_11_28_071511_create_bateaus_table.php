<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBateausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bateau', function (Blueprint $table) {

		$table->engine = 'InnoDB';
		$table->charset = 'utf8';

		$table->bigIncrements('id_bateau');
		$table->timestamps();

		//desc
	    $table->string('nom_bateau');
	    $table->string('url_photo');

	    $table->char('ancienne_cat');

	    $table->boolean('auto_videur');
	    $table->boolean('hors_bord');
	    $table->boolean('francise');

		//capacites

	    $table->integer('distance_eloignement');
	    $table->integer('nb_places');

	    $table->float('force_vent_max', 8, 2);
	    $table->float('hauteur_vague_max', 8, 2);
	    $table->float('niveau_reserve', 8, 2);
	    $table->float('niveau_carburant_max', 8, 2);
	    $table->float('niveau_performance', 8, 2);
	    $table->float('jauge_brut', 8, 2);
	    $table->float('niveau_huile', 8, 2);
	    $table->float('jauge_liquide_refroidissement', 8, 2);

		//carac brutes

	    $table->integer('nb_mat')->nullable();

	    $table->float('surface_voilure', 8, 2)->nullable();
	    $table->float('dimension_x_bateau', 8, 2);
	    $table->float('dimension_y_bateau', 8, 2);
	    $table->float('dimension_z_bateau', 8, 2);
	    $table->float('volume_coque', 8, 2);
	    $table->float('consommation', 8, 2);
	    $table->float('masse_navire', 8, 2);

		//foreign : immatr 1-1
		$table->integer('id_immatr')->unsigned();
		$table->foreign('id_immatr')
          ->references('id_immatr')->on('Immatriculation');
		  
		//foreign : moteur 0-1  
		$table->integer('id_moteur')->unsigned();
		$table->foreign('id_moteur')
          ->references('id_moteur')->on('Moteur');
		  
		//foreign : port 0-1  
		$table->integer('id_port')->unsigned();
		$table->foreign('id_port')
          ->references('id_port')->on('Port');
		
		
		
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bateau');
    }
}
