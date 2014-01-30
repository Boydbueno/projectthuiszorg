<?php

View::composer(
	'client.index',
	'Rework\Composers\FilterComposer');

//Send friendlist data to each of these views
View::composer(
	array('client.index',
		  'client.jobDetail',
		  'client.jobEdit',
		  'client.join',
		  'client.myjobs',
		  'client.friendlist',
		  'client.settings'),
	'Rework\Composers\FriendListComposer');