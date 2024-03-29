<?php

class CompanyUserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('company_user')->truncate();

		$company_user = array(
			array(
				'company_id' => Company::where('name', '=', 'MijnOpslag')->first()->id,
				'user_id' => User::where('username', '=', 'stefanweckcompany')->first()->id
			),
			array(
				'company_id' => Company::where('name', '=', 'Souvenir Shop Rotterdam')->first()->id,
				'user_id' => User::where('username', '=', 'boydbuenodemesquitacompany')->first()->id
			),
			array(
				'company_id' => Company::where('name', '=', 'Grannies Finest')->first()->id,
				'user_id' => User::where('username', '=', 'kevinvlietstracompany')->first()->id
			),
		);

		DB::table('company_user')->insert($company_user);
	}

}
