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
				'user_id' => User::where('username', '=', 'boydbuenodemesquitaclient')->first()->id,
				'role_id' => Role::where('name', '=', 'Client')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'boydbuenodemesquitacompany')->first()->id,
				'role_id' => Role::where('name', '=', 'CompanyOwner')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweck')->first()->id,
				'role_id' => Role::where('name', '=', 'Administrator')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweckclient')->first()->id,
				'role_id' => Role::where('name', '=', 'Client')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweckcompany')->first()->id,
				'role_id' => Role::where('name', '=', 'CompanyOwner')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'kevinvlietstra')->first()->id,
				'role_id' => Role::where('name', '=', 'Administrator')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'kevinvlietstraclient')->first()->id,
				'role_id' => Role::where('name', '=', 'Client')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'kevinvlietstracompany')->first()->id,
				'role_id' => Role::where('name', '=', 'CompanyOwner')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'timodeboer')->first()->id,
				'role_id' => Role::where('name', '=', 'Client')->first()->id
			),
			array(
				'user_id' => User::where('username', '=', 'willemijnbakker')->first()->id,
				'role_id' => Role::where('name', '=', 'Client')->first()->id
			),
		);

		DB::table('assigned_roles')->insert($assignedroles);
	}

}
