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
			$table->string('companyName', 100);
			$table->string('url', 250);
			$table->string('discription', 250);
			$table->string('kvkNummer', 8);
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
		Schema::drop('companies');
	}

}