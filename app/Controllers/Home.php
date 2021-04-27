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

	public function auth()
	{
		$session = session();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$log_admin = $this->admin->where('username', $username)->first();
		$log_siswa = $this->siswa->where('username', $username)->first();
		$log_guru = $this->guru->where('username', $username)->first();
		if ($log_admin) {
			$pass_admin = $log_admin['password'];
			if ($pass_admin == $password) {
				$session_data = [
					'id_user' => $log_admin['id_user'],
					'username' => $log_admin['username'],
					'logged_in' => TRUE
				];
				$session->set($session_data);
				$session->setFlashdata('msg', 'Hello');
				return redirect()->to(base_url('KelolaAdmin'));
			} else {
				$session->setFlashdata('msg', 'Wrong Password');
				return redirect()->to(base_url('Home'));
			}
		} else if ($log_siswa) {
			$pass_siswa = $log_siswa['password'];
			if ($pass_siswa == $password) {
				$session_data = [
					'id_user' => $log_siswa['id_user'],
					'username' => $log_siswa['username'],
					'logged_in' => TRUE
				];
				$session->set($session_data);
				$session->setFlashdata('msg', 'Hello');
				return redirect()->to(base_url('PageSiswa'));
			} else {
				$session->setFlashdata('msg', 'Wrong Password');
				return redirect()->to(base_url('Home'));
			}
		} else if ($log_guru) {
			$pass_guru = $log_guru['password'];
			if ($pass_guru == $password) {
				$session_data = [
					'id_user' => $log_guru['id_user'],
					'username' => $log_guru['username'],
					'logged_in' => TRUE
				];
				$session->set($session_data);
				$session->setFlashdata('msg', 'Hello');
				return redirect()->to(base_url('PageGuru'));
			} else {
				$session->setFlashdata('msg', 'Wrong Password');
				return redirect()->to(base_url('Home'));
			}
		} else {
			$session->setFlashdata('msg', 'Username not Found');
			return redirect()->to(base_url('Home'));
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('Home'));
	}


	//--------------------------------------------------------------------

}
