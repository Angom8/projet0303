<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Utilisateur', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8';

			$table->bigIncrements('id');

			$table->string('login')->unique();
			$table->string('password');
			$table->integer('type_utilisateur');
			$table->string('mail_utilisateur')->unique();

			$table->string('nom_utilisateur');
			$table->string('prenom_utilisateur');
			$table->string('tel_utilisateur');

			//foreign : id_adresse 1-1
			$table->integer('id_adresse')->unsigned();
			$table->foreign('id_adresse')
				->references('id_adresse')->on('Adresse');
			
			
			$table->rememberToken();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Utilisateur');
    }
}
