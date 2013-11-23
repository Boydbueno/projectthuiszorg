<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email', 100);
			$table->string('password', 64);
			$table->string('first_name');
			$table->string('last_name');
			$table->string('street_name');
			$table->string('house_number');
			$table->string('zipcode');
			$table->string('city');
			$table->string('country')->default('The Netherlands');
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
		Schema::drop('users');
	}

}