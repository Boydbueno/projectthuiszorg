<?php

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('comments')->delete();

		$comments = array(
			array(
				'user_id' => User::where('username', '=', 'stefanweckclient')->first()->id,
				'job_id' => Job::where('title', '=', 'Tapijt leggen')->first()->id,
				'text' => "Is het mogelijk om halve dagen te komen? Dan overweeg ik het wel om te komen!"
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweckcompany')->first()->id,
				'job_id' => Job::where('title', '=', 'Tapijt leggen')->first()->id,
				'text' => "Hoi Henk, tuurlijk is dit mogelijk! We zullen met alle aanmelders een planning opstellen en kijken wat voor iedereen het beste uitkomt!"
			),
			array(
				'user_id' => User::where('username', '=', 'timodeboer')->first()->id,
				'job_id' => Job::where('title', '=', 'Speelgoed monteren')->first()->id,
				'text' => "Ik doe mee, leuke opdracht!"
			),
			array(
				'user_id' => User::where('username', '=', 'willemijnbakker')->first()->id,
				'job_id' => Job::where('title', '=', 'Mutsen breien')->first()->id,
				'text' => "Leuk! Ik heb ook een aantal vriendinnen uitgenodigd."
			),
			array(
				'user_id' => User::where('username', '=', 'kevinvlietstraclient')->first()->id,
				'job_id' => Job::where('title', '=', 'Mutsen breien')->first()->id,
				'text' => "Ik heb de uitnodiging ontvangen Willemijn! Ik ga er over nadenken, het lijkt me leuk om samen te breien."
			),
			array(
				'user_id' => User::where('username', '=', 'boydbuenodemesquitaclient')->first()->id,
				'job_id' => Job::where('title', '=', 'Mutsen breien')->first()->id,
				'text' => "Ik ook, wat leuk dat jij ook mee wilt doen!"
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweckclient')->first()->id,
				'job_id' => Job::where('title', '=', 'Finacieel advies')->first()->id,
				'text' => "Wat verstaan jullie onder 'ervaring in deze branch'?"
			),
			array(
				'user_id' => User::where('username', '=', 'boydbuenodemesquitacompany')->first()->id,
				'job_id' => Job::where('title', '=', 'Finacieel advies')->first()->id,
				'text' => "Goedenmiddag, we bedoelen daarmee mensen die gewerkt hebben in de financiele sector. Wat heeft u voor werk gedaan?"
			),
			array(
				'user_id' => User::where('username', '=', 'stefanweckclient')->first()->id,
				'job_id' => Job::where('title', '=', 'Finacieel advies')->first()->id,
				'text' => "Ik heb jaren gewerkt als boekhouder!"
			),
			array(
				'user_id' => User::where('username', '=', 'boydbuenodemesquitacompany')->first()->id,
				'job_id' => Job::where('title', '=', 'Finacieel advies')->first()->id,
				'text' => "Klinkt goed, als u zich aanmeld voor de opdracht zullen we u uitleggen wat de verdere stappen zijn!"
			),
		);

		DB::table('comments')->insert($comments);
	}

}
