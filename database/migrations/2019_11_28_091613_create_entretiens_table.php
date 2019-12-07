<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntretiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Entretien', function (Blueprint $table) {
	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

        $table->bigIncrements('id_entretien');
	    $table->time('date_entretien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Entretien');
    }
}
