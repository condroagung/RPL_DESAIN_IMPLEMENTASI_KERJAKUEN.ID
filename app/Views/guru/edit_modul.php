<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:3.5vh">EDIT MODUL</p>
    <div class="row">
        <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
            <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">MODUL <?= session()->get('no_modul') ?></p>
            <form class="row g-3" style="margin-left:5px" action="<?php echo base_url('KelolaModul/edit_data_modul'); ?>" method="post">
                <div class="mb-3 row">
                    <input type="hidden" class="form-control" id="id_modul" name="id_modul" value="<?= $edit_modul['id_modul'] ?>">
                    <label for="judul_modul" class="col-sm-2 col-form-label" style="margin-left:-1vh;">Judul Modul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul_modul" name="judul_modul" value="<?= $edit_modul['judul_modul'] ?>">
                    </div>
                    <?php if ($validation->getError('judul_modul')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('judul_modul'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="mb-3 row">
                    <label for="rata_waktu" class="col-sm-2 col-form-label" style="margin-left:-1vh;">Waktu Pengerjaan</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="rata_waktu" name="rata_waktu" value="<?= $edit_modul['rata_waktu'] ?>">
                    </div>
                    <div class=" col-sm-4">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Menit</label>
                    </div>
                    <?php if ($validation->getError('rata_waktu')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('rata_waktu'); ?>
                        </div>
                    <?php } ?>
                </div>
        </div>
        <div class="col col-md-2" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); margin-top:2vh; margin-left:3vh; border-radius:8px; padding-bottom:2vh">
            <button type="submit" name="editsubmit1" value="sub1" class="btn btn-success" style="align-items: center; width:85%; margin-top:2vh;font-family: 'Poppins', sans-serif; font-weight:700; margin-left:2vh">SIMPAN</button>
            <button type="submit" name="editsubmit2" value="sub2" class="btn btn-primary" style="align-items: center; width:85%; margin-top:2vh;font-family: 'Poppins', sans-serif; font-weight:700; margin-left:2vh">SIMPAN DAN PUBLIKASIKAN</button>
            <a href="<?php echo base_url('KelolaModul/delete_modul/' . $edit_modul['id_modul']) ?>" class="btn btn-danger" style="align-items: center; width:85%; margin-top:2vh;font-family: 'Poppins', sans-serif; font-weight:700; margin-left:2vh" onclick="return confirm('Apakah Anda yakin ingin menghapus modul ini?')">BUANG</a>
        </div>
        </form>
    </div>

    <div class="row" style="margin-top:2vh;margin-left:4vh">
        <div class="col-md-3">
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#upload_soal"><i class="fas fa-upload"> Upload Soal (Excel)</i></a>
        </div>
    </div>
    <div class="modal fade" id="upload_soal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel23" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Edit Soal</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Template upload soal dapat didownload dibawah ini</label>
                        <a href="<?= base_url('KelolaModul/excel_soal') ?>" class="btn btn-primary"><i class="fas fa-file-excel"> Template_Upload_Soal.xls</i></a>
                        <label for="">Dengan Ketentuan Sebagai berikut : </label>
                        <ol style="color:red;">
                            <li>Skor = 5</li>
                            <li>Waktu Pengerjaan dalam menit</li>
                            <li>Jumlah maksimum soal adalah 20</li>
                            <li>Tidak dapat upload gambar</li>
                        </ol>
                    </div>
                    <form class="row g-3" action="<?= base_url('kelolamodul/add_soal_excel') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="uploadsoal" class="form-label">Upload Soal</label>
                            <input type="file" class="form-control" name="uploadsoal" id="uploadsoal" style="margin-top:1vh">
                            <?php if ($validation->getError('uploadsoal')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('uploadsoal'); ?>
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
    <?php
    $no = 1;
    foreach ($soal as $s) { ?>
        <div class="row">
            <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
                <div class="mb-3 row">
                    <div class="col-md-11">
                        <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">SOAL <?= $no++ ?></p>
                    </div>
                    <div class="col-md">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v" style="margin-left:8vh; margin-top:2vh;color:black; font-size:18px; border-radius:4px; font-weight:normal"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_soal<?php echo $s['id_soal'] ?>">Update Soal</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo base_url('KelolaModul/delete_soal/' . $s['id_soal']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus modul ini?')">Delete Soal</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" mb-3 row">
                    <label for="bunyi_soal" class="col-sm-2 col-form-label">Soal</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="bunyi_soal" readonly><?= $s['bunyi_soal'] ?></textarea>
                    </div>
                </div>
                <?php if ($s['gambar_soal']) { ?>
                    <div class="mb-3 row">
                        <label for="bunyi_soal" class="col-sm-2 col-form-label">Gambar Soal</label>
                        <div class="col-sm-10">
                            <img src="<?= base_url() . '/uploads/' . $s['gambar_soal']; ?>" alt="image can't load">
                        </div>
                    </div>
                <?php } ?>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan A</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_a" value="<?= $s['opsi_a'] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan B</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_b" value="<?= $s['opsi_b'] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan C</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_c" value="<?= $s['opsi_c'] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan D</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_d" value="<?= $s['opsi_d'] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Skor Maksimal</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="inputPassword" name="skor_soal" value="<?= $s['skor_soal'] ?>" readonly>
                    </div>
                    <label for="kunci_jawaban" class="col-sm-1 col-form-label">Jawaban</label>
                    <div class="col-sm-2">
                        <select class="form-select form-select" aria-label=".form-select-sm example" style="width:60%" name="kunci_jawaban" disabled>
                            <option value="">Pilih Jawaban</option>
                            <?php
                            $opsi = array('a', 'b', 'c', 'd');
                            foreach ($opsi as $o) {
                                if ($s['kunci_jawaban'] == $o) {
                                    echo "<option value=$o selected>Pilihan " . strtoupper($o) . "</option>";
                                } else {
                                    echo "<option value=$o >Pilihan " . strtoupper($o) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-9" style="margin-left:3vh">
            <div class="d-grid gap-2" style="margin-top:2vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1)">
                <a href="<?= base_url('KelolaModul/buat_soal/' . $edit_modul['id_modul']); ?>" type="button" class="btn btn-light" style="border-radius: 8px; font-weight:700"><i class="fas fa-plus" style="margin-right:1vw;"> </i>BUAT SOAL BARU</a>
            </div>
        </div>
    </div>
    <?php foreach ($soal as $s) { ?>
        <div class="modal fade" id="edit_soal<?php echo $s['id_soal']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel23" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">Edit Soal</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="<?php echo base_url('KelolaModul/edit_soal'); ?>" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="id_soal" id="id_user" value="<?= $s['id_soal']; ?>">
                                <label for="bunyi_soal" class="form-label">Soal</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $s['bunyi_soal']; ?>" name="bunyi_soal">
                                <?php if ($validation->getError('bunyi_soal')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('bunyi_soal'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="opsi_a" class="form-label">Pilihan A</label>
                                <input type="text" class="form-control" id=" exampleInputPassword1" value="<?= $s['opsi_a']; ?>" name="opsi_a">
                                <?php if ($validation->getError('opsi_a')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('opsi_a'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="opsi_b" class="form-label">Pilihan B</label>
                                <input type="text" class="form-control" id=" exampleInputPassword1" value="<?= $s['opsi_b']; ?>" name="opsi_b">
                                <?php if ($validation->getError('opsi_b')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('opsi_b'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="opsi_c" class="form-label">Pilihan C</label>
                                <input type="text" class="form-control" id=" exampleInputPassword1" value="<?= $s['opsi_c']; ?>" name="opsi_c">
                                <?php if ($validation->getError('opsi_c')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('opsi_c'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="opsi_d" class="form-label">Pilihan D</label>
                                <input type="text" class="form-control" id=" exampleInputPassword1" value="<?= $s['opsi_d']; ?>" name="opsi_d">
                                <?php if ($validation->getError('opsi_d')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('opsi_d'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="skor_soal" class="form-label">Skor Maksimal</label>
                                <input type="text" class="form-control" id=" exampleInputPassword1" value="<?= $s['skor_soal']; ?>" name="skor_soal" readonly>
                                <?php if ($validation->getError('skor_soal')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('skor_soal'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label for="kunci_jawaban" class="form-label">Jawaban</label>
                                <select class="form-select form-select" aria-label=".form-select-sm example" style="width:60%" name="kunci_jawaban">
                                    <?php
                                    foreach ($opsi as $o) {
                                        if ($s['kunci_jawaban'] == $o) {
                                            echo "<option value=$o selected>Pilihan " . strtoupper($o) . "</option>";
                                        } else {
                                            echo "<option value=$o >Pilihan " . strtoupper($o) . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <?php if ($validation->getError('kunci_jawaban')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('kunci_jawaban'); ?>
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