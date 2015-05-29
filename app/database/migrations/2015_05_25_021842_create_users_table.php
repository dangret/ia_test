<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("nombre");
			$table->string("apellido_paterno");
			$table->string("apellido_materno");
			$table->string("email");
			$table->enum("sexo", ["H","M"]);
			$table->timestamp("fecha_nacimiento");
			$table->string("correo_electronico");
			$table->string("password");
			$table->string("direccion");
			$table->string("fotografia");
			$table->integer("city_id")->unsigned();
			$table->foreign("city_id")->references("id")->on("cities");
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
