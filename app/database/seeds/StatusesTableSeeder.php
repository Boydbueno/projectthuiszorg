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
			// TODO: Change name of pending
			array(
				'label' => 'Pending',
				'description' => 'De opdracht is nog niet gestart'
			)
		);

		DB::table('statuses')->insert($statuses);
	}

}