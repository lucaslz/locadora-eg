<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLocacoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('locacoes', function(Blueprint $table)
		{
			$table->foreign('idCliente', 'fk_locacoes_clientes1')->references('id')->on('clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idVideo', 'fk_locacoes_videos1')->references('id')->on('videos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('locacoes', function(Blueprint $table)
		{
			$table->dropForeign('fk_locacoes_clientes1');
			$table->dropForeign('fk_locacoes_videos1');
		});
	}

}
