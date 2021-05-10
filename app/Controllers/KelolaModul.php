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

    public function create_modul()
    {
        $judul_modul = $this->request->getPost('judul_modul');
        $modul_ke = $this->request->getPost('modul_ke');
        $rata_waktu = $this->request->getPost('rata_waktu');

        $validation = $this->validate(
            [
                'judul_modul' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'rata_waktu' => [
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} ({value}) telah digunakan, gunakan yang lain',
                        'numeric' => 'Waktu Pengerjaan hanya boleh angka, jangan masukin selain angka'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'id_paket' => session()->get('id_paket'),
            'judul_modul' => $judul_modul,
            'modul_ke' => $modul_ke,
            'rata_waktu' => $rata_waktu,
            'status_modul' => 0
        ];

        $this->modul->createmodul($data);
        session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Modul Berhasil Ditambahkan</div>');
        session()->remove('id_paket');
        return redirect()->to(base_url('PageGuru'));
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
