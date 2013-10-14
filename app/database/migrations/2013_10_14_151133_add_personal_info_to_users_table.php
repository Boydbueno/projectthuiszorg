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
			$table->string('firstName');
			$table->string('lastName');
			$table->string('streetName');
			$table->string('houseNumber');
			$table->string('zipCode');
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
			$table->dropColumn('firstName');
			$table->dropColumn('lastName');
			$table->dropColumn('streetName');
			$table->dropColumn('houseNumber');
			$table->dropColumn('zipCode');
			$table->dropColumn('city');
			$table->dropColumn('country');
		});
	}

}
