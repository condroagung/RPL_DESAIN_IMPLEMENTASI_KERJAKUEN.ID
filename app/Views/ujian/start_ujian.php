<div class="container-fluid" style="font-family: 'Nunito', sans-serif;">
    <div class="row" style="margin-left:3vh; margin-top:2vh">
        <div class="col-1">
            <p style="font-size:24px; font-weight:700; color:rgba(79, 79, 79, 1)">MODUL 6</p>
        </div>
        <div class="col-8">
            <p style="font-size:24px; font-weight:700; color:rgba(79, 79, 79, 1)">Cerita Pendek</p>
        </div>
        <div class="col-2" style="background-color:rgba(235, 87, 87, 1); border-radius: 8px; text-align:center; margin-left:6vh">
            <p id="waktu_now" style="font-size:20px; font-weight:400; color:rgba(255, 255, 255, 1); margin-top:1vh;">SISA WAKTU : <span id="waktu" style="font-weight:700"></span></p>
        </div>
    </div>

    <div class="row" style="margin-top:2vh">
        <div class="col col-md-9" style="background-color:rgba(255, 255, 255, 1); box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);border-radius: 8px; padding-bottom:20px; padding-right:15px; margin-left:5vh">
            <form id="regForm" action="<?= base_url('MulaiUjian/koreksi') ?>" method="post">
                <input type="hidden" id="time_start" name="time_start" value="<?= $time_start ?>">
                <?php
                $no = 1;
                foreach ($soal as $s) { ?>
                    <div class="tab1" style="display:none">
                        <div class="form-check" id="checkbox-container">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <p style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1); font-weight:700; font-size:18px; margin-top:1vh ">Soal.<?= $no ?>
                                    <span style="color:rgba(189, 189, 189, 1); margin-left:2vh"> - / 5</span>
                                </p>
                            </label>
                            <p style="color:rgba(79, 79, 79, 1); font-weight:400; font-size:18px; margin-top:1vh "><?= $s['bunyi_soal'] ?> ?</p>
                            <?php if ($s['gambar_soal']) { ?>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <img src="<?= base_url() . '/uploads/' . $s['gambar_soal']; ?>" alt="image can't load">
                                    </div>
                                </div>
                            <?php } ?>
                            </br>
                            <section class="tab2" style="margin-left:2vh; margin-top:-2vh">
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="a"><?= $s['opsi_a'] ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="b"><?= $s['opsi_b'] ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="c"><?= $s['opsi_c'] ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="d"><?= $s['opsi_d'] ?></br>
                            </section>
                            <?php $no++ ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="btn-nav">
                    <div class="nextprev d-flex justify-content-end" style="margin-top:2vh">
                        <button type="submit" class="btn btn-default" style="background-color:rgba(0, 145, 0, 0.7); color:white; font-family: 'Poppins', sans-serif; font-weight:700" id="confirmBtn" onclick="return confirm('Apakah Anda yakin ingin mengumpulkan tes ini?')">Submit</button>
                        <button type="button" class="btn btn-default" style="background-color:rgba(47, 128, 237, 1); color:white; font-family: 'Poppins', sans-serif; font-weight:700; margin-left:1vh" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-default" style="background-color:rgba(47, 128, 237, 1); color:white; font-family: 'Poppins', sans-serif; font-weight:700; margin-left:1vh" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col col-md-2" style="background-color:rgba(255, 255, 255, 0); box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);border-radius: 8px; margin-left:2vh">
            <div class="activenav" style="margin-top:2vh; margin-left:1.5vh">
                <?php
                $step = 1;
                foreach ($soal as $s) { ?>
                    <button type="button" class="btn btn-warning btn-default step" style="width:15%; color:white; margin:1vh; padding-right:15px; border-radius:4px;" onclick="direct(this)"><?= $step ?></button>
                <?php
                    $step++;
                } ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //var jawaban = ['a', 'b', 'c', 'd', 'd'];
    //var jawaban_string = jawaban.toString();
    //var jawaban_array = jawaban_string.split(",");
    //localStorage.setItem('jawaban', jawaban_string);
    //console.log(localStorage.getItem('jawaban'));

    if (localStorage.getItem('waktu') == null) {
        var countDownDate = document.getElementById('time_start').value;
    } else {
        var countDownDate = localStorage.getItem('waktu');
    }


    console.log(countDownDate);
    var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate - (new Date().getTime() - now);
        console.log(distance);

        hours = (distance / 3600) | 0;
        hours_temp = distance - 3600 * hours;
        minutes = (hours_temp / 60) | 0;
        seconds = (hours_temp % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        document.getElementById("waktu").innerHTML = hours + ":" +
            minutes + ":" + seconds;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("waktu_now").innerHTML = "SELESAI";
            alert('Terimakasih sudah mengikuti ujian');
            setInterval(function() {
                var button = document.getElementById('nextBtn');
                document.getElementById("regForm").submit();
                localStorage.clear();
            }, 1000)

        }
        localStorage.setItem('waktu', countDownDate);
        countDownDate--;
    }, 1000);

    var currentTab = 0;

    var cek = document.getElementsByClassName('tab1');
    for (var j = 0; j < cek.length; j++) {
        var radios = document.getElementsByName('soal' + j);
        var val = localStorage.getItem('soal' + j);
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].value == val) {
                radios[i].checked = true;
            }
        }
    }

    $('input[name="soal1"]').on('change', function() {
        localStorage.setItem('soal1', $(this).val());
    });

    $('input[name="soal2"]').on('change', function() {
        localStorage.setItem('soal2', $(this).val());
    });

    $('input[name="soal3"]').on('change', function() {
        localStorage.setItem('soal3', $(this).val());
    });

    $('input[name="soal4"]').on('change', function() {
        localStorage.setItem('soal4', $(this).val());
    });

    $('input[name="soal5"]').on('change', function() {
        localStorage.setItem('soal5', $(this).val());
    });

    $('input[name="soal6"]').on('change', function() {
        localStorage.setItem('soal6', $(this).val());
    });

    $('input[name="soal7"]').on('change', function() {
        localStorage.setItem('soal7', $(this).val());
    });

    $('input[name="soal8"]').on('change', function() {
        localStorage.setItem('soal8', $(this).val());
    });

    $('input[name="soal9"]').on('change', function() {
        localStorage.setItem('soal9', $(this).val());
    });

    $('input[name="soal10"]').on('change', function() {
        localStorage.setItem('soal10', $(this).val());
    });

    $('input[name="soal11"]').on('change', function() {
        localStorage.setItem('soal11', $(this).val());
    });

    $('input[name="soal12"]').on('change', function() {
        localStorage.setItem('soal12', $(this).val());
    });

    $('input[name="soal13"]').on('change', function() {
        localStorage.setItem('soal13', $(this).val());
    });

    $('input[name="soal14"]').on('change', function() {
        localStorage.setItem('soal14', $(this).val());
    });

    $('input[name="soal15"]').on('change', function() {
        localStorage.setItem('soal15', $(this).val());
    });

    $('input[name="soal16"]').on('change', function() {
        localStorage.setItem('soal16', $(this).val());
    });

    $('input[name="soal17"]').on('change', function() {
        localStorage.setItem('soal17', $(this).val());
    });

    $('input[name="soal18"]').on('change', function() {
        localStorage.setItem('soal18', $(this).val());
    });

    $('input[name="soal19"]').on('change', function() {
        localStorage.setItem('soal19', $(this).val());
    });

    $('input[name="soal20"]').on('change', function() {
        localStorage.setItem('soal20', $(this).val());
    });

    showTab(currentTab);

    function showTab(n) {
        var x = document.getElementsByClassName("tab1");
        var y = document.getElementsByClassName("step");
        x[n].style.display = "block";
        for (i = 0; i < y.length; i++) {
            y[i].style.backgroundColor = "";
        }

        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = "none";
        } else {
            document.getElementById("nextBtn").style.display = "inline";
        }

        for (var a = 0; a < x.length; a++) {
            var set = document.getElementsByName('soal' + a);
            for (var b = 0; b < set.length; b++) {
                if (set[b].checked) {
                    y[a - 1].style.backgroundColor = "rgba(0, 91, 0, 1)";
                }
            }
        }

        y[n].style.backgroundColor = "rgba(45, 156, 219, 1)";
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        var x = document.getElementsByClassName("tab1");
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        //if (currentTab >= x.length) {
        //document.getElementById("regForm").submit();
        //localStorage.clear();
        //return false;
        //}
        showTab(currentTab);
    }

    function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
    }

    function direct(n) {
        var i = parseInt(n.textContent);
        var x = document.getElementsByClassName("tab1");
        x[currentTab].style.display = "none";
        currentTab = i - 1;
        //if (currentTab >= x.length) {
        //document.getElementById("regForm").submit();
        //return false;
        //}
        showTab(currentTab);
    }
</script>