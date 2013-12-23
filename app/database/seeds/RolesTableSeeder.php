<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('roles')->delete();

		$roles = array(
			array(
				'name' => "Administrator",
				'created_at' => "2013-12-23 15:19:18",
				'updated_at' => "2013-12-23 15:19:18"
			),
			array(
				'name' => "Client",
				'created_at' => "2013-12-23 15:19:18",
				'updated_at' => "2013-12-23 15:19:18"
			),			
			array(
				'name' => "Company",
				'created_at' => "2013-12-23 15:19:18",
				'updated_at' => "2013-12-23 15:19:18"
			),
		);

		DB::table('roles')->insert($roles);
	}

}
