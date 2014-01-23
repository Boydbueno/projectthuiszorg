<?php

class FriendListTableSeeder extends Seeder {

	public function run()
	{
		DB::table('friend_list')->delete();

		$friendlist = array(
			array(
				"user_id" => User::where('username', '=', 'stefanweckclient')->first()->id,
				"friend_id" => User::where('username', '=', 'kevinvlietstraclient')->first()->id
			),
			array(
				"user_id" => User::where('username', '=', 'stefanweckclient')->first()->id,
				"friend_id" => User::where('username', '=', 'boydbuenodemesquitaclient')->first()->id
			),
			array(
				"user_id" => User::where('username', '=', 'boydbuenodemesquitaclient')->first()->id,
				"friend_id" => User::where('username', '=', 'kevinvlietstraclient')->first()->id
			)
		);

		DB::table('friend_list')->insert($friendlist);
	}

}
