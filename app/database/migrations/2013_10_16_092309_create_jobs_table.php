<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('amount');
			$table->decimal('payment', 10, 2);
			$table->integer('minimum');
			$table->integer('step');
			$table->string('postfix');
			$table->string('prefix')->default('€');
			$table->timestamp('start_date')->nullable();
			$table->timestamp('end_date')->nullable();
			$table->integer('company_id')->unsigned()->index();
			$table->integer('jobcategory_id')->unsigned()->index();
			$table->timestamps();

			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->foreign('jobcategory_id')->references('id')->on('jobcategories')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jobs');
	}

}