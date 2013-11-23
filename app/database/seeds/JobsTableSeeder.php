<?php

class JobsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// TODO: Abstract below two lines
		DB::table('jobs')->delete();
		DB::statement('ALTER TABLE users AUTO_INCREMENT=1');

		$jobs = array(
			array(
				"title" => "Verven/tapijt leggen",
				"description" => "Wij hebben net een nieuw bedrijfspand gekocht vlakbij Station Blaak in Rotterdam. De muren moeten geverfd worden en er moet tapijt gelegd worden. Hier zoeken wij mensen voor die ervaring hebben met het verven van grote oppervlakken. Aanschaf van de benodigde materialen zullen wij zelf verzorgen.",
				"amount" => 10,
				"payment" => 10.00,
				"start_date" => "2013-11-15 00:00:00",
				"company_id" => 1,
				"jobcategory_id" => Jobcategory::where('label', '=', 'Fysiek werk')->first()->id
			),
			array(
				"title" => "Financieel advies",
				"description" => "Beginnend bedrijf zoekt een of meerdere voormalig financieel adviseurs. Ervaring in deze branch is een pre. We heben hulp nodig met onze administratie en het bijhouden van de financiele zaken voor het bedrijf. Ook hebben wij advies nodig op het gebied van afschrijven, inkopen van kantoor artikelen en pensioenen van toekomstige werknemers.",
				"amount" => 1,
				"payment" => 40.00,
				"start_date" => "2013-11-17 00:00:00",
				"company_id" => 2,
				"jobcategory_id" => Jobcategory::where('label', '=', 'Adviserend werk')->first()->id
			),
			array(
				"title" => "Mutsen breien",
				"description" => "We hebben sinds kort een skischool geopend in Tsjechië en willen als reclame middel mutsen hebben met ons logo en bedrijfsnaam er op. Deze willen we als promotie materiaal weggeven aan klanten. Om te beginnen willen we graag 1000 stuks hebben, het liefst gehaakt, maar gebreide mutsen is ook een optie. Minimale bijdrage per persoon is 25 stuks.",
				"amount" => 800,
				"payment" => 2.50,
				"start_date" => "2013-11-28 00:00:00",
				"company_id" => 1,
				"jobcategory_id" => Jobcategory::where('label', '=', 'Handarbeid')->first()->id
			),
			array(
				"title" => "Speelgoed monteren",
				"description" => "Wij zijn een van de grootste speelgoed fabrikanten van Nederland, en we zijn op zoek naar mensen die voor ons thuis speelgoed in elkaar kunnen zetten. Materialen en gereedschap zullen worden aangeleverd.  Technische kennis is een vereiste, aangezien er ook wat soldeer werk aan te pas komt om de chips aan te sluiten op de batterijen.",
				"amount" => 200,
				"payment" => 40.00,
				"start_date" => "2013-12-02 00:00:00",
				"company_id" => 2,
				"jobcategory_id" => Jobcategory::where('label', '=', 'Technisch werk')->first()->id
			)
		);

		// Uncomment the below to run the seeder
		DB::table('jobs')->insert($jobs);
	}

}
