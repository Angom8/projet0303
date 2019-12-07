<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstRenseignéSousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Est_renseigné_sous', function (Blueprint $table) {
		$table->engine = 'InnoDB';
		$table->unsignedInteger('id_equipement');
		$table->unsignedInteger('id_bateau');
		$table->unsignedInteger('id_piece');
		$table->unsignedInteger('id_modele');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Est_renseigné_sous');
    }
}
