<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstDansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Est_dans', function (Blueprint $table) {
		$table->engine = 'InnoDB';
		$table->unsignedInteger('id_etat');
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
        Schema::dropIfExists('Est_dans');
    }
}
