<?php

class JobUserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('job_user')->truncate();

		$job_user = array(
			array(
				'job_id' => Job::where('title', '=', 'Tapijt leggen')->first()->id,
				'user_id' => User::where('username', '=', 'boydbuenodemesquita')->first()->id,
				'amount' => 30
			),
			array(
				'job_id' => Job::where('title', '=', 'Mutsen breien')->first()->id,
				'user_id' => User::where('username', '=', 'stefanweck')->first()->id,
				'amount' => 20
			),			
			array(
				'job_id' => Job::where('title', '=', 'Mutsen breien')->first()->id,
				'user_id' => User::where('username', '=', 'kevinvlietstra')->first()->id,
				'amount' => 15
			),			
			array(
				'job_id' => Job::where('title', '=', 'Speelgoed monteren')->first()->id,
				'user_id' => User::where('username', '=', 'boydbuenodemesquita')->first()->id,
				'amount' => 70
			),
			array(
				'job_id' => Job::where('title', '=', 'Speelgoed monteren')->first()->id,
				'user_id' => User::where('username', '=', 'stefanweck')->first()->id,
				'amount' => 50
			),			
			array(
				'job_id' => Job::where('title', '=', 'Speelgoed monteren')->first()->id,
				'user_id' => User::where('username', '=', 'kevinvlietstra')->first()->id,
				'amount' => 40
			),
			array(
				'job_id' => Job::where('title', '=', 'Gadgets monteren')->first()->id,
				'user_id' => User::where('username', '=', 'boydbuenodemesquitaclient')->first()->id,
				'amount' => 40
			),
			array(
				'job_id' => Job::where('title', '=', 'Gadgets monteren')->first()->id,
				'user_id' => User::where('username', '=', 'stefanweckclient')->first()->id,
				'amount' => 30
			),			
			array(
				'job_id' => Job::where('title', '=', 'Gadgets monteren')->first()->id,
				'user_id' => User::where('username', '=', 'kevinvlietstraclient')->first()->id,
				'amount' => 30
			),
		);

		DB::table('job_user')->insert($job_user);
	}

}
