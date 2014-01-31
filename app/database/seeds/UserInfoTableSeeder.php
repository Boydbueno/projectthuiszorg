<?php

class UserInfoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('user_info')->delete();

		$userinfo = array(
			array(
				"firstName" => "Stefan",
				"lastName" => "Weck",
				"adress" => "Marie Boddaertstraat",
				"houseNumber" => 8,
				"city" => "Gorinchem",
				"phoneNumber" => "06348939",
				"user_id" => User::where('username', '=', 'stefanweck')->first()->id
			),
			array(
				"firstName" => "Henk",
				"lastName" => "de Jager",
				"adress" => "",
				"houseNumber" => 14,
				"city" => "",
				"phoneNumber" => "06348939",
				"user_id" => User::where('username', '=', 'stefanweckclient')->first()->id
			),
			array(
				"firstName" => "Barry",
				"lastName" => "Viola",
				"adress" => "Hoofdweg",
				"houseNumber" => 84,
				"city" => "Rotterdam",
				"phoneNumber" => "06348939",
				"user_id" => User::where('username', '=', 'stefanweckcompany')->first()->id
			),
			array(
				"firstName" => "Kees",
				"lastName" => "Hendriks",
				"adress" => "Vestingweg",
				"houseNumber" => 4,
				"city" => "Zoetermeer",
				"phoneNumber" => "063768139",
				"user_id" => User::where('username', '=', 'kevinvlietstracompany')->first()->id
			),
			array(
				"firstName" => "Mindy",
				"lastName" => "Dekker",
				"adress" => "Boomanslaan",
				"houseNumber" => 6,
				"city" => "",
				"phoneNumber" => "",
				"user_id" => User::where('username', '=', 'kevinvlietstraclient')->first()->id
			),
			array(
				"firstName" => "Kevin",
				"lastName" => "Company",
				"adress" => "KevinStraat",
				"houseNumber" => 7,
				"city" => "Zoetermeer",
				"phoneNumber" => "063768139",
				"user_id" => User::where('username', '=', 'kevinvlietstra')->first()->id
			),
			array(
				"firstName" => "Boyd",
				"lastName" => "Bueno de Mesquita",
				"adress" => "BoydStraat",
				"houseNumber" => 7,
				"city" => "Rotterdam",
				"phoneNumber" => "061168139",
				"user_id" => User::where('username', '=', 'boydbuenodemesquita')->first()->id
			),
			array(
				"firstName" => "Bep",
				"lastName" => "de Jong",
				"adress" => "",
				"houseNumber" => 3,
				"city" => "",
				"phoneNumber" => "061168139",
				"user_id" => User::where('username', '=', 'boydbuenodemesquitaclient')->first()->id
			),
			array(
				"firstName" => "Sjaak",
				"lastName" => "van Dijk",
				"adress" => "Vestingwal",
				"houseNumber" => 1,
				"city" => "Rotterdam",
				"phoneNumber" => "061168139",
				"user_id" => User::where('username', '=', 'boydbuenodemesquitacompany')->first()->id
			),
			array(
				"firstName" => "Timo",
				"lastName" => "de Boer",
				"adress" => "Prins Alexanderplein",
				"houseNumber" => 49,
				"city" => "Rotterdam",
				"phoneNumber" => "061168139",
				"user_id" => User::where('username', '=', 'timodeboer')->first()->id
			),
			array(
				"firstName" => "Willemijn",
				"lastName" => "Bakker",
				"adress" => "Abrahamshofje",
				"houseNumber" => 4,
				"city" => "Rotterdam",
				"phoneNumber" => "061168139",
				"user_id" => User::where('username', '=', 'willemijnbakker')->first()->id
			)
			
		);

		DB::table('user_info')->insert($userinfo);
	}

}
