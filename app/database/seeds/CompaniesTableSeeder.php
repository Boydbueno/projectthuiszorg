<?php

class CompaniesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// TODO: Abstract below two lines
		DB::table('companies')->delete();
		DB::statement('ALTER TABLE companies AUTO_INCREMENT=1');

		$companies = array(
			array(
				"company_name" => "Primark",
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
				"company_name" => "Albert Heijn",
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

		// Uncomment the below to run the seeder
		DB::table('companies')->insert($companies);
	}

}
