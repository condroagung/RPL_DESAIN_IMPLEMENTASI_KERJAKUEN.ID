<?php

namespace App\Controllers;

use App\Models\Siswa;

class PageSiswa extends BaseController
{

    protected $siswa;

    function __construct()
    {
        $this->siswa = new Siswa();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Dashboard Siswa';
        echo view('header', $set);
        echo view('siswa/dashboard_siswa', $data);
        echo view('footer');
    }

    public function lihat_modul()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Detail Paket';
        echo view('header', $set);
        echo view('siswa/modul_siswa', $data);
        echo view('footer');
    }




    //--------------------------------------------------------------------

}
