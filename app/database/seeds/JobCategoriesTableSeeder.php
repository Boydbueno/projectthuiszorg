<?php

class JobCategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('job_categories')->truncate();

		$job_categories = array(
			array(
				"label" => "advies",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
			),
			array(
				"label" => "inpakken",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
			),
			array(
				"label" => "klusjes",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
			)
		);

		// Uncomment the below to run the seeder
		DB::table('job_categories')->insert($job_categories);
	}

}
