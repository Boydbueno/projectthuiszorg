<?php

use Illuminate\Database\Migrations\Migration;

class PivotCompanyUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_user', function(Blueprint $table) {
			$table->increments('id');
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_user');
	}

}