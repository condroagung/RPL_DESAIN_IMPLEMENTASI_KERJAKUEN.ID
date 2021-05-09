<?php

namespace App\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Admin;

class MulaiUjian extends BaseController
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
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['validation'] = \Config\Services::validation();
        $data['title'] = 'Halaman Ujian';
        echo view('header', $data);
        echo view('ujian/start_ujian', $data);
        echo view('footer');
    }
}
