<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotJobJobCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_job_category', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('job_id')->unsigned()->index();
			$table->integer('job_category_id')->unsigned()->index();
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
			$table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_job_category');
	}

}
