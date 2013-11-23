<?php

class JobcategoriesTableSeeder extends Seeder {

	public function run()
	{
		// TODO: Abstract below two lines
		DB::table('jobcategories')->delete();
		DB::statement('ALTER TABLE users AUTO_INCREMENT=1');

		$jobcategories = array(
			array(
				"label" => "Fysiek werk",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
			),
			array(
				"label" => "Adviserend werk",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
			),
			array(
				"label" => "Handarbeid",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
			),
			array(
				"label" => "Technisch werk",
				"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
			)
		);

		// Uncomment the below to run the seeder
		DB::table('jobcategories')->insert($jobcategories);
	}

}
