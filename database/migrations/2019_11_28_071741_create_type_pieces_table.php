<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Type_piece', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

            $table->bigIncrements('id_type_piece');
	    $table->string('nom_type_piece');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Type_piece');
    }
}
