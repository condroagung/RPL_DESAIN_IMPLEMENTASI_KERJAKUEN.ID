<?php

namespace App\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Admin;

class Home extends BaseController
{

	protected $siswa;
	protected $guru;
	protected $admin;

	function __construct()
	{
		$this->siswa = new Siswa();
		$this->guru = new Guru();
		$this->admin = new Admin();
	}

	public function index()
	{
		echo view('auth/login');
	}


	//--------------------------------------------------------------------

}
