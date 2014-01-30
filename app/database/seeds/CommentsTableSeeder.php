<?php

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('comments')->delete();

		$comments = array(
			array(
				'user_id' => User::where('username', '=', 'stefanweckclient')->first()->id,
				'job_id' => Job::where('title', '=', 'Tapijt leggen')->first()->id,
				'text' => "Dit is een reactie!"
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweckclient')->first()->id,
				'job_id' => Job::where('title', '=', 'Tapijt leggen')->first()->id,
				'text' => "Dit is nog een reactie!"
			)
		);

		DB::table('comments')->insert($comments);
	}

}
