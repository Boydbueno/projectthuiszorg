<?php

use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function($table)
		{
			$table->increments('id');
			$table->string('firstName', 100);
			$table->string('lastName', 100);
			$table->string('adress', 100);
			$table->string('houseNumber', 5);
			$table->string('city', 100);
			$table->string('phoneNumber', 10);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}