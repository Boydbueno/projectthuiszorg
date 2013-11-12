<?php

use Illuminate\Database\Migrations\Migration;

class ChangeJobcategoryJobRelationToOneToMany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::drop('job_jobcategory');
		
		Schema::table('jobs', function($table) {
			$table->integer('jobcategory_id')->unsigned()->after('company_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::create('job_jobcategory', function($table) {
			$table->increments('id')->unsigned();
			$table->integer('job_id')->unsigned()->index();
			$table->integer('jobcategory_id')->unsigned()->index();
		});

		Schema::table('jobs', function($table) {
			$table->dropColumn('jobcategory_id');
		});
	}

}