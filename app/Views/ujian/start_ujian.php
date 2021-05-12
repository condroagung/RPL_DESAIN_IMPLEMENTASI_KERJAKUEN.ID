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
                            </br>
                            <section style="margin-left:2vh; margin-top:-2vh">
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="a"><?= $s['opsi_a'] ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="b"><?= $s['opsi_b'] ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="c"><?= $s['opsi_c'] ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>" id="soal<?= $no ?>" value="d"><?= $s['opsi_d'] ?></br>
                            </section>
                            <?php $no++ ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-end">
                    <div class="nextprev" style="margin-top:2vh; margin-left:-2vh">
                        <button type="button" class="btn btn-default" style="background-color:rgba(47, 128, 237, 1); color:white; font-family: 'Poppins', sans-serif; font-weight:700" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-default" style="background-color:rgba(47, 128, 237, 1); color:white; font-family: 'Poppins', sans-serif; font-weight:700" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col col-md-2" style="background-color:rgba(255, 255, 255, 1); box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);border-radius: 8px; margin-left:2vh">
            <div class="activenav" style="margin-top:2vh; margin-left:1.5vh">
                <?php
                $step = 1;
                foreach ($soal as $s) { ?>
                    <button type="button" class="btn btn-warning btn-default step" style="width:15%; color:white; margin:1vh; padding-right:15px; border-radius:4px" onclick="direct(this)"><?= $step ?></button>
                <?php
                    $step++;
                } ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var countDownDate = document.getElementById('time_start').value;
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
                document.getElementById("regForm").submit();
                window.location.href = "<?php echo base_url('PageSiswa'); ?>";
            }, 3000)

        }
        countDownDate--;
    }, 1000);

    var currentTab = 0;

    showTab(currentTab);

    function showTab(n) {
        var x = document.getElementsByClassName("tab1");
        var y = document.getElementsByClassName("step");
        x[n].style.display = "block";
        for (i = 0; i < y.length; i++) {
            y[i].style.backgroundColor = "";
        }
        y[n].style.backgroundColor = "rgba(45, 156, 219, 1)";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        console.log(n);
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        var x = document.getElementsByClassName("tab1");
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
            document.getElementById("regForm").submit();
            return false;
        }
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
        if (currentTab >= x.length) {
            document.getElementById("regForm").submit();
            return false;
        }
        showTab(currentTab);
    }
</script>