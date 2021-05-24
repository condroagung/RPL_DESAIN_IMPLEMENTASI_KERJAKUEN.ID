<div class="container" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <div class="row">
        <div class="col col-md">
            <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:5px"><?= strtoupper(session()->get('nama')); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-5" style="background-color:#ffffff; padding-bottom:4vh; padding-top:6vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
            <div class="d-flex justify-content-center">
                <img class="rounded-circle" src="<?php if (session()->get('jenis_kelamin') == "Laki-Laki") {
                                                        echo base_url('images/student_boy.png');
                                                    } else {
                                                        echo base_url('images/student_girl.png');
                                                    } ?>" alt="" style="height:13vh; widht:13vw;">
            </div>
            <form>
                <?php foreach ($siswa as $s) { ?>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1); font-weight:600">Nama Lengkap</label>
                        </div>
                        <div class="col-md">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $s['nama_siswa'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1); font-weight:600">NIS</label>
                        </div>
                        <div class="col-md">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp " value="<?= $s['nis'] ?>" readonly>
                        </div>
                    </div>
                    <div class=" row mt-3">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1); font-weight:600">Kelas</label>
                        </div>
                        <div class="col-md">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $s['kelas'] ?>" readonly>
                        </div>
                    </div>
                    <div class=" row mt-3">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1); font-weight:600">Jenis Kelamin</label>
                        </div>
                        <div class="col-md">
                            <?php if ($s['jenis_kelamin'] == 'Laki-Laki') { ?>
                                <i class="fas fa-male" style="font-size:50px; color:blue; margin-left:2vh"></i>
                                <i class=" fas fa-female" style="font-size:50px; margin-left:3vh;"></i>
                            <?php } else { ?>
                                <i class="fas fa-male" style="font-size:50px; margin-left:2vh"></i>
                                <i class="fas fa-female" style="font-size:50px; margin-left:3vh; color:blue"></i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label" style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1); font-weight:600">Status</label>
                        </div>
                        <div class="col-md">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Murid" readonly>
                        </div>
                    </div>
            </form>
        <?php } ?>
        </div>
        <div class="col col-md-6" style="background-color:#ffffff; margin-left:4vh; padding:20px; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="btn nav-link tablink" aria-current="page" onclick="openPage('Home', this, 'red')" id="defaultOpen">About Me</a>
                </li>
                <li class="nav-item" style="margin-left:1vh">
                    <a class="btn nav-link tablink" onclick="openPage('Contact', this, 'blue')">Mata Pelajaran</a>
                </li>
            </ul>

            <div id="Home" class="tabcontent" style="margin-left:1vh; margin-top:3vh">
                <p>Saya adalah seorang murid dari SD 6 BuahBatu.</p>
            </div>

            <div id="Contact" class="tabcontent" style="margin-left:1vh; margin-top:3vh">
                <ul>
                    <?php
                    $no = 0;
                    foreach ($paket as $p) { ?>
                        <li style="list-style-type: none; font-family: 'Poppins', sans-serif;"><?= $p['nama_mapel'] ?> / <span style="font-style:italic"><?= $p['nama_guru'] ?> - <?= session()->get('kelas') ?></span></li>
                        <?php
                        if (count($count_modul) == 0) { ?>
                            <div class="progress-circle progress-<?= 0; ?>" style="margin-left:10vh"><span><?= 0; ?></span></div>
                        <?php } else {
                            $modul_done = 0;
                            foreach ($sum_hasil as $s) {
                                if ($s['id_paket'] == $p['id_paket']) {
                                    $modul_done++;
                                }
                            }
                            $avg = number_format($modul_done / $count_modul[$no]['id_modul'], 2);
                        ?>
                            <div class="progress-circle progress-<?= $avg * 100; ?>" style="margin-left:10vh"><span><?= $avg * 100; ?></span></div>
                        <?php }
                        $no++;
                        ?>
                    <?php
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.getElementById("defaultOpen").click();

    function openPage(pageName, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        console.log(tabcontent.length);
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Remove the background color of all tablinks/buttons
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.borderBottom = "";
        }

        // Show the specific tab content
        document.getElementById(pageName).style.display = "block";

        // Add the specific color to the button used to open the tab content
        elmnt.style.borderBottom = "thin solid " + color;
    }
</script>