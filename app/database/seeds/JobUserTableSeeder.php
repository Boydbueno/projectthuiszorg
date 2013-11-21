<?php

class JobUserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('job_user')->truncate();

		$job_user = array(
			array(
				'job_id' => Job::where('title', '=', 'Verven/tapijt leggen')->first()->id,
				'user_id' => User::where('first_name', '=', 'Boyd')->first()->id
			)
		);

		// Uncomment the below to run the seeder
		DB::table('job_user')->insert($job_user);
	}

}
