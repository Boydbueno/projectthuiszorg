<?php

class JobsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('jobs')->truncate();

		$jobs = array(
			array(
				"title" => "Mutsen breien",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"amount" => 400,
				"payment" => 1000.00,
				"company_id" => 1
			),
			array(
				"title" => "Folders rondbrengen",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"amount" => 600,
				"payment" => 300.00,
				"company_id" => 2
			),
			array(
				"title" => "T-shirts vouwen",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"amount" => 800,
				"payment" => 1200.00,
				"company_id" => 3
			),
			array(
				"title" => "Handoeken ophalen en wassen",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"amount" => 200,
				"payment" => 500.00,
				"company_id" => 4
			)
		);

		// Uncomment the below to run the seeder
		DB::table('jobs')->insert($jobs);
	}

}
