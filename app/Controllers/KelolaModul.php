<?php

namespace App\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Modul;

class KelolaModul extends BaseController
{

    protected $siswa;
    protected $guru;
    protected $kelas;
    protected $paket;
    protected $mapel;
    protected $modul;

    function __construct()
    {
        $this->siswa = new Siswa();
        $this->guru = new Guru();
        $this->kelas = new Kelas();
        $this->paket = new Paket();
        $this->mapel = new Mapel();
        $this->modul = new Modul();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['modul'] = $this->paket->showpaketbyguru(session()->get('id_user'));
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Dashboard Guru';
        echo view('header', $set);
        echo view('guru/dashboard_guru', $data);
        echo view('footer');
    }

    public function buat_modul()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['count_modul'] = $this->modul->countModul(session()->get('id_paket'));
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Buat Modul';
        echo view('header', $set);
        echo view('guru/buat_modul', $data);
        echo view('footer');
    }

    public function buat_soal()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Buat Soal';
        echo view('header', $set);
        echo view('guru/buat_soal', $data);
        echo view('footer');
    }
}
