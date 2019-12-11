<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Message', function (Blueprint $table) {
	    $table->engine = 'InnoDB';
	    $table->charset = 'utf8';

        $table->bigIncrements('id_msg');
	    $table->timestamp('date_msg');
			
		 $table->string('libellé');
        
		//foreign : User 1-1  
		$table->biginteger('id_utilisateur')->unsigned();
		$table->foreign('id_utilisateur')
          ->references('id')->on('Utilisateur');
		
		//foreign : Bateau 0-1  
		$table->biginteger('id_bateau')->unsigned()->nullable();
		$table->foreign('id_bateau')
          ->references('id_bateau')->on('Bateau');
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
