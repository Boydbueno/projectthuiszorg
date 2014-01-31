<?php

class JobsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('jobs')->delete();

		$jobs = array(
			array(
				"title" => "Tapijt leggen",
				"short_description" => "Wij hebben net een nieuw bedrijfspand gekocht vlakbij Station Blaak in Rotterdam. Er moet nog nieuw tapijt gelegd worden in dit nieuwe pand. Hier zoeken wij mensen voor die ervaring hebben met het leggen van grote oppervlakken. Aanschaf van de benodigde materialen zullen wij zelf verzorgen.",
				"long_description" => "Wij hebben net een nieuw bedrijfspand gekocht vlakbij Station Blaak in Rotterdam. Er moet nog nieuw tapijt gelegd worden in dit nieuwe pand. Hier zoeken wij mensen voor die ervaring hebben met het leggen van grote oppervlakken. Aanschaf van de benodigde materialen zullen wij zelf verzorgen. Ook is er een lunch mocht dit nodig zijn. We horen graag uw reacties!",
				"amount" => 200,
				"payment" => 10.00,
				"minimum" => 10,
				"step" => 10,
				"prefix" => "",
				"postfix" => "m2",
				"start_date" => "2014-02-15 00:00:00",
				"end_date" => "2014-03-15 00:00:00",
				"company_id" => Company::where('name', '=', 'MijnOpslag')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Fysiek werk')->first()->id,
				"status_id" => Status::where('label', '=', 'Open')->first()->id
			),
			array(
				"title" => "Finacieel advies",
				"short_description" => "Beginnend bedrijf zoekt een of meerdere voormalig financieel adviseurs. Ervaring in deze branch is een pre. We heben hulp nodig met onze administratie en het bijhouden van de financiele zaken voor het bedrijf. Ook hebben wij advies nodig op het gebied van afschrijven, inkopen van kantoor artikelen en pensioenen van toekomstige werknemers.",
				"long_description" => "",
				"amount" => 10,
				"payment" => 30.00,
				"minimum" => 2,
				"step" => 1,
				"prefix" => "",
				"postfix" => "uur",
				"start_date" => "2014-02-17 00:00:00",
				"end_date" => "2014-03-17 00:00:00",
				"company_id" => Company::where('name', '=', 'Souvenir Shop Rotterdam')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Adviserend werk')->first()->id,
				"status_id" => Status::where('label', '=', 'Open')->first()->id
			),
			array(
				"title" => "Mutsen breien",
				"short_description" => "Van de 2,6 miljoen 65+'ers in Nederland is meer dan een miljoen eenzaam tot zeer eenzaam. Granny's Finest voorkomt eenzaamheid door senioren hun hobby handwerk uit te laten oefenen in groepsverband begeleid door jonge ontwerpers. Jong leert van oud en omgedraaid.",
				"long_description" => "Van de 2,6 miljoen 65+'ers in Nederland is meer dan een miljoen eenzaam tot zeer eenzaam. Granny's Finest voorkomt eenzaamheid door senioren hun hobby handwerk uit te laten oefenen in groepsverband begeleid door jonge ontwerpers. Jong leert van oud en omgedraaid. Met de juiste natuurlijke garens, de juiste uitleg en de juiste inspanningen worden kwalitatief hoogwaardige handgemaakte producten gemaakt. Deze worden verkocht en met de opbrengst worden de sociale doelen van de stichting gerealiseerd. ",
				"amount" => 100,
				"payment" => 0.50,
				"minimum" => 5,
				"step" => 5,
				"prefix" => "",
				"postfix" => "Mutsen",
				"start_date" => "2014-02-28 00:00:00",
				"end_date" => "2014-03-28 00:00:00",
				"company_id" => Company::where('name', '=', 'Grannies Finest')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Handarbeid')->first()->id,
				"status_id" => Status::where('label', '=', 'Open')->first()->id
			),
			array(
				"title" => "Speelgoed monteren",
				"short_description" => "Wij zijn een van de grootste speelgoed fabrikanten van Nederland, en we zijn op zoek naar mensen die voor ons thuis speelgoed in elkaar kunnen zetten. Materialen en gereedschap zullen worden aangeleverd.  Technische kennis is een vereiste, aangezien er ook wat soldeer werk aan te pas komt om de chips aan te sluiten op de batterijen.",
				"long_description" => "",
				"amount" => 500,
				"payment" => 15.00,
				"minimum" => 10,
				"step" => 10,
				"prefix" => "",
				"postfix" => "Stuks",
				"start_date" => "2014-02-02 00:00:00",
				"end_date" => "2014-03-02 00:00:00",
				"company_id" => Company::where('name', '=', 'Hasbro')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Technisch werk')->first()->id,
				"status_id" => Status::where('label', '=', 'Open')->first()->id
			),
			array(
				"title" => "Gadgets monteren",
				"short_description" => "Wij zijn een van de grootste speelgoed fabrikanten van Nederland, en we zijn op zoek naar mensen die voor ons thuis gadgets in elkaar kunnen zetten. Materialen en gereedschap zullen worden aangeleverd.  Technische kennis is een vereiste, aangezien er ook wat soldeer werk aan te pas komt om de chips aan te sluiten op de batterijen.",
				"long_description" => "",
				"amount" => 100,
				"payment" => 5.00,
				"minimum" => 10,
				"step" => 10,
				"prefix" => "",
				"postfix" => "Stuks",
				"start_date" => "2014-01-01 00:00:00",
				"end_date" => "2014-04-03 00:00:00",
				"company_id" => Company::where('name', '=', 'Hasbro')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Technisch werk')->first()->id,
				"status_id" => Status::where('label', '=', 'Gestart')->first()->id
			),
			array(
				"title" => "Folders vouwen",
				"short_description" => "Wij hebben folders nodig voor de opening van een van onze nieuwe filialen. In onze folder staan alle nieuwe aanbiedingen en acties die wij de bezoekers graag mee willen geven. Deze folders moeten gevouwen worden voor deze gelegenheid.",
				"long_description" => "",
				"amount" => 2500,
				"payment" => 0.20,
				"minimum" => 100,
				"step" => 50,
				"prefix" => "",
				"postfix" => "Folders",
				"start_date" => "2014-01-31 00:00:00",
				"end_date" => "2014-03-11 00:00:00",
				"company_id" => Company::where('name', '=', 'Primark')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Handarbeid')->first()->id,
				"status_id" => Status::where('label', '=', 'Gestart')->first()->id
			),
			array(
				"title" => "Muren verven",
				"short_description" => "Voor een groot studenten huis onder ons beheer willen wij alle muren opnieuw geverft hebben. Het betreft een verouderd gebouw en het is nu echt aan vernieuwing toe.",
				"long_description" => "",
				"amount" => 150,
				"payment" => 1.00,
				"minimum" => 10,
				"step" => 10,
				"prefix" => "",
				"postfix" => "m2",
				"start_date" => "2014-02-08 00:00:00",
				"end_date" => "2014-05-11 00:00:00",
				"company_id" => Company::where('name', '=', 'Vestia')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Fysiek')->first()->id,
				"status_id" => Status::where('label', '=', 'Open')->first()->id
			),
			array(
				"title" => "Kleding repareren",
				"short_description" => "Wij hebben een grote hoeveelheid tweedehands kleding, spijkerbroeken, t-shirts, truien etc.. Omdat de tweedehands kleding al veel gedragen is, is het niet allemaal even netjes meer. Er zijn beschadegingen zoals gaten e.d.. Wij zoeken mensen die deze kleding kunnen repareren, zodat wij de weer nette kleding op kunnen sturen naar derdewereldlanden voor een goed doel.",
				"long_description" => "",
				"amount" => 200,
				"payment" => 5.00,
				"minimum" => 1,
				"step" => 1,
				"prefix" => "",
				"postfix" => "Kledingstukken",
				"start_date" => "2014-03-22 00:00:00",
				"end_date" => "2014-07-01 00:00:00",
				"company_id" => Company::where('name', '=', 'Kledingreparatie Rotterdam')->first()->id,
				"jobcategory_id" => JobCategory::where('label', '=', 'Handarbeid')->first()->id,
				"status_id" => Status::where('label', '=', 'Open')->first()->id
			)
		);

		DB::table('jobs')->insert($jobs);
	}

}
