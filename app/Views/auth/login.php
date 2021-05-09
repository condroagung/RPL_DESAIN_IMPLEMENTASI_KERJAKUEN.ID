<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="shortcut icon" href="<?php echo base_url('images/logo.png') ?>" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Welcome</title>
</head>


<section class="d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px; margin-right:80vw">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family: 'Nunito', sans-serif; color:#FFFFFF; font-size:24px; font-weight:700; ">KERJAKEUN.ID</a>
                    </li>
                </ul>
                <form>
                    <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px">
                        <button type="button" onclick="showlogin()" class="btn btn-outline light" style="color:white; border-color:white; border-radius: 20px; font-family: 'Poppins', sans-serif; border:2px solid; font-size:15px; padding: 5px 20px;">LOGIN</button>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
</section>


<body style="background-image:linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ),url(<?php echo base_url('images/buahbatu.png'); ?>);">
    <div id="welcome">
        <section class="d-flex justify-content-center" style="position: absolute; top: 42%; width: 100%;">
            <p style="color:white; background-color:rgba(229, 229, 229, 0.25); border-radius:30px; padding: 5px 30px; font-family: 'Nunito', sans-serif; font-size:30px">
                Selamat Datang di <span style="font-family: 'Nunito', sans-serif; font-weight:700">Website Try Out Online</span></p>
        </section>
        <section class="d-flex justify-content-center" style="position: absolute; top: 50%; width: 100%;">
            <p style="color:white; font-family: 'Nunito', sans-serif; font-size:48px; font-weight:700">SDN BUAH BATU 006 BANDUNG</p>
        </section>
        <section class="d-flex justify-content-center" style="position: absolute; top: 58%; width: 100%;">
            <p style="color:white; font-family: 'Nunito', sans-serif; font-size:18px; font-weight:500; font-style:normal">Platform Try Out Online yang memudahkan siswa
                dalam mengerjakan tugas-tugas maupun ujian yang diberikan sekolah</p>
        </section>
    </div>

    <div id="login_1" style="visibility:hidden">
        <section class="d-flex justify-content-center" style="position: absolute; top: 35%; width: 100%;">
            <p style="color:white; font-family: 'Nunito', sans-serif; font-size:48px; font-weight:700">LOGIN</p>
        </section>
        <section class="d-flex justify-content-center" style="position: absolute; top: 43%; width: 100%;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                        <?php endif; ?>
                        <form action="<?php echo base_url('Home/auth'); ?>" method="post" style="background-color:white ;border-radius:15px; font-family: 'Nunito', sans-serif; font-size:18px; font-weight:500; font-style:normal; padding:5px 20px ">
                            <label for="exampleInputEmail1" class="form-label" style="margin-top:1vh">Username</label>
                            <div class="input-group mb-3" style="margin-bottom:3vh;">
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <div class="input-group mb-3" style="margin-bottom:3vh;">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                <button type="button" id="button_show" onclick=" showpass()"><i class=" fas fa-eye "></i></button>
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary" style="margin-left:15vw; padding:5px 20px; margin-top:1vh;  font-family: 'Poppins', sans-serif;">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="d-flex justify-content-center" style="position: absolute; top: 80%; width: 100%;">
            <p style="color:rgba(235, 87, 87, 1); font-family: 'Nunito', sans-serif; font-size:18px; font-weight:700">*Lupa Password? Hubungi admin untuk mereset password</p>
        </section>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function showlogin() {
            var a = document.getElementById('login_1');
            var b = document.getElementById('welcome');
            var button = document.getElementsByTagName('button')[0];
            if (button.textContent === 'LOGIN') {
                a.style.visibility = 'visible';
                b.style.visibility = 'hidden';
                button.textContent = 'BERANDA';
            } else {
                a.style.visibility = 'hidden';
                b.style.visibility = 'visible';
                button.textContent = 'LOGIN';
            }
        }
        setTimeout("showlogin", 3000);

        function showpass() {
            var x = document.getElementById("exampleInputPassword1")
            if (x.type === "password") {
                x.type = "text";
                x.classList.toggle("fa-thumbs-down");
            } else {
                x.type = "password";
            }
        }

        $("#button_show").click(function() {
            $(this).find("i").toggleClass("fa-eye-slash");
        });
    </script>
</body>