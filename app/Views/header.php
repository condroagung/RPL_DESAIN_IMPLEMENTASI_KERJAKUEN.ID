<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url('css/progress-circle.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('images/logo.png') ?>" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <title>Kerjakeun - <?= $title ?></title>
</head>

<style>
    .navbar-custom {
        background-color: #FFFFFF;
    }
</style>

<body style="background-color: rgba(250, 250, 250, 1);">
    <nav class="navbar navbar-expand-lg navbar-custom" style="box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.05);">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php
                                            if ((session()->get('status') == 0)) {
                                                echo base_url('KelolaAdmin');
                                            } else if ((session()->get('status') == 1)) {
                                                echo base_url('PageGuru');
                                            } else {
                                                echo base_url('PageSiswa');
                                            }
                                            ?>" style="font-family: 'Nunito', sans-serif; color:#2F80ED; font-size:32px; font-weight:700">K.ID</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php
                                                    if ((session()->get('status') == 0)) {
                                                        echo base_url('KelolaAdmin');
                                                    } else if ((session()->get('status') == 1)) {
                                                        echo base_url('PageGuru');
                                                    } else {
                                                        echo base_url('PageSiswa');
                                                    }
                                                    ?>" style="font-family: 'Nunito', sans-serif; color:#4F4F4F; font-size:24px; font-weight:700">Kerjakeun.id</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <img class="rounded-circle" src="<?php
                                                            if (session()->get('status') == 0) {
                                                                echo base_url('images/admin.png');
                                                            } else if (session()->get('status') == 1) {
                                                                echo base_url('images/teacher.png');
                                                            } else {
                                                                if (session()->get('jenis_kelamin') == "Laki-Laki") {
                                                                    echo base_url('images/student_boy.png');
                                                                } else {
                                                                    echo base_url('images/student_girl.png');
                                                                }
                                                            } ?>" style="height:4vh; widht:4vw;" alt=" ...">
                        <li class="nav-item" style="appearance: none; ">
                            <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#4F4F4F; font-family: 'Nunito', sans-serif; font-size:16px; font-weight:400">
                                <?php echo strtoupper(session()->get('nama')) ?> <i class="fas fa-chevron-down" style="font-size:12px;margin-left:1vh"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown" style="border-radius:8px; font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
                                <?php if (session()->get('status') == 2) { ?>
                                    <li><a class="dropdown-item" href="<?= base_url('PageSiswa/profile') ?>"><i class="fas fa-user-alt" style="font-size:12px"></i> Profile</a></li>
                                <?php                          } ?>
                                <?php
                                if (session()->get('status') == 2) { ?>
                                    <li><a class="dropdown-item" href="<?= base_url('PageSiswa/nilai'); ?>"><i class="far fa-calendar-alt" style="font-size:12px"></i> Grades</a></li>
                                <?php                          } ?>
                                <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#edit_pass<?= session()->get('id_user') ?>"><i class="fas fa-key" style="font-size:12px"></i> Change Password</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('Home/logout') ?>"><i class="fas fa-sign-out-alt" style="font-size:12px"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="modal fade" id="edit_pass<?= session()->get('id_user') ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-md-5">
                                <p class="modal-title" id="exampleModalLabel23" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px">GANTI PASSWORD</p>
                            </div>
                            <div class="col-md">
                                <p class="modal-title" id="exampleModalLabel23" style="color:rgba(235, 87, 87, 1); font-family: 'Poppins', sans-serif; font-weight:400; font-size:12px">*Jika lupa password lama, langsung hubungi admin</p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="<?php echo base_url('KelolaAdmin/change_pass'); ?>" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="id_user" id="id_user" value="<?= session()->get('id_user') ?>">
                                <label for="pass_lama" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pass_lama">
                                <?php if ($validation->getError('pass_lama')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('pass_lama'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="pass_baru" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pass_baru">
                                <?php if ($validation->getError('pass_baru')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('pass_baru'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="pass_sesuai" class="form-label">Ketik Ulang Password Baru</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pass_sesuai">
                                <?php if ($validation->getError('pass_sesuai')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('pass_sesuai'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>