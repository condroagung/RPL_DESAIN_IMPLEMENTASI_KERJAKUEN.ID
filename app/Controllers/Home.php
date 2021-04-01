<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('header_admin');
		echo view('dashboard_admin');
		echo view('footer_admin');
	}

	//--------------------------------------------------------------------

}
