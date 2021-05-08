<?php

namespace App\Controllers;

use App\Models\Guru;

class PageGuru extends BaseController
{

    protected $siswa;

    function __construct()
    {
        $this->siswa = new Guru();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Dashboard Guru';
        echo view('header', $set);
        echo view('guru/dashboard_guru', $data);
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
        echo view('guru/modul_guru', $data);
        echo view('footer');
    }




    //--------------------------------------------------------------------

}
