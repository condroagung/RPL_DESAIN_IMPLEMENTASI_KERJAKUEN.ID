<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:3.5vh">BUAT MODUL BARU</p>

    <div class="row">
        <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
            <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">MODUL <?= $count_modul + 1 ?></p>
            <form style="margin-left:5px">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Judul Modul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Waktu Pengerjaan</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                    <div class="col-sm-4">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Menit</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="col col-md-2" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); margin-top:2vh; margin-left:3vh; border-radius:8px;">
            <button type="submit" class="btn btn-success" style="align-items: center; width:85%; margin-top:2vh; margin-left:2vh">SIMPAN</button>
            <button type="button" class="btn btn-primary" style="align-items: center; width:85%; margin-top:2vh; margin-left:2vh">SIMPAN DAN PUBLIKASIKAN</button>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-9" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh; margin-left:4vh; border-radius:8px;">
            <p style="margin-top:2vh; font-weight:700; font-size:18px; margin-left:5px">SOAL 1</p>
            <form style="margin-left:5px">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Soal</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" readonly>Apa yang dimaksud dengan ovipar</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan A</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" value="Bertelur" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan B</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" value="Beranak" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan C</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" value="Sesar" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Pilihan D</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" value="Berenang" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Skor Maksimal</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputPassword" value="5" readonly>
                    </div>
                    <label for="inputPassword" class="col-sm-1 col-form-label">Jawaban</label>
                    <div class="col-sm-2">
                        <select class="form-select form-select" aria-label=".form-select-sm example" style="width:60%" disabled>
                            <option value="a">Pilihan A</option>
                            <option value="b" selected>Pilihan B</option>
                            <option value="c">Pilihan C</option>
                            <option value="d">Pilihan D</option>
                        </select>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <div class="row">
        <div class="col col-md-10">
            <div class="d-grid gap-2" style="margin-top:2vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); margin-left:3vh;  width:91%">
                <a href="<?= base_url('KelolaModul/buat_soal') ?>" type="button" class="btn btn-light" style="border-radius: 8px; font-weight:700;"><i class="fas fa-plus" style="margin-right:1vw;"> </i>BUAT MODUL BARU</a>
            </div>
        </div>
    </div>
</div>