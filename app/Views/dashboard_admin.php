<div class="container-fluid" style="font-family: 'Nunito', sans-serif;">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <p style="font-size: 24px;">Selamat Datang <span style="font-weight:700">ADMIN!</span> </p>

    <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px">DAFTAR PAKET SOAL</p>

    <div class="row row-cols-1 row-cols-md-6 g-4" style="margin-top:2vh;">
        <div class="col">
            <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <img src="<?php echo base_url('images/indo.png'); ?>" class="card-img-top" alt="...">
                <i class="fas fa-ellipsis-v" style="position:absolute; top:1vh; right:1vw; color:white"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">BAHASA INDONESIA - 5A</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <img src="<?php echo base_url('images/mat.png'); ?>" class="card-img-top" alt="...">
                <i class="fas fa-ellipsis-v" style="position:absolute; top:1vh; right:1vw; color:white"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">MATEMATIKA - 5A</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <img src="<?php echo base_url('images/ipa.png'); ?>" class="card-img-top" alt="...">
                <i class="fas fa-ellipsis-v" style="position:absolute; top:1vh; right:1vw; color:white"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">IPA - 5A</h5>
                </div>
            </div>
        </div>
    </div>

    <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px">DAFTAR GURU</p>

    <table class="display" id="" style="margin-top:2vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); " data-page-length='10'>
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
        <tbody class="text-center" style="font-family: 'IBM Plex Sans', sans-serif;">
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
                    <td class="text-center"><a class="btn btn-info" data-toggle="modal" data-target="#edit_guru<?php echo $row['id_user'] ?>"><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger" href="<?php echo base_url('KelolaAdmin/delete_guru/' . $row['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus guru ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <div class="d-grid gap-2" style="margin-top:2vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="border-radius: 8px"><i class="fas fa-plus" style="margin-right:1vw"> </i>TAMBAH GURU BARU</button>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Guru Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?php echo base_url('KelolaAdmin/add_guru'); ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_guru">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="nip">
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault01" class="form-label">Username</label>
                            <input type="text" class="form-control" id="validationDefault01" value="user" name="username" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Password</label>
                            <input type="password" class="form-control" id="validationDefault02" value="ajg" name="password" required>
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

    <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px">DAFTAR SISWA</p>

    <table class="display" id="" style="margin-top:2vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
        <thead class="text-center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class=" text-center" style="font-family: 'IBM Plex Sans', sans-serif;">
            <tr>
                <?php
                $no = 1;
                foreach ($siswa as $row) {
                ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $row['nis']; ?></td>
                <td><?= $row['nama_siswa']; ?></td>
                <td><?= $row['kelas']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['password']; ?></td>
                <td class="text-center"><a class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                    <a class="btn btn-danger" href="<?php echo base_url('KelolaAdmin/delete_siswa/' . $row['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        <?php
                }
        ?>
        </tr>
        </tbody>
    </table>

    <div class="d-grid gap-2" style="margin-top:2vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
        <button type=" button" class="btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="border-radius: 8px"><i class="fas fa-plus" style="margin-right:1vw"> </i>TAMBAH SISWA BARU</button>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="<?php echo base_url('KelolaAdmin/add_siswa'); ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_siswa" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault01" class="form-label">Pilih Kelas</label>
                            <select class="form-select" aria-label="Default select example" name="kelas" required>
                                <option value="6A">6 A</option>
                                <option value="6B">6 B</option>
                                <option value="6C">6 C</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="validationDefault02" name="nis" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault01" class="form-label">Username</label>
                            <input type="text" class="form-control" id="validationDefault01" name="username_siswa" value="user" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Password</label>
                            <input type="password" class="form-control" id="validationDefault02" name="password_siswa" value="ajg" required>
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
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>