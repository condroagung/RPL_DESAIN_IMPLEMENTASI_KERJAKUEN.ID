<?php

namespace App\Controllers;

use App\Models\Siswa;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Paket;
use App\Models\Mapel;

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
}
