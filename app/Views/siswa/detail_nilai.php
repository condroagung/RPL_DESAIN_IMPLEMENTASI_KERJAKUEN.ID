<div class="container" style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1)">
    <div class="row" style="margin-top:2vh;font-weight:700">
        <div class="col-md-2">
            <?php foreach ($ujian as $u) { ?>
                <p>Mulai : </p>
                <p>Waktu Pengerjaan : </p>
                <p>Berakhir : </p>
                <p>Nilai : </p>
        </div>
        <div class="col-md-3">
            <p style="font-weight:500">
                <?php
                $evdate = DateTime::createFromFormat('d/m/Y H:i:s', $u['waktu_mulai']);
                echo ($evdate->format("j-F-Y, H:i:s a")) ?>
            </p>
            <p style="font-weight:500">
                <?php
                $start = DateTime::createFromFormat('d/m/Y H:i:s', $u['waktu_mulai']);
                $end = DateTime::createFromFormat('d/m/Y H:i:s', $u['waktu_berakhir']);
                $diff  = date_diff($start, $end); ?>
                <?= $diff->h . ' hours ' . $diff->i . ' minutes ' . $diff->s . ' seconds' ?></span>
            </p>
            <p style="font-weight:500">
                <?php
                $evdate = DateTime::createFromFormat('d/m/Y H:i:s', $u['waktu_berakhir']);
                echo ($evdate->format("j-F-Y, H:i:s a")) ?>
            </p>
            <p style="font-weight:500">
                <?= $u['skor_akhir'] ?> / 100
            </p>
        </div>
    <?php } ?>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <section style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white; border-radius:8px">
        <?php
        $no = 1;
        $idx = 0;
        foreach ($soal as $s) { ?>
            <div class="row" style="margin-top:2vh;font-weight:700;">
                <div class="col-md-2" style="margin-left:2vh; margin-top:2vh">
                    <p style="font-weight:500">Soal . <?= $no++; ?></p>
                    <p style="font-style:italic">
                        <?php
                        if ($jawaban[$idx]['status_jawaban'] == 'benar') {
                            echo "benar";
                        } else {
                            echo "salah";
                        }
                        ?></p>
                </div>
                <div class="col-md-7" style="margin-left:2vh;margin-top:2vh">
                    <p style="font-weight:500"><?= $s['bunyi_soal'] ?> ...</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault<?= $idx ?>" id="flexRadioDefault1" value="a" <?php if ($jawaban[$idx]['jawaban_soal'] == 'a') {
                                                                                                                                                echo ' checked ';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            a . <?= $s['opsi_a'] ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault<?= $idx ?>" id="flexRadioDefault2" value="b" <?php if ($jawaban[$idx]['jawaban_soal'] == 'b') {
                                                                                                                                                echo ' checked ';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            b . <?= $s['opsi_b'] ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault<?= $idx ?>" id="flexRadioDefault1" value="c" <?php if ($jawaban[$idx]['jawaban_soal'] == 'c') {
                                                                                                                                                echo ' checked ';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            c . <?= $s['opsi_c'] ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault<?= $idx ?>" id="flexRadioDefault1" value="d" <?php if ($jawaban[$idx]['jawaban_soal'] == 'd') {
                                                                                                                                                echo ' checked ';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            d . <?= $s['opsi_d'] ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <?php if ($jawaban[$idx]['status_jawaban'] == 'benar') { ?>
                            <div class="alert alert-success d-flex align-items-center" role="alert" style="margin-left:-3vh; width:85%; margin-top:2vh">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                            <?php } else { ?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert" style="margin-left:-3vh; width:85%; margin-top:2vh">
                                    <svg class=" bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                    <?php } ?>
                                    <div>
                                        Jawaban yang benar :
                                        <?php
                                        if ($s['kunci_jawaban'] == 'a') {
                                            echo $s['kunci_jawaban'] . '. ' .  $s['opsi_a'];
                                        } else if ($s['kunci_jawaban'] == 'b') {
                                            echo $s['kunci_jawaban'] . '. ' .  $s['opsi_b'];
                                        } else if ($s['kunci_jawaban'] == 'c') {
                                            echo $s['kunci_jawaban'] . '. ' .  $s['opsi_c'];
                                        } else {
                                            echo $s['kunci_jawaban'] . '. ' .  $s['opsi_d'];
                                        }
                                        ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php
                $idx++;
            } ?>
    </section>
</div>