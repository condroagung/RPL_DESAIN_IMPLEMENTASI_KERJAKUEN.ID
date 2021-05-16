<?php

namespace App\Controllers;

use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Modul;
use App\Models\Soal;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KelolaModul extends BaseController
{

    protected $paket;
    protected $mapel;
    protected $modul;
    protected $soal;

    function __construct()
    {
        $this->paket = new Paket();
        $this->mapel = new Mapel();
        $this->modul = new Modul();
        $this->soal = new Soal();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $set['validation'] = \Config\Services::validation();
        $data['modul'] = $this->paket->showpaketbyguru(session()->get('id_user'));
        $set['validation'] = \Config\Services::validation();
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
        $set['validation'] = \Config\Services::validation();
        $data['count_modul'] = $this->modul->countModul(session()->get('id_paket'));
        $set['validation'] = \Config\Services::validation();
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Buat Modul';
        echo view('header', $set);
        echo view('guru/buat_modul', $data);
        echo view('footer');
    }

    public function edit_modul($id, $no)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $session = session();
        $session->set('id_modul', $id);
        $session->set('no_modul', $no);
        $set['validation'] = \Config\Services::validation();
        $data['soal'] = $this->soal->showsoal($id);
        $set['validation'] = \Config\Services::validation();
        $data['count_modul'] = $this->modul->countModul(session()->get('id_paket'));
        $data['edit_modul'] = $this->modul->join('Paket', 'modul.id_paket = paket.id_paket')
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')->where('id_modul', $id)->first();
        $data['validation'] = \Config\Services::validation();
        $set['title'] = 'Edit Modul';
        echo view('header', $set);
        echo view('guru/edit_modul', $data);
        echo view('footer');
    }

    public function create_modul()
    {
        $judul_modul = $this->request->getPost('judul_modul');
        $modul_ke = $this->request->getPost('modul_ke');
        $rata_waktu = $this->request->getPost('rata_waktu');
        $sub1 = $this->request->getPost('modulsubmit1');
        $sub2 = $this->request->getPost('modulsubmit2');

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

        if (isset($sub1)) {
            $data = [
                'id_paket' => session()->get('id_paket'),
                'judul_modul' => $judul_modul,
                'modul_ke' => $modul_ke,
                'rata_waktu' => $rata_waktu,
                'status_modul' => 0
            ];

            $this->modul->createmodul($data);
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Modul Berhasil Ditambahkan (Lock)</div>');
            session()->remove('id_paket');
            return redirect()->to(base_url('PageGuru'));
        } else {
            $data = [
                'id_paket' => session()->get('id_paket'),
                'judul_modul' => $judul_modul,
                'modul_ke' => $modul_ke,
                'rata_waktu' => $rata_waktu,
                'status_modul' => 1
            ];

            $this->modul->createmodul($data);
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Modul Berhasil Ditambahkan (Unlock)</div>');
            session()->remove('id_paket');
            return redirect()->to(base_url('PageGuru'));
        }
    }

    public function edit_data_modul()
    {
        $id = $this->request->getPost('id_modul');
        $judul_modul = $this->request->getPost('judul_modul');
        $rata_waktu = $this->request->getPost('rata_waktu');
        $sub1 = $this->request->getPost('editsubmit1');
        $sub2 = $this->request->getPost('editsubmit2');

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

        if (isset($sub1)) {
            $data = [
                'judul_modul' => $judul_modul,
                'rata_waktu' => $rata_waktu,
                'status_modul' => 0
            ];

            $this->modul->updatemodul($data, $id);
            session()->setFlashdata('success', '<div class="alert alert-primary" style="margin-top:2vh" role="alert">Data Modul Berhasil Di Update (lock)</div>');
            session()->remove('id_paket');
            return redirect()->to(base_url('PageGuru'));
        } else {
            $data = [
                'judul_modul' => $judul_modul,
                'rata_waktu' => $rata_waktu,
                'status_modul' => 1
            ];

            $this->modul->updatemodul($data, $id);
            session()->setFlashdata('success', '<div class="alert alert-primary" style="margin-top:2vh" role="alert">Data Modul Berhasil Di Update (Unlock)</div>');
            session()->remove('id_paket');
            return redirect()->to(base_url('PageGuru'));
        }
    }

    public function delete_modul($id)
    {
        $this->modul->deletemodul($id);
        session()->setFlashdata('success', '<div class="alert alert-warning" style="margin-top:2vh" role="alert">Modul berhasil dihapus</div>');
        return redirect()->to(base_url('PageGuru'));
    }

    public function delete_soal($id)
    {
        $this->soal->deletesoal($id);
        session()->setFlashdata('success', '<div class="alert alert-warning" style="margin-top:2vh" role="alert">Soal berhasil dihapus</div>');
        return redirect()->to(base_url('PageGuru'));
    }

    public function buat_soal($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        session()->set('id_modul', $id);
        $data['validation'] = \Config\Services::validation();
        $set['validation'] = \Config\Services::validation();
        $data['id'] = $id;
        $data['count_soal'] = $this->soal->countsoal($id);
        $set['title'] = 'Buat Soal';
        echo view('header', $set);
        echo view('guru/buat_soal', $data);
        echo view('footer');
    }

    public function create_soal()
    {
        $bunyi_soal = $this->request->getPost('bunyi_soal');
        $opsi_a = $this->request->getPost('opsi_a');
        $opsi_b = $this->request->getPost('opsi_b');
        $opsi_c = $this->request->getPost('opsi_c');
        $opsi_d = $this->request->getPost('opsi_d');
        $skor_soal = $this->request->getPost('skor_soal');
        $kunci_jawaban = $this->request->getPost('kunci_jawaban');

        $validation = $this->validate(
            [
                'bunyi_soal' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'soal tidak boleh kosong'
                    ]
                ],
                'opsi_a' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'opsi_b' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'opsi_c' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'opsi_d' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'skor_soal' => [
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} Pengerjaan hanya boleh angka, jangan masukin selain angka'
                    ]
                ],
                'kunci_jawaban' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'id_modul' => session()->get('id_modul'),
            'bunyi_soal' => $bunyi_soal,
            'opsi_a' => $opsi_a,
            'opsi_b' => $opsi_b,
            'opsi_c' => $opsi_c,
            'opsi_d' => $opsi_d,
            'skor_soal' => $skor_soal,
            'kunci_jawaban' => $kunci_jawaban
        ];

        $this->soal->createsoal($data);
        session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Soal Berhasil Ditambahkan</div>');
        session()->remove('id_modul');
        return redirect()->to(base_url('PageGuru'));
    }

    public function edit_soal()
    {
        $id = $this->request->getPost('id_soal');
        $bunyi_soal = $this->request->getPost('bunyi_soal');
        $opsi_a = $this->request->getPost('opsi_a');
        $opsi_b = $this->request->getPost('opsi_b');
        $opsi_c = $this->request->getPost('opsi_c');
        $opsi_d = $this->request->getPost('opsi_d');
        $skor_soal = $this->request->getPost('skor_soal');
        $kunci_jawaban = $this->request->getPost('kunci_jawaban');

        $validation = $this->validate(
            [
                'bunyi_soal' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'soal tidak boleh kosong'
                    ]
                ],
                'opsi_a' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'opsi_b' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'opsi_c' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'opsi_d' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'skor_soal' => [
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} Pengerjaan hanya boleh angka, jangan masukin selain angka'
                    ]
                ],
                'kunci_jawaban' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'bunyi_soal' => $bunyi_soal,
            'opsi_a' => $opsi_a,
            'opsi_b' => $opsi_b,
            'opsi_c' => $opsi_c,
            'opsi_d' => $opsi_d,
            'skor_soal' => $skor_soal,
            'kunci_jawaban' => $kunci_jawaban
        ];

        $this->soal->updatesoal($data, $id);
        session()->setFlashdata('success', '<div class="alert alert-primary" style="margin-top:2vh" role="alert">Soal Berhasil Di update</div>');
        session()->remove('id_modul');
        return redirect()->to(base_url('PageGuru'));
    }

    public function excel_soal()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Soal')
            ->setCellValue('C1', 'Pilihan A')
            ->setCellValue('D1', 'Pilihan B')
            ->setCellValue('E1', 'Pilihan C')
            ->setCellValue('F1', 'Pilihan D')
            ->setCellValue('G1', 'Skor Maksimal')
            ->setCellValue('H1', 'Kunci Jawaban');

        $column = 2;
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $column, 1)
            ->setCellValue('B' . $column, 'Berapakah Hasil dari (2*2) + (2/2)')
            ->setCellValue('C' . $column, 2)
            ->setCellValue('D' . $column, 4)
            ->setCellValue('E' . $column, 1)
            ->setCellValue('F' . $column, 3)
            ->setCellValue('G' . $column, 5)
            ->setCellValue('H' . $column, 'd');
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Template Upload Soal';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function add_soal_excel()
    {
        $validation = $this->validate(
            [
                'uploadsoal' => [
                    'rules' => 'uploaded[uploadsoal]|ext_in[uploadsoal,xls,xlsx]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'ext_in' => 'File Extention Harus Berupa xls atau xlsx'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $file_excel = $this->request->getFile('uploadsoal');

        $isi = $file_excel->getClientExtension();

        if ($isi == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spread_php = $render->load($file_excel);

        $data = $spread_php->getActiveSheet()->toArray();

        foreach ($data as $d => $row) {
            if ($d == 0) {
                continue;
            }

            $bunyi_soal = $row[1];
            $opsi_a = $row[2];
            $opsi_b = $row[3];
            $opsi_c = $row[4];
            $opsi_d = $row[5];
            $skor_soal = $row[6];
            $kunci_jawaban = $row[7];

            $insert = [
                'id_modul' => session()->get('id_modul'),
                'bunyi_soal' => $bunyi_soal,
                'opsi_a' => $opsi_a,
                'opsi_b' => $opsi_b,
                'opsi_c' => $opsi_c,
                'opsi_d' => $opsi_d,
                'skor_soal' => $skor_soal,
                'kunci_jawaban' => $kunci_jawaban
            ];

            $this->soal->createsoal($insert);
        }
        session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Berhasil menambahkan soal</div>');
        return redirect()->to(base_url('PageGuru'));
    }
}
