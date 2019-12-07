<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcernesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Concerne', function (Blueprint $table) {
		$table->engine = 'InnoDB';
		$table->unsignedInteger('id_entretien');
		$table->unsignedInteger('id_equipement');
		$table->unsignedInteger('id_piece');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Concerne');
    }
}
