<?php

class JobUserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('job_user')->truncate();

		$job_user = array(
			array(
				'job_id' => Job::where('title', '=', 'Tapijt leggen')->first()->id,
				'user_id' => User::where('username', '=', 'boydbuenodemesquita')->first()->id,
				'amount' => 3
			),
			array(
				'job_id' => Job::where('title', '=', 'Mutsen breien')->first()->id,
				'user_id' => User::where('username', '=', 'stefanweck')->first()->id,
				'amount' => 300
			),			
			array(
				'job_id' => Job::where('title', '=', 'Mutsen breien')->first()->id,
				'user_id' => User::where('username', '=', 'kevinvlietstra')->first()->id,
				'amount' => 200
			),			
			array(
				'job_id' => Job::where('title', '=', 'Speelgoed monteren')->first()->id,
				'user_id' => User::where('username', '=', 'boydbuenodemesquita')->first()->id,
				'amount' => 20
			),
			array(
				'job_id' => Job::where('title', '=', 'Speelgoed monteren')->first()->id,
				'user_id' => User::where('username', '=', 'stefanweck')->first()->id,
				'amount' => 150
			),			
			array(
				'job_id' => Job::where('title', '=', 'Speelgoed monteren')->first()->id,
				'user_id' => User::where('username', '=', 'kevinvlietstra')->first()->id,
				'amount' => 5
			),
		);

		DB::table('job_user')->insert($job_user);
	}

}
