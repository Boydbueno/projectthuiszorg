<?php

use Illuminate\Database\Migrations\Migration;

class RenameJobUserTableToJobusers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('job_user', 'jobusers');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::rename('jobusers', 'job_user');
	}

}