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

	    $table->integer('distance_eloignement')->unsigned();
	    $table->integer('nb_places')->unsigned();

	    $table->float('force_vent_max', 8, 2)->unsigned();
	    $table->float('hauteur_max_vagues', 8, 2)->unsigned();
	    $table->float('niveau_reserve', 8, 2)->nullable()->unsigned();
	    $table->float('niveau_carburant_max', 8, 2)->nullable()->unsigned();
	    $table->float('niveau_performance', 8, 2)->nullable()->unsigned();
	    $table->float('jauge_brut', 8, 2)->nullable()->unsigned();
	    $table->float('niveau_huile', 8, 2)->nullable()->unsigned();
	    $table->float('jauge_liquide_refroidissement', 8, 2)->nullable()->unsigned();

		//carac brutes

	    $table->integer('nb_mat')->nullable();

	    $table->float('surface_voilure', 8, 2)->nullable()->unsigned();
	    $table->float('dimension_x_bateau', 8, 2)->unsigned();
	    $table->float('dimension_y_bateau', 8, 2)->unsigned();
	    $table->float('dimension_z_bateau', 8, 2)->unsigned();
	    $table->float('volume_coque', 8, 2)->unsigned();
	    $table->float('consommation', 8, 2)->nullable()->unsigned();
	    $table->float('masse_navire', 8, 2)->unsigned();

		//foreign : immatr 1-1
		$table->string('id_immatr');
		$table->foreign('id_immatr')
          ->references('id_immatr')->on('Immatriculation');
		  
		//foreign : moteur 0-1  
		$table->biginteger('id_moteur')->unsigned()->nullable();
		$table->foreign('id_moteur')
          ->references('id_moteur')->on('Moteur');
		
		
		
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
