<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('UsersTableSeeder');
		$this->call('JobcategoriesTableSeeder');
		$this->call('StatusesTableSeeder');
		$this->call('CompaniesTableSeeder');
		$this->call('JobsTableSeeder');
		$this->call('JobUserTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('AssignedRolesTableSeeder');
	}

}