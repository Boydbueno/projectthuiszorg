<?php

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('statuses')->delete();

		$statuses = array(
			array(
				'label' => 'Gestart',
				'description' => 'De opdracht is gestart door de opdrachtgever'
			),
			array(
				'label' => 'Gepauzeerd',
				'description' => 'De opdracht is gepauzeerd door de opdrachtgever'
			),
			array(
				'label' => 'Open',
				'description' => 'De opdracht staat open voor inschrijvingen'
			)
		);

		DB::table('statuses')->insert($statuses);
	}

}