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

class PageGuru extends BaseController
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
        $data['paket'] = $this->paket->showpaketbyguru(session()->get('id_user'));
        $data['validation'] = \Config\Services::validation();
        $data['rekap'] = $this->paket->showmodulbyguru(session()->get('id_user'));
        $data['modul_guru'] = $this->modul->countmodulbyGuru(session()->get('id_user'));
        $data['total_nilai'] = $this->ujian->counttotalnilai(session()->get('id_user'));
        $data['max_nilai'] = $this->ujian->maxnilai(session()->get('id_user'));
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
        $data['count_modul'] = $this->modul->countModul($id);
        $data['check_avg_time'] = $this->modul->check_avgtime($id);
        $data['count_modul_done'] = $this->ujian->countmoduldoneguru($id);
        $data['count_soal_modul'] = $this->soal->countsoalbymodul($id);
        $data['count_soal_done'] = $this->jawaban->countjawabanbymodulguru($id);
        $data['avg_all'] = $this->ujian->avgallujian($id);
        $data['avg_time'] = $this->modul->avgtime($id);
        $data['modul'] = $this->modul->showmodul($id);
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Detail Paket';
        echo view('header', $set);
        echo view('guru/modul_guru', $data);
        echo view('footer');
    }

    public function lihat_nilai($id, $no)
    {
        $set['validation'] = \Config\Services::validation();
        $data['validation'] = \Config\Services::validation();
        $data['nilai'] = $this->ujian->hasilujian($id);
        $data['data'] = $this->ujian->hasil($id);
        $data['nama_modul'] = $this->modul->namamodul($id);
        $set['title'] = 'Lihat Nilai';
        $session = session();
        $session->set('no_modul', $no);
        echo view('header', $set);
        echo view('guru/lihat_nilai', $data);
        echo view('footer');
    }

    public function delete_ujian($id)
    {
        $this->ujian->deleteujian($id); // memanggil function delete guru dari model guru
        session()->setFlashdata('success', '<div class="alert alert-warning" style="margin-top:2vh" role="alert">Data Ujian berhasil dihapus</div>');
        return redirect()->to(base_url('PageGuru')); // jika proses berhasil, maka kembali ke page admin
    }
}
