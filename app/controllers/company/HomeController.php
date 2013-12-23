<?php namespace controllers\company;

class HomeController extends \BaseController {

	public function index()
	{
		return \View::make('company.index');
	}

}