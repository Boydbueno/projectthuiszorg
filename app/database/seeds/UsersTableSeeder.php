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
				'email' => 'boydbuenodemesquita@gmail.com', 
				'password' => Hash::make('Welkom01'),
				'first_name' => 'Boyd',
				'last_name' => 'Bueno de Mesquita',
				'street_name' => 'Bloklandstraat',
				'house_number' => '116',
				'zipcode' => '3036TR',
				'city' => 'Rotterdam'
			),
			array(
				'email' => 'stefanweck1@gmail.com', 
				'password' => Hash::make('Welkom01'),
				'first_name' => 'Kevin',
				'last_name' => 'Vlietstra',
				'street_name' => 'Weteringdreef',
				'house_number' => '10',
				'zipcode' => '2724HA',
				'city' => 'Zoetermeer'
			),
			array(
				'email' => 'dmagphone@gmail.com', 
				'password' => Hash::make('Welkom01'),
				'first_name' => 'Stefan',
				'last_name' => 'Weck',
				'street_name' => 'somewhere',
				'house_number' => '0',
				'zipcode' => '1111AA',
				'city' => 'Gorinchem'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
