<?php

namespace App\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Modul;

class PageGuru extends BaseController
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
        $set['validation'] = \Config\Services::validation();
        $data['paket'] = $this->paket->showpaketbyguru(session()->get('id_user'));
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Dashboard Guru';
        echo view('header', $set);
        echo view('guru/dashboard_guru', $data);
        echo view('footer');
    }

    public function lihat_modul($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $set['validation'] = \Config\Services::validation();
        $session = session();
        $session->set('id_paket', $id);
        $data['paket'] = $this->paket->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')->where('id_paket', $id)->first();
        $data['modul'] = $this->modul->showmodul($id);
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Detail Paket';
        echo view('header', $set);
        echo view('guru/modul_guru', $data);
        echo view('footer');
    }
}
