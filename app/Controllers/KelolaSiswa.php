<?php

namespace App\Controllers;

use App\Models\Siswa;

class KelolaSiswa extends BaseController
{
    protected $siswa;

    function __construct()
    {
        $this->siswa = new Siswa();
    }

    public function index()
    {
        $data['siswa'] = $this->siswa->findAll();
        echo view('header_admin');
        echo view('kelola_siswa', $data);
        echo view('footer_admin');
    }
}
