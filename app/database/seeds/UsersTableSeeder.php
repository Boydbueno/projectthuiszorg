<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// TODO: Abstract below two lines
		DB::table('users')->delete();
		DB::statement('ALTER TABLE users AUTO_INCREMENT=1');

		$users = array(
			array(
				'username' => 'boydbuenodemesquita', 
				'email' => 'boydbuenodemesquita@gmail.com', 
				'password' => Hash::make('Welkom01'),
				'confirmation_code' => '7896eef2ea334fb0e13f496996b17177',
				'confirmed' => '1'
			),
			array(
				'username' => 'stefanweck', 
				'email' => 'stefanweck1@gmail.com', 
				'password' => Hash::make('Welkom01'),
				'confirmation_code' => '7896eef2ea334fb0e13f496996b17177',
				'confirmed' => '1'
			),
			array(
				'username' => 'kevinvlietstra', 
				'email' => 'dmagphone@gmail.com', 
				'password' => Hash::make('Welkom01'),
				'confirmation_code' => '7896eef2ea334fb0e13f496996b17177',
				'confirmed' => '1'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
