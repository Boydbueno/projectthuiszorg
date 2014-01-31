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
			array(
				"name" => "Primark",
				"url" => "www.primark.nl/",
				"description" => "Verkoop van damesmode, herenmode, kindermode en producten voor het interieur.",
				"kvk_number" => 98741958,
				"address" => "Nijmegen",
				"house_number" => 143,
				"zip_code" => "6511 NI",
				"city" => "Nijmegen",
				"phone_number" => "080-5247837"
			),
			array(
				"name" => "Vestia",
				"url" => "www.Vestia.nl",
				"description" => "Wij bieden goede, betaalbare en duurzame huisvesting voor bijzondere doelgroepen en werken aan leefbaarheid en veiligheid.",
				"kvk_number" => 57419829,
				"address" => "Bijdorplaan",
				"house_number" => 12,
				"zip_code" => "2713 RR",
				"city" => "Zoetermeer",
				"phone_number" => "088-1242424"
			),
			array(
				"name" => "Kledingreparatie Rotterdam",
				"url" => "www.kledingreparatierotterdam.nl",
				"description" => "Wij verzamelen oude tweedehands kleding en repareren het en sturen het dan op naar derdewereldlanden voor een goed doel.",
				"kvk_number" => 57826429,
				"address" => "Blaak",
				"house_number" => 45,
				"zip_code" => "3013 RP",
				"city" => "Rotterdam",
				"phone_number" => "010-5478424"
			)
		);

		DB::table('companies')->insert($companies);
	}

}
