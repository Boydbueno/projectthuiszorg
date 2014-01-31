<?php

use Illuminate\Database\Migrations\Migration;

class CreateProgressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('progress', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('job_id')->unsigned()->index();
			$table->integer('amount');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('progress');
	}

}