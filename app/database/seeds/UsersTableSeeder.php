<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = array(
			array('email' => 'boydbuenodemesquita@gmail.com', 'password' => Hash::make('Welkom01')),
			array('email' => 'stefanweck1@gmail.com', 'password' => Hash::make('Welkom01')),
			array('email' => 'dmagphone@gmail.com', 'password' => Hash::make('Welkom01'))
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
