<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocacoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locacoes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idUsuario')->index('fk_locacoes_usuarios1_idx');
			$table->integer('idCliente')->index('fk_locacoes_clientes1_idx');
			$table->integer('idVideo')->index('fk_locacoes_videos1_idx');
			$table->timestamp('dataLocacao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('dataDevolucao');
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
		Schema::drop('locacoes');
	}

}
