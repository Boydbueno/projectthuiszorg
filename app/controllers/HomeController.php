<?php

class HomeController extends BaseController {

	public function showIndex()
	{
		return View::make('home/index');
	}

	public function showClient()
	{
		return View::make('client/index');
	}

	public function showCompany()
	{
		return View::make('company/index');
	}

}