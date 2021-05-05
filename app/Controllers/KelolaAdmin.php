<?php

namespace App\Controllers;

use App\Models\Siswa;
use App\Models\Guru;

class KelolaAdmin extends BaseController
{
    protected $siswa;
    protected $guru;

    function __construct()
    {
        $this->siswa = new Siswa();
        $this->guru = new Guru();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('Home'));
        }
        $data['guru'] = $this->guru->showguru();
        $data['siswa'] = $this->siswa->showsiswa();
        $data['validation'] = \Config\Services::validation();
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
        return redirect()->to(base_url('KelolaAdmin'));
    }

    public function delete_guru($id)
    {
        $this->guru->deleteguru($id);
        return redirect()->to(base_url('KelolaAdmin'));
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

        return redirect()->to(base_url('KelolaAdmin'));
    }

    public function delete_siswa($id)
    {
        $this->siswa->deletesiswa($id);
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

        return redirect()->to(base_url('KelolaAdmin'));
    }
}
