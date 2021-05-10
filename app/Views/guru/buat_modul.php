<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:3.5vh">BUAT MODUL BARU</p>
    <div class="row">
        <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
            <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">MODUL <?= $count_modul + 1 ?></p>
            <form class="row g-3" style="margin-left:5px" action="<?php echo base_url('KelolaModul/create_modul'); ?>" method="post">
                <div class="mb-3 row">
                    <input type="hidden" class="form-control" id="modul_ke" name="modul_ke" value="<?= $count_modul + 1 ?>">
                    <label for="judul_modul" class="col-sm-2 col-form-label">Judul Modul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul_modul" name="judul_modul">
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
                        <input type="text" class="form-control" id="rata_waktu" name="rata_waktu">
                    </div>
                    <div class="col-sm-4">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Menit</label>
                    </div>
                    <?php if ($validation->getError('rata_waktu')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('rata_waktu'); ?>
                        </div>
                    <?php } ?>
                </div>
        </div>
        <div class="col col-md-2" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); margin-top:2vh; margin-left:3vh; border-radius:8px;">
            <button type="submit" class="btn btn-success" style="align-items: center; width:85%; margin-top:2vh;font-family: 'Poppins', sans-serif; font-weight:700; margin-left:2vh">SIMPAN</button>
            <button type="reset" class="btn btn-primary" style="align-items: center; width:85%; margin-top:2vh;font-family: 'Poppins', sans-serif; font-weight:700; margin-left:2vh">SIMPAN DAN PUBLIKASIKAN</button>
        </div>
        </form>
    </div>
</div>