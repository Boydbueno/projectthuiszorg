<?php

class JobJobCategoryTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('job_job_category')->truncate();

		$job_job_category = array(
			array(
				"job_id" => 1,
				"job_category_id" => 1
			),
			array(
				"job_id" => 2,
				"job_category_id" => 2
			),
			array(
				"job_id" => 3,
				"job_category_id" => 2
			),
			array(
				"job_id" => 4,
				"job_category_id" => 3
			)
		);

		// Uncomment the below to run the seeder
		DB::table('job_job_category')->insert($job_job_category);
	}

}
