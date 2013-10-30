<?php

class JobJobcategoryTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('job_job_category')->truncate();

		$job_jobcategory = array(
			array(
				"job_id" => 1,
				"jobcategory_id" => 1
			),
			array(
				"job_id" => 2,
				"jobcategory_id" => 2
			),
			array(
				"job_id" => 3,
				"jobcategory_id" => 2
			),
			array(
				"job_id" => 4,
				"jobcategory_id" => 3
			)
		);

		// Uncomment the below to run the seeder
		DB::table('job_jobcategory')->insert($job_jobcategory);
	}

}
