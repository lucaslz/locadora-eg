<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idGenero')->index('fk_videos_genero1_idx');
			$table->string('titulo', 200);
			$table->text('descricao', 65535);
			$table->boolean('disposicao')->default(1);
			$table->string('imagem', 300);
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
		Schema::drop('videos');
	}

}
