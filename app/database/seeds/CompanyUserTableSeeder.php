<?php

class CompanyUserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('job_user')->truncate();

		$job_user = array(
			array(
				'company_id' => Company::where('name', '=', 'Primark')->first()->id,
				'user_id' => User::where('username', '=', 'stefanweckcompany')->first()->id
			),
			array(
				'company_id' => Company::where('name', '=', 'Primark')->first()->id,
				'user_id' => User::where('username', '=', 'boydbuenodemesquitacompany')->first()->id
			),
			array(
				'company_id' => Company::where('name', '=', 'Primark')->first()->id,
				'user_id' => User::where('username', '=', 'kevinvlietstracompany')->first()->id
			),
		);

		DB::table('job_user')->insert($job_user);
	}

}
