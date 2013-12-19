<?php

class CompaniesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('companies')->delete();

		$companies = array(
			array(
				"name" => "Primark",
				"url" => "www.primark.nl",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"kvk_number" => 654684653,
				"address" => "De straat",
				"house_number" => 55,
				"zip_code" => "1234AB",
				"city" => "De stad",
				"phone_number" => 1875239
			),
			array(
				"name" => "Albert Heijn",
				"url" => "www.ah.nl",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
				"kvk_number" => 78525814,
				"address" => "Appieheijn straat",
				"house_number" => 12,
				"zip_code" => "7452AH",
				"city" => "Appiestad",
				"phone_number" => "0900-appieheijn"
			)
		);

		DB::table('companies')->insert($companies);
	}

}
