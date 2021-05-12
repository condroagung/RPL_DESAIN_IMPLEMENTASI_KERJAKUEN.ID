<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:3.5vh">BUAT MODUL BARU</p>
    <div class="row">
        <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
            <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">MODUL <?= $count_modul + 1 ?></p>
            <form class="row g-3" style="margin-left:5px" action="<?php echo base_url('KelolaModul/edit_data_modul'); ?>" method="post">
                <div class="mb-3 row">
                    <input type="hidden" class="form-control" id="id_modul" name="id_modul" value="<?= $edit_modul['id_modul'] ?>">
                    <label for="judul_modul" class="col-sm-2 col-form-label">Judul Modul</label>
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
                    <label for="rata_waktu" class="col-sm-2 col-form-label">Waktu Pengerjaan</label>
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
    <?php
    $no = 1;
    foreach ($soal as $s) { ?>
        <div class="row">
            <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
                <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">SOAL <?= $no++ ?></p>
                <div class=" mb-3 row">
                    <label for="bunyi_soal" class="col-sm-2 col-form-label">Soal</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="bunyi_soal" readonly><?= $s['bunyi_soal'] ?></textarea>
                    </div>
                </div>
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
</div>