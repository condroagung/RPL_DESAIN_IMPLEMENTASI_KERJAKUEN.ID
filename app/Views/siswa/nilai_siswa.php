<div class="container" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <div class="row">
        <div class="col col-md">
            <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:5px"><?= strtoupper('List Mata Pelajaran'); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col col-md">
            <div class="judul" style="background-color:rgba(255, 35, 0, 1); color:whitesmoke; padding-top:1vh; padding-bottom:1vh">
                <p style="margin-left:4vh; margin-bottom:1vh"> Mata Pelajaran yang diambil</p>
            </div>
            <div class="accordion accordion-flush" id="accordionExample" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <p style="font-weight:700; margin-left:2vh">BAHASA INDONESIA - <?= session()->get('kelas') ?></p>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol>
                                <?php foreach ($modul as $m) {
                                    if ($m['nama_mapel'] == 'Bahasa Indonesia') { ?>
                                        <li><a href="<?= base_url('PageSiswa/hasil/' . $m['id_modul']); ?>"><?= $m['judul_modul'] ?></a></li>
                                <?php }
                                } ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <p style="font-weight:700; margin-left:2vh">MATEMATIKA - <?= session()->get('kelas') ?></p>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol>
                                <?php foreach ($modul as $m) {
                                    if ($m['nama_mapel'] == 'Matematika') { ?>
                                        <li><a href="<?= base_url('PageSiswa/hasil/' . $m['id_modul']); ?>"><?= $m['judul_modul'] ?></a></li>
                                <?php }
                                } ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <p style="font-weight:700; margin-left:2vh">IPA - <?= session()->get('kelas') ?></p>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol>
                                <?php foreach ($modul as $m) {
                                    if ($m['nama_mapel'] == 'Ipa') { ?>
                                        <li><a href="<?= base_url('PageSiswa/hasil/' . $m['id_modul']); ?>"><?= $m['judul_modul'] ?></a></li>
                                <?php }
                                } ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>