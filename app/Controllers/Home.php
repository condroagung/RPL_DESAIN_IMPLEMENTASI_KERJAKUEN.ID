<?php

namespace App\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Admin;

class Home extends BaseController
{
	// MUHAMMAD CONDRO AGUNG PUTRO - 1301184334

	/**
	 * @siswa protected
	 */
	protected $siswa;
	/**
	 * @guru protected
	 */
	protected $guru;
	/**
	 * @admin protected
	 */
	protected $admin;

	/**
	 */
	function __construct()
	{
		$this->siswa = new Siswa(); // inisisasi siswa sebagai model dari Siswa
		$this->guru = new Guru(); // inisiasi guru sebagai model dari Guru
		$this->admin = new Admin(); // inisiasi admin sebagai model dari Admin
	}

	/**
	 * @index menampilkan login
	 */
	public function index()
	{
		echo view('auth/login'); // menampilkan halaman login
	}

	/**
	 * @auth 
	 * menampilkan page admin atau guru atau siswa jika login berhasil,
	 * akan kembali ke page admin jika gagal
	 */
	public function auth()
	{
		$session = session(); // load library session
		$username = $this->request->getPost('username'); // mengambil username dari form login
		$password = $this->request->getPost('password'); // mengambil password dari form login
		$log_admin = $this->admin->where('username', $username)->first(); // mengambil data tertentu dari database admin berdasarkan username yang diinput
		$log_siswa = $this->siswa->where('username', $username)->first(); // mengambil data tertentu dari database siswa berdasarkan username yang diinput
		$log_guru = $this->guru->where('username', $username)->first(); // mengambil data tertentu dari database guru berdasarkan username yang diinput

		// kondisi data tersebut terdapat dalam database admin
		if ($log_admin) {
			$pass_admin = $log_admin['password']; // isi variabel pass_admin dengan data password
			// kondisi pass_admin sama dengan password yang diinput
			if ($pass_admin == $password) {
				// membuat session id_user, username, status, logged_in, selama berada dalam website
				$session_data = [
					'id_user' => $log_admin['id_user'],
					'username' => $log_admin['username'],
					'status' => '0',
					'logged_in' => TRUE
				];
				// men set session yang dibuat diatas
				$session->set($session_data);
				// membuat flash data message berhasil
				$session->setFlashdata('msg', 'Hello');
				// menampilkan halaman index admin
				return redirect()->to(base_url('KelolaAdmin'));
			} else {
				// membuat flash data error
				$session->setFlashdata('msg', 'Wrong Password');
				// menampilkan halaman login
				return redirect()->to(base_url('Home'));
			}
			// kondisi data tersebut terdapat dalam database siswa
		} else if ($log_siswa) {
			$pass_siswa = $log_siswa['password']; // isi variabel pass_siswa dengan data password
			// kondisi pass_siswa sama dengan password yang diinput
			if ($pass_siswa == $password) {
				// membuat session id_user, username, status, logged_in, selama berada dalam website
				$session_data = [
					'id_user' => $log_siswa['id_user'],
					'username' => $log_siswa['username'],
					'status' => '1',
					'logged_in' => TRUE
				];
				// men set session yang dibuat diatas
				$session->set($session_data);
				// membuat flash data message berhasil
				$session->setFlashdata('msg', 'Hello');
				// menampilkan halaman index siswa
				return redirect()->to(base_url('PageSiswa'));
			} else {
				// membuat flash data error
				$session->setFlashdata('msg', 'Wrong Password');
				// menampilkan halaman login
				return redirect()->to(base_url('Home'));
			}
			// kondisi data tersebut terdapat dalam database guru
		} else if ($log_guru) {
			$pass_guru = $log_guru['password']; // isi variabel pass_guru dengan data password
			// kondisi pass_siswa sama dengan password yang diinput
			if ($pass_guru == $password) {
				// membuat session id_user, username, status, logged_in, selama berada dalam website
				$session_data = [
					'id_user' => $log_guru['id_user'],
					'username' => $log_guru['username'],
					'status' => '2',
					'logged_in' => TRUE
				];
				// men set session yang dibuat diatas
				$session->set($session_data);
				// membuat flash data message berhasil
				$session->setFlashdata('msg', 'Hello');
				// menampilkan halaman index siswa
				return redirect()->to(base_url('PageGuru'));
			} else {
				// membuat flash data error
				$session->setFlashdata('msg', 'Wrong Password');
				// menampilkan halaman login
				return redirect()->to(base_url('Home'));
			}
			// kondisi data tidak ada dalam database yang bersangkutan
		} else {
			// membuat flash data error username tidak ditemukan
			$session->setFlashdata('msg', 'Username not Found');
			// menampilkan halaman login
			return redirect()->to(base_url('Home'));
		}
	}

	/**
	 * @logout 
	 * menampilkan page login kembali setelah keluar dari website
	 */
	public function logout()
	{
		$session = session(); // load library session
		$session->destroy(); // menghancurkan session
		return redirect()->to(base_url('Home')); // kembali ke halaman login
	}
	//--------------------------------------------------------------------

}
