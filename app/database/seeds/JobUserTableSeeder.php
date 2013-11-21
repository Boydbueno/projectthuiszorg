<?php

class JobUserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('job_user')->truncate();

		$job_user = array(
			array(
				'job_id' => 1,
				'user_id' => 1,
				'amount' => 200
			),
			array(
				'job_id' => 3,
				'user_id' => 3,
				'amount' => 300
			)
		);

		// Uncomment the below to run the seeder
		DB::table('job_user')->insert($job_user);
	}

}
