<?php

class CompaniesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('companies')->delete();

		$companies = array(
			array(
				"name" => "MijnOpslag",
				"url" => "www.mijnopslag.nl",
				"description" => "Een bedrijf dat zich specialiseert in het opslaan van spullen in units. Momenteel alleen gevestigd in Rotterdam!",
				"kvk_number" => 654684653,
				"address" => "De straat",
				"house_number" => 55,
				"zip_code" => "3036 RO",
				"city" => "Rotterdam",
				"phone_number" => "010-1875552"
			),
			array(
				"name" => "Souvenir Shop Rotterdam",
				"url" => "www.rotterdamsouvenir.nl",
				"description" => "De leukste cadeaus, gadgets en frutsels. Voor iedereen hebben we wel iets, kom gauw langs bij onze nieuwe winkel!",
				"kvk_number" => 78525814,
				"address" => "Kruisstraat",
				"house_number" => 12,
				"zip_code" => "3033 RO",
				"city" => "Rotterdam",
				"phone_number" => "010-9339837"
			),
			array(
				"name" => "Grannies Finest",
				"url" => "www.grannysfinest.com",
				"description" => "Ons fashionlabel koppelt de creativiteit van jonge ontwerpers aan het vakmanschap van 'grannies', oftewel oma's. Het resultaat zijn mode accessoires met de hand gebreid en gehaakt, met natuurlijke garens, helemaal van deze tijd. ",
				"kvk_number" => 7373282,
				"address" => "Karel Doormanstraat",
				"house_number" => 320,
				"zip_code" => "3012 GP",
				"city" => "Rotterdam",
				"phone_number" => "010-8700233"
			),
			array(
				"name" => "Hasbro",
				"url" => "www.hasbro.com/nl_NL/‎",
				"description" => "Leverancier van speelgoed, gezelschapsspellen, interactieve software en puzzels. Informatie over het bedrijf en het speelgoed.",
				"kvk_number" => 25255252,
				"address" => "Speelgoedstraat",
				"house_number" => 12,
				"zip_code" => "3033 RO",
				"city" => "Rotterdam",
				"phone_number" => "010-1424237"
			),
		);

		DB::table('companies')->insert($companies);
	}

}
