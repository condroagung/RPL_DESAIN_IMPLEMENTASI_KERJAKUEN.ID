<div class="container-fluid" style="font-family: 'Nunito', sans-serif;">
    <div class="row" style="margin-left:1vh; margin-top:2vh">
        <div class="col-1">
            <p style="font-size:24px; font-weight:700; color:rgba(79, 79, 79, 1)">MODUL 6</p>
        </div>
        <div class="col-8">
            <p style="font-size:24px; font-weight:700; color:rgba(79, 79, 79, 1)">Cerita Pendek</p>
        </div>
        <div class="col-2" style="background-color:rgba(235, 87, 87, 1); border-radius: 8px; text-align:center; margin-left:-6vh">
            <p style="font-size:20px; font-weight:400; color:rgba(255, 255, 255, 1); margin-top:1vh;">SISA WAKTU : <span style="font-weight:700">44.35</span></p>
        </div>
    </div>

    <div class="row" style="margin-top:2vh">
        <div class="col-7" style="background-color:rgba(255, 255, 255, 1); box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);border-radius: 8px; padding-bottom:15px; padding-right:15px; margin-left:4vh">
            <form id=" regForm" action="">
                <?php $soal = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
                $no = 1;
                foreach ($soal as $s) { ?>
                    <div class="tab1" style="display:none">
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <p style="font-family: 'Poppins', sans-serif; color:rgba(79, 79, 79, 1); font-weight:700; font-size:18px; margin-top:1vh ">Soal.<?= $s ?>
                                    <span style="color:rgba(189, 189, 189, 1); margin-left:2vh"> - / 5</span>
                                </p>
                            </label>
                            <p style="color:rgba(79, 79, 79, 1); font-weight:400; font-size:18px; margin-top:1vh ">Apa yang dimaksud dengan alpha</p>
                            </br>
                            <section style="margin-left:2vh; margin-top:-2vh">
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>">a<?= $no ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>">b<?= $no ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>">c<?= $no ?></br>
                                <input class="form-check-input" type="radio" name="soal<?= $no ?>">d<?= $no ?></br>
                            </section>
                            <?php $no++ ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-end">
                    <div class="tw" style="margin-top:2vh; margin-left:-2vh">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
        <div class="col-3" style="background-color:rgba(255, 255, 255, 1); box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);border-radius: 8px;">
            <div style="margin-top:2vh">
                <?php foreach ($soal as $s) { ?>
                    <button style="color:rgba(255, 255, 255, 1); margin:1vh; padding-right:15px; order-radius:4px" type="button" class="btn btn-warning step" onclick="direct(this)"><?= $s ?></button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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