<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		log_message('info', 'Home Page is visited');
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
