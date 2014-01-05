<?php

class UserInfoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('user_info')->delete();

		$userinfo = array(
			array(
				"firstName" => "Stefan",
				"lastName" => "Weck",
				"adress" => "StefanStraat",
				"houseNumber" => 8,
				"city" => "Gorinchem",
				"phoneNumber" => "06348939",
				"user_id" => User::where('username', '=', 'stefanweck')->first()->id
			),
			array(
				"firstName" => "Stefan",
				"lastName" => "Client",
				"adress" => "StefanStraat",
				"houseNumber" => 9,
				"city" => "Gorinchem",
				"phoneNumber" => "06348939",
				"user_id" => User::where('username', '=', 'stefanweckclient')->first()->id
			),
			array(
				"firstName" => "Stefan",
				"lastName" => "Company",
				"adress" => "StefanStraat",
				"houseNumber" => 10,
				"city" => "Gorinchem",
				"phoneNumber" => "06348939",
				"user_id" => User::where('username', '=', 'stefanweckcompany')->first()->id
			),
			array(
				"firstName" => "Kevin",
				"lastName" => "Vlietstra",
				"adress" => "KevinStraat",
				"houseNumber" => 4,
				"city" => "Zoetermeer",
				"phoneNumber" => "063768139",
				"user_id" => User::where('username', '=', 'kevinvlietstra')->first()->id
			),
			array(
				"firstName" => "Kevin",
				"lastName" => "Client",
				"adress" => "KevinStraat",
				"houseNumber" => 6,
				"city" => "Zoetermeer",
				"phoneNumber" => "063768139",
				"user_id" => User::where('username', '=', 'kevinvlietstraclient')->first()->id
			),
			array(
				"firstName" => "Kevin",
				"lastName" => "Company",
				"adress" => "KevinStraat",
				"houseNumber" => 7,
				"city" => "Zoetermeer",
				"phoneNumber" => "063768139",
				"user_id" => User::where('username', '=', 'kevinvlietstracompany')->first()->id
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
				"firstName" => "Boyd",
				"lastName" => "Bueno de Client",
				"adress" => "BoydStraat",
				"houseNumber" => 8,
				"city" => "Rotterdam",
				"phoneNumber" => "061168139",
				"user_id" => User::where('username', '=', 'boydbuenodemesquitaclient')->first()->id
			),
			array(
				"firstName" => "Boyd",
				"lastName" => "Bueno de Company",
				"adress" => "BoydStraat",
				"houseNumber" => 1,
				"city" => "Rotterdam",
				"phoneNumber" => "061168139",
				"user_id" => User::where('username', '=', 'boydbuenodemesquitacompany')->first()->id
			)
			
		);

		DB::table('user_info')->insert($userinfo);
	}

}
