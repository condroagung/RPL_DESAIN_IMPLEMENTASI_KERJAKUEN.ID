<?php

namespace App\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Modul;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\Jawaban;

class PageSiswa extends BaseController
{

    protected $siswa;
    protected $guru;
    protected $kelas;
    protected $paket;
    protected $mapel;
    protected $modul;
    protected $ujian;
    protected $soal;
    protected $jawaban;

    function __construct()
    {
        $this->siswa = new Siswa();
        $this->guru = new Guru();
        $this->kelas = new Kelas();
        $this->paket = new Paket();
        $this->mapel = new Mapel();
        $this->modul = new Modul();
        $this->ujian = new Ujian();
        $this->soal = new Soal();
        $this->jawaban = new Jawaban();
    }
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $set['validation'] = \Config\Services::validation();
        $data['paket'] = $this->paket->showpaketbykelas(session()->get('kelas'));
        $data['hasil'] = $this->modul->showmodulbykelas(session()->get('kelas'));
        $data['count_modul'] = $this->modul->countModulbyPaket(session()->get('kelas'));
        $data['sum_hasil'] = $this->ujian->sumhasilujian(session()->get('id_user'), session()->get('kelas'));
        $data['avg_hasil'] = $this->ujian->avghasilujian(session()->get('id_user'), session()->get('kelas'));
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Dashboard Siswa';
        echo view('header', $set);
        echo view('siswa/dashboard_siswa', $data);
        echo view('footer');
    }

    public function lihat_modul_siswa($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $session = session();
        $session->set('id_paket', $id);
        $data['paket'] = $this->paket->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')->where('id_paket', $id)->first();
        $data['hasil'] = $this->ujian->hasilmax($id, session()->get('id_user'));
        $data['modul'] = $this->modul->showmodul($id);
        $data['count_modul'] = $this->modul->countModul($id);
        $data['count_modul_ujian'] = $this->ujian->countmoduldoneujian($id);
        $data['check_avg_time'] = $this->modul->check_avgtime($id);
        $data['avg_time'] = $this->modul->avgtime($id);
        $data['avg_hasil'] = $this->ujian->avgpaket($id, session()->get('id_user'));
        $data['count_modul_done'] = $this->ujian->countmoduldone($id, session()->get('id_user'));
        $data['count_soal_modul'] = $this->soal->countsoalbymodul($id, session()->get('id_user'));
        $data['total_soal'] = $this->jawaban->countjawabanbymodul($id, session()->get('id_user'));
        $set['validation'] = \Config\Services::validation();
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Detail Paket Siswa';
        echo view('header', $set);
        echo view('siswa/modul_siswa', $data);
        echo view('footer');
    }




    //--------------------------------------------------------------------

}
