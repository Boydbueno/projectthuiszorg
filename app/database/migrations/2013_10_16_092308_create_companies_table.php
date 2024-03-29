<?php

use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function($table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('url', 250)->nullable();
			$table->string('description', 250);
			$table->string('kvk_number', 8);
			$table->string('address', 100);
			$table->string('house_number', 5);
			$table->string('city', 100);
			$table->string('zip_code');
			$table->string('phone_number', 10);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}