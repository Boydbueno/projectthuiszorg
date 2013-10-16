<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		return View::make('home.index');
	}

	public function getContact()
	{
		return View::make('home.contact');
	}

	public function postContact()
	{
		return View::make('home.contact');
	}

}