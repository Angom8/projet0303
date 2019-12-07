<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtiliseCourammentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utilise_couramment', function (Blueprint $table) {
		$table->engine = 'InnoDB';
		$table->unsignedInteger('id_utilisateur');
		$table->unsignedInteger('id_bateau');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Utilise_couramment');
    }
}
