<?php

namespace App\Controllers;

use App\Models\Siswa;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Paket;
use App\Models\Mapel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KelolaAdmin extends BaseController
{
    protected $siswa;
    protected $admin;
    protected $guru;
    protected $kelas;
    protected $paket;
    protected $mapel;

    function __construct()
    {
        $this->siswa = new Siswa();
        $this->guru = new Guru();
        $this->kelas = new Kelas();
        $this->paket = new Paket();
        $this->mapel = new Mapel();
        $this->admin = new Admin();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['guru'] = $this->guru->showguru();
        $data['siswa'] = $this->siswa->showsiswa();
        $data['kelas'] = $this->kelas->showkelas();
        $data['mapel'] = $this->mapel->showmapel();
        $data['paket'] = $this->paket->showpaket();
        $data['validation'] = \Config\Services::validation();
        $set['validation'] = \Config\Services::validation();
        $set['title'] = 'Dashboard Admin';
        echo view('header', $set);
        echo view('admin/dashboard_admin', $data);
        echo view('footer');
    }

    public function add_guru()
    {
        $nama = $this->request->getPost('nama_guru');
        $nip = $this->request->getPost('nip');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $validation = $this->validate(
            [
                'nama_guru' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules'  => 'required|is_unique[guru.nip]|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} ({value}) telah digunakan, gunakan yang lain',
                        'numeric' => '{field} hanya boleh angka, jangan masukin selain angka'
                    ]
                ],
                'username' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password' => [
                    'rules'  => 'required|min_length[8]|max_length[16]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 8 karakter',
                        'max_length' => '{field} maksimal 16 karakter'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_guru' => $nama,
            'nip' => $nip,
            'username' => $username,
            'password' => $password,
            'status' => 1
        ];
        $this->guru->createguru($data);
        session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Data Guru Berhasil Ditambahkan</div>');
        return redirect()->to(base_url('KelolaAdmin'));
    }

    /**
     * @param  $id
     * 
     * @delete guru
     * Digunakan untuk menghapus data guru tertentu,
     * jika berhasil akan menampilkan halaman admin
     */
    public function delete_guru($id)
    {
        $this->guru->deleteguru($id); // memanggil function delete guru dari model guru
        session()->setFlashdata('success', '<div class="alert alert-warning" style="margin-top:2vh" role="alert">Data Guru berhasil dihapus</div>');
        return redirect()->to(base_url('KelolaAdmin')); // jika proses berhasil, maka kembali ke page admin
    }

    public function update_guru()
    {
        $id = $this->request->getPost('id_user');
        $nama = $this->request->getPost('nama_guru');
        $nip = $this->request->getPost('nip');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $validation = $this->validate(
            [
                'nama_guru' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} hanya boleh angka, jangan masukin selain angka'
                    ]
                ],
                'username' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password' => [
                    'rules'  => 'required|min_length[8]|max_length[16]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 8 karakter',
                        'max_length' => '{field} maksimal 16 karakter'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_guru' => $nama,
            'nip' => $nip,
            'username' => $username,
            'password' => $password,
            'status' => 1
        ];

        $this->guru->updateguru($data, $id);
        session()->setFlashdata('success', '<div class="alert alert-primary" style="margin-top:2vh" role="alert">Data Guru Berhasil Di Update</div>');
        return redirect()->to(base_url('KelolaAdmin'));
    }

    public function add_siswa()
    {
        $nama = $this->request->getPost('nama_siswa');
        $nis = $this->request->getPost('nis');
        $username = $this->request->getPost('username_siswa');
        $password = $this->request->getPost('password_siswa');
        $jeniskelamin = $this->request->getPost('jenis_kelamin');
        $kelas = $this->request->getPost('kelas');

        $validation = $this->validate(
            [
                'nama_siswa' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nis' => [
                    'rules'  => 'required|is_unique[siswa.nis]|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} ({value}) telah digunakan, gunakan yang lain',
                        'numeric' => '{field} hanya boleh angka, jangan masukin selain angka'
                    ]
                ],
                'kelas' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih'
                    ]
                ],
                'username_siswa' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password_siswa' => [
                    'rules'  => 'required|min_length[8]|max_length[16]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 8 karakter',
                        'max_length' => '{field} maksimal 16 karakter'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_siswa' => $nama,
            'nis' => $nis,
            'username' => $username,
            'password' => $password,
            'status' => 2,
            'jenis_kelamin' => $jeniskelamin,
            'kelas' => $kelas
        ];

        $this->siswa->createsiswa($data);
        session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Data Siswa Berhasil Ditambahkan</div>');
        return redirect()->to(base_url('KelolaAdmin'));
    }

    public function delete_siswa($id)
    {
        $this->siswa->deletesiswa($id);
        session()->setFlashdata('success', '<div class="alert alert-warning" style="margin-top:2vh" role="alert">Data Siswa berhasil dihapus</div>');
        return redirect()->to(base_url('KelolaAdmin'));
    }

    public function update_siswa()
    {
        $id = $this->request->getPost('id_user');
        $nama = $this->request->getPost('nama_siswa');
        $nip = $this->request->getPost('nis');
        $username = $this->request->getPost('username_siswa');
        $password = $this->request->getPost('password_siswa');
        $jeniskelamin = $this->request->getPost('jenis_kelamin');
        $kelas = $this->request->getPost('kelas');

        $validation = $this->validate(
            [
                'nama_siswa' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nis' => [
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} ({value}) telah digunakan, gunakan yang lain',
                        'numeric' => '{field} hanya boleh angka, jangan masukin selain angka'
                    ]
                ],
                'username_siswa' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password_siswa' => [
                    'rules'  => 'required|min_length[8]|max_length[16]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 8 karakter',
                        'max_length' => '{field} maksimal 16 karakter'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_siswa' => $nama,
            'nis' => $nip,
            'username' => $username,
            'password' => $password,
            'status' => 2,
            'jenis_kelamin' => $jeniskelamin,
            'kelas' => $kelas
        ];

        $this->siswa->updatesiswa($data, $id);
        session()->setFlashdata('success', '<div class="alert alert-primary" style="margin-top:2vh" role="alert">Data Siswa Berhasil Di Update</div>');
        return redirect()->to(base_url('KelolaAdmin'));
    }

    public function add_paket()
    {
        $nama_paket = $this->request->getPost('nama_paket');
        $mapel = $this->request->getPost('mapel');
        $kelas = $this->request->getPost('kelas');
        $guru = $this->request->getPost('guru');
        $cover = $this->request->getFile('cover');

        $validation = $this->validate(
            [
                'nama_paket' => [
                    'rules'  => 'required|is_unique[paket.nama_paket]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} ({value}) telah digunakan, gunakan yang lain'
                    ]
                ],
                'mapel' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih'
                    ]
                ],
                'kelas' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih'
                    ]
                ],
                'guru' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih'
                    ]
                ],
                'cover' => [
                    'rules'  => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png]|max_size[cover,8192]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                        'max_size' => 'Ukuran File Maksimal 8 MB'
                    ]
                ]
            ]
        );

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $fileName = $cover->getRandomName();

        $data = [
            'id_user' => $guru,
            'id_mapel' => $mapel,
            'kelas' => $kelas,
            'nama_paket' => $nama_paket,
            'cover' => $fileName
        ];

        $this->paket->createpaket($data);
        $cover->move('uploads/', $fileName);
        session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Data Paket Berhasil Ditambahkan</div>');
        return redirect()->to(base_url('KelolaAdmin'));
    }

    public function change_pass()
    {
        $id = session()->get('id_user');
        $pass_lama = $this->request->getPost('pass_lama');
        $pass_baru = $this->request->getPost('pass_baru');
        $pass_sesuai = $this->request->getPost('pass_sesuai');

        if (session()->get('status') == 0) {
            $validation = $this->validate(
                [
                    'pass_lama' => [
                        'rules'  => 'required|is_not_unique[admin.password]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'is_not_unique' => 'Password tidak sesuai dengan database'
                        ]
                    ],
                    'pass_baru' =>  [
                        'rules'  => 'required|min_length[8]|max_length[16]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'min_length' => 'password minimal 8 karakter',
                            'max_length' => 'password maksimal 16 karakter'
                        ]
                    ],
                    'pass_sesuai' =>  [
                        'rules'  => 'required|min_length[8]|max_length[16]|matches[pass_baru]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'min_length' => 'password minimal 8 karakter',
                            'max_length' => 'password maksimal 16 karakter',
                            'matches' => 'password harus sesuai dengan password lama'
                        ]
                    ]
                ]
            );

            if (!$validation) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }

            $data = [
                'password' => $pass_baru
            ];
            $this->admin->updateadmin($data, $id);
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Password Berhasil Diganti</div>');
            return redirect()->to(base_url('KelolaAdmin'));
        } else if (session()->get('status') == 1) {
            $validation = $this->validate(
                [
                    'pass_lama' => [
                        'rules'  => 'required|is_not_unique[guru.password]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'is_not_unique' => 'Password tidak sesuai dengan database'
                        ]
                    ],
                    'pass_baru' =>  [
                        'rules'  => 'required|min_length[8]|max_length[16]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'min_length' => 'password minimal 8 karakter',
                            'max_length' => 'password maksimal 16 karakter'
                        ]
                    ],
                    'pass_sesuai' =>  [
                        'rules'  => 'required|min_length[8]|max_length[16]|matches[pass_baru]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'min_length' => 'password minimal 8 karakter',
                            'max_length' => 'password maksimal 16 karakter',
                            'matches' => 'password harus sesuai dengan password lama'
                        ]
                    ]
                ]
            );

            if (!$validation) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }

            $data = [
                'password' => $pass_baru
            ];
            $this->guru->updateguru($data, $id);
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Password Berhasil Diganti</div>');
            return redirect()->to(base_url('PageGuru'));
        } else {
            $validation = $this->validate(
                [
                    'pass_lama' => [
                        'rules'  => 'required|is_not_unique[siswa.password]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'is_not_unique' => 'Password tidak sesuai dengan database'
                        ]
                    ],
                    'pass_baru' =>  [
                        'rules'  => 'required|min_length[8]|max_length[16]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'min_length' => 'password minimal 8 karakter',
                            'max_length' => 'password maksimal 16 karakter'
                        ]
                    ],
                    'pass_sesuai' =>  [
                        'rules'  => 'required|min_length[8]|max_length[16]|matches[pass_baru]',
                        'errors' => [
                            'required' => 'field ini tidak boleh kosong',
                            'min_length' => 'password minimal 8 karakter',
                            'max_length' => 'password maksimal 16 karakter',
                            'matches' => 'password harus sesuai dengan password lama'
                        ]
                    ]
                ]
            );

            if (!$validation) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }

            $data = [
                'password' => $pass_baru
            ];
            $this->siswa->updatesiswa($data, $id);
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Password Berhasil Diganti</div>');
            return redirect()->to(base_url('PageSiswa'));
        }
    }

    public function excel_guru()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Guru')
            ->setCellValue('C1', 'NIP')
            ->setCellValue('D1', 'Username')
            ->setCellValue('E1', 'Password')
            ->setCellValue('F1', 'Status');

        $column = 2;
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $column, 1)
            ->setCellValue('B' . $column, 'Rian Fahriza Sitepu')
            ->setCellValue('C' . $column, '1301158234')
            ->setCellValue('D' . $column, 'Rasdwadad')
            ->setCellValue('E' . $column, '10230131030')
            ->setCellValue('F' . $column, 1);
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Template Upload Guru';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function add_excel_guru()
    {
        $validation = $this->validate(
            [
                'uploadguru' => [
                    'rules' => 'uploaded[uploadguru]|ext_in[uploadguru,xls,xlsx]',
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

        $file_excel = $this->request->getFile('uploadguru');

        $isi = $file_excel->getClientExtension();

        if ($isi == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spread_php = $render->load($file_excel);

        $data = $spread_php->getActiveSheet()->toArray();
        $jmldata = 0;
        $jmlerror = 0;
        $idx = 1;
        $arr = array();

        foreach ($data as $d => $row) {
            if ($d == 0) {
                continue;
            }

            $nama = $row[1];
            $nip = $row[2];
            $username = $row[3];
            $password = $row[4];
            $status = $row[5];

            $cek = $this->guru->countguru($nip);

            if ($cek != 0) {
                $jmlerror++;
                $arr[] = $idx;
            } else {
                $insert = [
                    'nama_guru' => $nama,
                    'nip' => $nip,
                    'username' => $username,
                    'password' => $password,
                    'status' => $status
                ];
                $this->guru->createguru($insert);
                $jmldata++;
            }
            $idx++;
        }

        if ($jmlerror == 0) {
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Berhasil menambahkan Data Guru sebanyak ' . $jmldata . ' data</div>');
            return redirect()->to(base_url('KelolaAdmin'));
        } else {
            $list = implode(",", $arr);
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Berhasil menambahkan Data Guru sebanyak ' . $jmldata . ' data namun terdapat duplikasi atau error data sebanyak ' . $jmlerror . ' data</div>');
            return redirect()->to(base_url('KelolaAdmin'));
        }
    }

    public function excel_siswa()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Siswa')
            ->setCellValue('C1', 'NIS')
            ->setCellValue('D1', 'Kelas')
            ->setCellValue('E1', 'Jenis Kelamin')
            ->setCellValue('F1', 'Username')
            ->setCellValue('G1', 'Password')
            ->setCellValue('H1', 'Status');

        $column = 2;
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $column, 1)
            ->setCellValue('B' . $column, 'Reihan Muhammad Aziz')
            ->setCellValue('C' . $column, '1301184043')
            ->setCellValue('D' . $column, '6A')
            ->setCellValue('E' . $column, 'L')
            ->setCellValue('F' . $column, 'reihan_xray')
            ->setCellValue('G' . $column, 'reihankun')
            ->setCellValue('H' . $column, '2');
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Template Upload Siswa';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function add_excel_siswa()
    {
        $validation = $this->validate(
            [
                'uploadsiswa' => [
                    'rules' => 'uploaded[uploadsiswa]|ext_in[uploadsiswa,xls,xlsx]',
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

        $file_excel = $this->request->getFile('uploadsiswa');

        $isi = $file_excel->getClientExtension();

        if ($isi == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spread_php = $render->load($file_excel);

        $data = $spread_php->getActiveSheet()->toArray();
        $jmldata = 0;
        $jmlerror = 0;
        $idx = 1;
        $arr = array();

        foreach ($data as $d => $row) {
            if ($d == 0) {
                continue;
            }

            $nama = $row[1];
            $nis = $row[2];
            $kelas = $row[3];
            if ($row[4] == 'L') {
                $jeniskelamin = "Laki-Laki";
            } else {
                $jeniskelamin = "Perempuan";
            }
            $username = $row[5];
            $password = $row[6];
            $status = $row[7];

            $cek = $this->siswa->countsiswa($nis);
            $cek1 = $this->siswa->getdatabynama($nama);

            if ($cek != 0) {
                $jmlerror++;
                $arr[] = $idx;
            } else {
                if ($cek1 == NULL) {
                    $insert = [
                        'nama_siswa' => $nama,
                        'nis' => $nis,
                        'kelas' => $kelas,
                        'jenis_kelamin' => $jeniskelamin,
                        'username' => $username,
                        'password' => $password,
                        'status' => $status
                    ];
                    $this->siswa->createsiswa($insert);
                    $jmldata++;
                } else {
                    if (($cek1[0]['nama_siswa'] == $nama && $cek1[0]['kelas'] == $kelas) || ($cek1[0]['nama_siswa'] == $nama && $cek1[0]['kelas'] != $kelas)) {
                        $jmlerror++;
                        $arr[] = $idx;
                    } else {
                        $insert = [
                            'nama_siswa' => $nama,
                            'nis' => $nis,
                            'kelas' => $kelas,
                            'jenis_kelamin' => $jeniskelamin,
                            'username' => $username,
                            'password' => $password,
                            'status' => $status
                        ];
                        $this->siswa->createsiswa($insert);
                        $jmldata++;
                    }
                }
            }
            $idx++;
        }

        if ($jmlerror == 0) {
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Berhasil menambahkan Data Siswa sebanyak ' . $jmldata . ' data</div>');
            return redirect()->to(base_url('KelolaAdmin'));
        } else {
            $list = implode(",", $arr);
            session()->setFlashdata('success', '<div class="alert alert-success" style="margin-top:2vh" role="alert">Berhasil menambahkan Data Siswa sebanyak ' . $jmldata . ' data namun terdapat duplikasi atau error data sebanyak ' . $jmlerror . ' data</div>');
            return redirect()->to(base_url('KelolaAdmin'));
        }
    }
}
