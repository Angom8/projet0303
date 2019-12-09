<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fournit', function (Blueprint $table) {
		$table->engine = 'InnoDB';
		$table->unsignedInteger('id_fourni');
		$table->unsignedInteger('id_equipement')->nullable();
		$table->unsignedInteger('id_piece')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Fournit');
    }
}
