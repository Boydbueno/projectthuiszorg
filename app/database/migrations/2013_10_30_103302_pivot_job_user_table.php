<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotJobUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('job_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->integer('amount')->unsigned();
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
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
		Schema::drop('job_user');
	}

}
