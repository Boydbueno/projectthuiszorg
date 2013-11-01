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
		$this->call('JobsTableSeeder');
		$this->call('JobcategoriesTableSeeder');
		$this->call('JobJobcategoryTableSeeder');
		$this->call('JobUserTableSeeder');
		$this->call('CompaniesTableSeeder');
	}

}