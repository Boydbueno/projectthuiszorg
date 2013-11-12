<?php

class JobsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('jobs')->truncate();

		$jobs = array(
			array(
				"title" => "Verven/tapijt leggen",
				"description" => "Wij hebben net een nieuw bedrijfspand gekocht vlakbij Station Blaak in Rotterdam. De muren moeten geverfd worden en er moet tapijt gelegd worden. Hier zoeken wij mensen voor die ervaring hebben met het verven van grote oppervlakken. Aanschaf van de benodigde materialen zullen wij zelf verzorgen.",
				"category_id" => 1,
				"amount" => 10,
				"payment" => 10.00,
				"company_id" => 1
			),
			array(
				"title" => "Finacieel advies",
				"description" => "Beginnend bedrijf zoekt een of meerdere voormalig financieel adviseurs. Ervaring in deze branch is een pre. We heben hulp nodig met onze administratie en het bijhouden van de financiele zaken voor het bedrijf. Ook hebben wij advies nodig op het gebied van afschrijven, inkopen van kantoor artikelen en pensioenen van toekomstige werknemers.",
				"category_id" => 2,
				"amount" => 1,
				"payment" => 300.00,
				"company_id" => 2
			),
			array(
				"title" => "Mutsen breien",
				"description" => "We hebben sinds kort een skischool geopend in Tsjechië en willen als reclame middel mutsen hebben met ons logo en bedrijfsnaam er op. Deze willen we als promotie materiaal weggeven aan klanten. Om te beginnen willen we graag 1000 stuks hebben, het liefst gehaakt, maar gebreide mutsen is ook een optie. Minimale bijdrage per persoon is 25 stuks.",
				"category_id" => 3,
				"amount" => 800,
				"payment" => 02.50,
				"company_id" => 1
			),
			array(
				"title" => "Speelgoed monteren",
				"description" => "Wij zijn een van de grootste speelgoed fabrikanten van Nederland, en we zijn op zoek naar mensen die voor ons thuis speelgoed in elkaar kunnen zetten. Materialen en gereedschap zullen worden aangeleverd.  Technische kennis is een vereiste, aangezien er ook wat soldeer werk aan te pas komt om de chips aan te sluiten op de batterijen.",
				"category_id" => 4,
				"amount" => 200,
				"payment" => 40.00,
				"company_id" => 2
			)
		);

		// Uncomment the below to run the seeder
		DB::table('jobs')->insert($jobs);
	}

}
