<?php

class AssignedRolesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('assigned_roles')->delete();

		$assignedroles = array(
			array(
				'user_id' => User::where('username', '=', 'boydbuenodemesquita')->first()->id,
				'role_id' => Role::where('name', '=', 'Administrator')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweck')->first()->id,
				'role_id' => Role::where('name', '=', 'Administrator')->first()->id
			),			
			array(
				'user_id' => User::where('username', '=', 'kevinvlietstra')->first()->id,
				'role_id' => Role::where('name', '=', 'Administrator')->first()->id
			),
		);

		DB::table('assigned_roles')->insert($assignedroles);
	}

}
