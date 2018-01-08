<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idEndereco')->index('fk_usuarios_endereco_idx');
			$table->string('nome', 200);
			$table->integer('cpf');
			$table->integer('telefone');
			$table->string('eMail', 200);
			$table->string('login', 50);
			$table->string('senha', 100);
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
		Schema::drop('usuarios');
	}

}
