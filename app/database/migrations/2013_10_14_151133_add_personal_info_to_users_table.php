<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPersonalInfoToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->string('first_name');
			$table->string('last_name');
			$table->string('street_name');
			$table->string('house_number');
			$table->string('zipcode');
			$table->string('city');
			$table->string('country')->default('The Netherlands');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->string('first_name');
			$table->string('last_name');
			$table->string('street_name');
			$table->string('house_number');
			$table->string('zipcode');
			$table->string('city');
			$table->string('country');
		});
	}

}
