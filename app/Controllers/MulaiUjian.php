<?php

namespace App\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Admin;
use App\Models\Modul;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\Jawaban;

class MulaiUjian extends BaseController
{
    protected $siswa;
    protected $guru;
    protected $admin;
    protected $soal;
    protected $modul;
    protected $ujian;
    protected $jawaban;

    function __construct()
    {
        $this->siswa = new Siswa();
        $this->guru = new Guru();
        $this->admin = new Admin();
        $this->soal = new Soal();
        $this->modul = new Modul();
        $this->ujian = new Ujian();
        $this->jawaban = new Jawaban();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $set['validation'] = \Config\Services::validation();
        $data['validation'] = \Config\Services::validation();
        $data['title'] = 'Halaman Ujian';
        $data['time_start'] = 7200;
        echo view('header', $data);
        echo view('ujian/start_ujian', $data);
        echo view('footer');
    }

    public function ujian($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $set['validation'] = \Config\Services::validation();
        $data['validation'] = \Config\Services::validation();
        $data['title'] = 'Halaman Ujian';
        $session = session();
        $session->set('id_modul', $id);
        $session->set('sesi_ujian', 1);
        $data_modul = $this->modul->where('id_modul', $id)->first();
        $data['time_start'] = $data_modul['rata_waktu'] * 60;
        $data['soal'] = $this->soal->showsoal($id);

        $insert = [
            'id_modul' => $id,
            'id_user' => session()->get('id_user'),
            'waktu_mulai' => date("d/m/Y h:i:s"),
            'waktu_berakhir' => date("d/m/Y h:i:s"),
            'skor_akhir' => 0
        ];

        $this->ujian->createujian($insert);

        $insert_id = $this->ujian->insertID();
        $session->set('id_ujian', $insert_id);


        //$date = date_create("2013-03-15");
        //$date_true = date_format($date, "Y/m/d H:i:s");

        //$update = [
        //'waktu_berakhir' => $date_true
        //];

        //$this->ujian->updateujian($update, $insert_id);

        echo view('header', $data);
        echo view('ujian/start_ujian', $data);
        echo view('footer');
    }

    public function koreksi()
    {
        $kunjaw_ujian = array();
        $kunjaw_soal = $this->soal->showsoal(session()->get('id_modul'));
        $i = 0;
        foreach ($kunjaw_soal as $kj) {
            $kunjaw_ujian[$i] = $kj['kunci_jawaban'];
            $i++;
        }

        $kunjaw = array();
        $j = 0;
        $status = 'benar';
        $skor = 0;
        $jumlah_soal = $this->soal->countsoal(session()->get('id_modul'));
        while ($j < $jumlah_soal) {
            $kunjaw[$j] = $this->request->getPost('soal' . ($j + 1));
            if ($kunjaw[$j] == $kunjaw_ujian[$j]) {
                $status = 'benar';
                $skor = $skor + 5;
                $insert = [
                    'id_ujian' => session()->get('id_ujian'),
                    'jawaban_soal' => $kunjaw[$j],
                    'status_jawaban' => $status,
                    'skor_jawaban' => 5
                ];
            } else {
                $status = 'salah';
                $skor = $skor + 0;
                $insert = [
                    'id_ujian' => session()->get('id_ujian'),
                    'jawaban_soal' => $kunjaw[$j],
                    'status_jawaban' => $status,
                    'skor_jawaban' => 0
                ];
            }
            $this->jawaban->createjawaban($insert);
            $j++;
        }
        $indeks = 5 * $jumlah_soal;
        $kali = 100 / $indeks;

        $update = [
            'waktu_berakhir' => date("d/m/Y h:i:s"),
            'skor_akhir' => $skor * $kali
        ];

        $this->ujian->updateujian($update, session()->get('id_ujian'));

        session()->set('sesi_ujian', 0);

        session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Ujian Sudah Diterima, Silakan Periksa Hasilnya</div>');
        return redirect()->to(base_url('PageSiswa'));
    }
}
