<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Equipement', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

		$table->bigIncrements('id_equipement');
		$table->timestamps();

	    $table->float('duree_vie_equip')->nullable()->unsigned();
	    $table->float('revision_periodique_piece')->nullable()->unsigned();

	    $table->integer('quantite_equip');
	    $table->boolean('equip_origine');
	    $table->integer('q_equip_rechange')->nullable();
		
	    //foreign id_type_equip 1_1
		$table->biginteger('id_type_equipement')->unsigned();
		$table->foreign('id_type_equipement')
          ->references('id_type_equipement')->on('Type_equipement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Equipement');
    }
}
