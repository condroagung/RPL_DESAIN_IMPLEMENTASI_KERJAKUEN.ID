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
        $data['guru'] = $this->guru->showguru();
        $data['siswa'] = $this->siswa->showsiswa();
        echo view('header_admin');
        echo view('dashboard_admin', $data);
        echo view('footer_admin');
    }

    public function add_guru()
    {
        $nama = $this->request->getPost('nama_guru');
        $nip = $this->request->getPost('nip');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

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

    public function update_guru($id)
    {

        $nama = $this->request->getPost('nama_guru');
        $nip = $this->request->getPost('nip');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

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
        $nip = $this->request->getPost('nis');
        $username = $this->request->getPost('username_siswa');
        $password = $this->request->getPost('password_siswa');
        $jeniskelamin = $this->request->getPost('jenis_kelamin');
        $kelas = $this->request->getPost('kelas');

        $data = [
            'nama_siswa' => $nama,
            'nis' => $nip,
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

    public function update_siswa($id)
    {

        $nama = $this->request->getPost('nama_siswa');
        $nip = $this->request->getPost('nis');
        $username = $this->request->getPost('username_siswa');
        $password = $this->request->getPost('password_siswa');
        $jeniskelamin = $this->request->getPost('jenis_kelamin');
        $kelas = $this->request->getPost('kelas');

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
