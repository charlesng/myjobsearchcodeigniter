<?php

namespace App\Controllers;

use MyRequestValidator;

class Home extends BaseController
{
	public function index()
	{
		$validator = new MyRequestValidator(\Config\Services::request());
		$validator->processSth();
		log_message('info', 'Home Page is visited');
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
