<div class="container-fluid" style="font-family: 'Nunito', sans-serif; margin-left:2vh; color:rgba(79, 79, 79, 1);  font-weight:700">
    <?php if (!empty(session()->getFlashdata('success'))) { ?>
        <?php echo session()->getFlashdata('success'); ?>
    <?php } ?>
    <p style="margin-top:2vh;font-family: 'Poppins', sans-serif; font-size:18px; font-weight:700; color:rgba(79, 79, 79, 1)">DAFTAR PAKET SOAL</p>

    <div class="row row-cols-1 row-cols-md-6 g-4">
        <?php foreach ($paket as $p) { ?>
            <div class="col">
                <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                    <img src="<?= base_url() . '/uploads/' . $p['cover']; ?>" class="card-img-top" alt="...">
                    <i class="fas fa-ellipsis-v" style="position:absolute; top:1vh; right:1vw; color:white"></i>
                    <div class="card-body">
                        <a href="" style="text-decoration:none; color:black">
                            <p class="card-title text-center" style="font-weight:700; font-size:20px; color:rgba(79, 79, 79, 1)"><?= $p['nama_mapel'] ?> - <?= $p['kelas'] ?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col">
            <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                <img src="<?php echo base_url('images/add_modul.png'); ?>" class="card-img-top" alt="...">
            </a>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Tambah Paket Baru</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?php echo base_url('KelolaAdmin/add_paket'); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket Soal</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= old('nama_paket'); ?>" name="nama_paket">
                            <?php if ($validation->getError('nama_paket')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nama_paket'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="mapel" class="form-label">Mata Pelajaran</label>
                            <select class="form-select" aria-label="Default select example" name="mapel">
                                <option value=''>Pilih Mapel</option>
                                <?php foreach ($mapel as $m) { ?>
                                    <option value="<?= $m['id_mapel']; ?>"><?= $m['nama_mapel'] ?></option>
                                <?php } ?>
                            </select>
                            <?php if ($validation->getError('mapel')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('mapel'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="kelas" class="form-label">Pilih Kelas</label>
                            <select class="form-select" aria-label="Default select example" name="kelas">
                                <option value=''>Pilih Kelas</option>
                                <option value="1A">1A</option>
                                <option value="2A">2A</option>
                                <option value="3A">3A</option>
                                <option value="4A">4A</option>
                                <option value="5A">5A</option>
                                <option value="6A">6A</option>
                            </select>
                            <?php if ($validation->getError('kelas')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('kelas'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="guru" class="form-label">Pilih Guru Pengampu</label>
                            <select class="form-select" aria-label="Default select example" name="guru">
                                <option value=''>Pilih Guru</option>
                                <?php foreach ($guru as $g) { ?>
                                    <option value="<?= $g['id_user']; ?>"><?= $g['nama_guru'] ?></option>
                                <?php } ?>
                            </select>
                            <?php if ($validation->getError('guru')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('guru'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Upload Cover</label>
                            <input type="file" class="form-control" name="cover">
                            <?php if ($validation->getError('cover')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('cover'); ?>
                                </div>
                            <?php } ?>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px; font-weight:700; color:rgba(79, 79, 79, 1)">DAFTAR GURU</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#upload_guru"><i class="fas fa-upload"> Upload Guru (Excel)</i></a>
        </div>
    </div>

    <div class="modal fade" id="upload_guru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel23" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Upload Data Guru</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Template upload data guru dapat didownload dibawah ini</label>
                        <a href="<?= base_url('KelolaAdmin/excel_guru') ?>" class="btn btn-primary"><i class="fas fa-file-excel"> Template_Upload_Guru.xls</i></a>
                        <label for="">Dengan Ketentuan Sebagai berikut : </label>
                        <ol style="color:red;">
                            <li>Status = 1</li>
                            <li>NIP harus angka dan Unik (tidak duplikat dengan guru lain)</li>
                            <li>Password minimal 8 karakter dan maksimal 16 karakter</li>
                        </ol>
                    </div>
                    <form class="row g-3" action="<?= base_url('KelolaAdmin/add_excel_guru') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="uploadguru" class="form-label">Upload Soal</label>
                            <input type="file" class="form-control" name="uploadguru" id="uploadguru" style="margin-top:1vh">
                            <?php if ($validation->getError('uploadguru')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('uploadguru'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:2vh">
        <div class="col-md-12" style="margin-left:-2vh">
            <table class="display" style="margin-top:2vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white; font-weight:500" data-page-length='10'>
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-family: 'IBM Plex Sans', sans-serif; font-weight:400">
                    <?php
                    $no = 1;
                    foreach ($guru as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $row['nip']; ?></td>
                            <td><?= $row['nama_guru']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['password']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit_guru<?php echo $row['id_user'] ?>"><i class="fas fa-pen"></i></a>
                                <a class="btn btn-danger" href="<?php echo base_url('KelolaAdmin/delete_guru/' . $row['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus guru ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-left:-2vh">
            <div class="d-grid gap-2" style="margin-top:2vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1)">
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="border-radius: 8px; font-weight:700"><i class="fas fa-plus" style="margin-right:1vw;"> </i>TAMBAH GURU BARU</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Tambah Guru Baru</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?php echo base_url('KelolaAdmin/add_guru'); ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= old('nama_guru'); ?>" name="nama_guru">
                            <?php if ($validation->getError('nama_guru')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nama_guru'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id=" exampleInputPassword1" value="<?= old('nip'); ?>" name="nip">
                            <?php if ($validation->getError('nip')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nip'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="validationDefault01" value="<?= old('username'); ?>" name="username">
                            <?php if ($validation->getError('username')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('username'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="validationDefault02" value="<?= old('password'); ?>" name="password">
                            <?php if ($validation->getError('password')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('password'); ?>
                                </div>
                            <?php } ?>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($guru as $row) { ?>
        <div class="modal fade" id="edit_guru<?php echo $row['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel23" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Edit Guru</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="<?php echo base_url('KelolaAdmin/update_guru'); ?>" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="id_user" id="id_user" value="<?= $row['id_user']; ?>">
                                <label for="nama_guru" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['nama_guru']; ?>" name="nama_guru">
                                <?php if ($validation->getError('nama_guru')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('nama_guru'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id=" exampleInputPassword1" value="<?= $row['nip']; ?>" name="nip" readonly>
                                <?php if ($validation->getError('nip')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('nip'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="validationDefault01" value="<?= $row['username']; ?>" name="username">
                                <?php if ($validation->getError('username')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('username'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="validationDefault02" value="<?= $row['password']; ?>" name="password" readonly>
                                <?php if ($validation->getError('password')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('password'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-12">
            <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px; font-weight:700">DAFTAR SISWA</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#upload_siswa"><i class="fas fa-upload"> Upload Siswa (Excel)</i></a>
        </div>
    </div>

    <div class="modal fade" id="upload_siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel23" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Upload Data Siswa</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Template upload data siswa dapat didownload dibawah ini</label>
                        <a href="<?= base_url('KelolaAdmin/excel_siswa') ?>" class="btn btn-primary"><i class="fas fa-file-excel"> Template_Upload_Siswa.xls</i></a>
                        <label for="">Dengan Ketentuan Sebagai berikut : </label>
                        <ol style="color:red;">
                            <li>Status = 2</li>
                            <li>NIS harus angka dan Unik (tidak duplikat dengan siswa lain)</li>
                            <li>Jenis Kelamin cukup disingkat L dan P</li>
                            <li>Setiap siswa hanya menempati 1 kelas</li>
                            <li>Kelas yang tersedia = 1A, 2A, 3A, 4A, 5A, 6A</li>
                        </ol>
                    </div>
                    <form class="row g-3" action="<?= base_url('KelolaAdmin/add_excel_siswa') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="uploadsiswa" class="form-label">Upload Soal</label>
                            <input type="file" class="form-control" name="uploadsiswa" id="uploadsiswa" style="margin-top:1vh">
                            <?php if ($validation->getError('uploadsiswa')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('uploadsiswa'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:2vh">
        <div class="col-md-12" style="margin-left:-2vh">
            <table class="display" style="margin-top:2vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white; font-weight:500" data-page-length='10'>
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class=" text-center" style="font-family: 'IBM Plex Sans', sans-serif; font-weight:400">
                    <?php
                    $no = 1;
                    foreach ($siswa as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $row['nis']; ?></td>
                            <td><?= $row['nama_siswa']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['password']; ?></td>
                            <td class="text-center"><a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit_siswa<?php echo $row['id_user'] ?>"><i class="fas fa-pen"></i></a>
                                <a class="btn btn-danger" href="<?php echo base_url('KelolaAdmin/delete_siswa/' . $row['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="d-grid gap-2" style="margin-top:2vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <button type="button" class="btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="border-radius: 8px; font-weight:700; margin-right:2vh"><i class="fas fa-plus" style="margin-right:1vw"> </i>TAMBAH SISWA BARU</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Tambah Siswa Baru</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?php echo base_url('KelolaAdmin/add_siswa'); ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_siswa">
                            <?php if ($validation->getError('nama_siswa')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nama_siswa'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option value=''>Pilih Jenis Kelamin</option>
                                <?php
                                $jenis = array('Laki-Laki', 'Perempuan');
                                foreach ($jenis as $j) {
                                ?>
                                    <option value=<?= $j ?>><?= $j ?></option>
                                <?php } ?>
                            </select>
                            <?php if ($validation->getError('jenis_kelamin')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('jenis_kelamin'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="kelas" class="form-label">Pilih Kelas</label>
                            <select class="form-select" aria-label="Default select example" name="kelas">
                                <option value=''>Pilih Kelas</option>
                                <?php
                                $kelas = array('1A', '2A', '3A', '4A', '5A', '6A');
                                foreach ($kelas as $k) {
                                ?>
                                    <option value=<?= $k ?>><?= $k ?></option>
                                <?php } ?>
                            </select>
                            <?php if ($validation->getError('kelas')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('kelas'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="validationDefault02" name="nis">
                            <?php if ($validation->getError('nis')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nis'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="username_siswa" class="form-label">Username</label>
                            <input type="text" class="form-control" id="validationDefault01" name="username_siswa">
                            <?php if ($validation->getError('username_siswa')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('username_siswa'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="password_siswa" class="form-label">Password</label>
                            <input type="password" class="form-control" id="validationDefault02" name="password_siswa">
                            <?php if ($validation->getError('password_siswa')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('password_siswa'); ?>
                                </div>
                            <?php } ?>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($siswa as $row) { ?>
        <div class="modal fade" id="edit_siswa<?php echo $row['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Edit Siswa</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="<?php echo base_url('KelolaAdmin/update_siswa'); ?>" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="id_user" id="id_user" value="<?= $row['id_user']; ?>">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $row['nama_siswa']; ?>" name="nama_siswa">
                                <?php if ($validation->getError('nama_siswa')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('nama_siswa'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                    <?php foreach ($jenis as $j) {
                                        if ($row['jenis_kelamin'] == $j) {
                                            echo "<option value='$j' selected>$j</option>";
                                        } else {
                                            echo "<option value='$j' >$j</option>";
                                        }
                                    ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kelas" class="form-label">Pilih Kelas</label>
                                <select class="form-select" aria-label="Default select example" name="kelas">
                                    <?php foreach ($kelas as $k) {
                                        if ($row['kelas'] == $k) {
                                            echo "<option value='$k' selected>$k</option>";
                                        } else {
                                            echo "<option value='$k' >$k</option>";
                                        }
                                    ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="validationDefault02" value="<?= $row['nis']; ?>" name="nis">
                                <?php if ($validation->getError('nis')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('nis'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="username_siswa" class="form-label">Username</label>
                                <input type="text" class="form-control" id="validationDefault01" value="<?= $row['username']; ?>" name="username_siswa">
                                <?php if ($validation->getError('username_siswa')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('username_siswa'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="password_siswa" class="form-label">Password</label>
                                <input type="password" class="form-control" id="validationDefault02" value="<?= $row['password']; ?>" name="password_siswa" readonly>
                                <?php if ($validation->getError('password_siswa')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('password_siswa'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('table.display').DataTable({
            fixedHeader: {
                header: true,
                footer: true
            }
        });
    });
</script>