<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:3.5vh">BUAT SOAL BARU</p>
    <div class="row">
        <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
            <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">SOAL <?= $count_soal + 1 ?></p>
            <form style="margin-left:5px" action="<?= base_url('KelolaModul/create_soal') ?>" method="post">
                <div class=" mb-3 row">
                    <label for="bunyi_soal" class="col-sm-2 col-form-label">Soal</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="bunyi_soal"></textarea>
                        <?php if ($validation->getError('bunyi_soal')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('bunyi_soal'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan A</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_a">
                        <?php if ($validation->getError('opsi_a')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('opsi_a'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan B</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_b">
                        <?php if ($validation->getError('opsi_b')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('opsi_b'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan C</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_c">
                        <?php if ($validation->getError('opsi_c')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('opsi_c'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan D</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="opsi_d">
                        <?php if ($validation->getError('opsi_d')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('opsi_d'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Skor Maksimal</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="inputPassword" name="skor_soal">
                        <?php if ($validation->getError('skor_soal')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('skor_soal'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <label for="kunci_jawaban" class="col-sm-1 col-form-label">Jawaban</label>
                    <div class="col-sm-2">
                        <select class="form-select form-select" aria-label=".form-select-sm example" style="width:60%" name="kunci_jawaban">
                            <option value="" selected>Pilih Jawaban</option>
                            <option value="a">Pilihan A</option>
                            <option value="b">Pilihan B</option>
                            <option value="c">Pilihan C</option>
                            <option value="d">Pilihan D</option>
                        </select>
                        <?php if ($validation->getError('kunci_jawaban')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('kunci_jawaban'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="d-flex justify-content-end">
                        <div class="button_soal">
                            <button type="reset" class="btn btn-danger" style="font-family: 'Poppins', sans-serif; font-weight:700">BATAL</button>
                            <button type="submit" class="btn btn-success" style="font-family: 'Poppins', sans-serif; font-weight:700">SIMPAN</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>