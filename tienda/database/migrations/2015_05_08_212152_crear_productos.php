<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('producto', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion',255);
			$table->decimal('precio',10,2);
			$table->integer('vendedor_id')->unsigned();
			$table->foreign('vendedor_id')->references('id')->on('vendedor')->onDelete('cascade');
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
		Schema::drop('producto');
	}

}
