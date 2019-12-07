<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Port', function (Blueprint $table) {
 	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

		$table->bigIncrements('id_port');

		$table->float('latt_port', 8, 2);
		$table->float('long_port', 8, 2);

	    //foreign : adresse
		$table->integer('id_adresse')->unsigned();
		$table->foreign('id_adresse')
			->references('id_adresse')->on('Adresse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Port');
    }
}
