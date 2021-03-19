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
    <title>Dashboard Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-family: 'Nunito', sans-serif; color:#2F80ED; font-size:32px">K.ID</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family: 'Nunito', sans-serif; color:#4F4F4F; font-size:24px">Kerjakeun.id</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <img src="<?php echo base_url('images/admin.png'); ?>" style="height:5vh; widht:5vw;" alt=" ...">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: 'Nunito', sans-serif; font-size:24px">
                                ADMIN
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="background-color:#fafafa">
        <h3 style="margin-top:2vh">Selamat Datang <span style="font-weight:bold">ADMIN!</span></h3>

        <h5 style="margin-top:4vh;font-weight:bold">DAFTAR PAKET SOAL</h5>

        <div class="row row-cols-1 row-cols-md-6 g-4" style="margin-top:2vh">
            <div class="col">
                <div class="card">
                    <img src="<?php echo base_url('images/indo.png'); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">BAHASA INDONESIA - 5A</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo base_url('images/mat.png'); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">MATEMATIKA - 5A</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo base_url('images/ipa.png'); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">IPA - 5A</h5>
                    </div>
                </div>
            </div>
        </div>

        <h5 style="margin-top:4vh;font-weight:bold;">DAFTAR GURU</h5>

        <table class="table" style="margin-top:2vh; font-family: 'Nunito', sans-serif;">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <th scope="row">1</th>
                    <td>341231413</td>
                    <td>ahfajkafa</td>
                    <td>afajfafka</td>
                    <td>gobikegogreen</td>
                    <td class="text-center"><a class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>341231413</td>
                    <td>afakfajfaf</td>
                    <td>afkafjkakf</td>
                    <td>gobikegogreen</td>
                    <td class="text-center"><a class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>341231413</td>
                    <td>afkafafafaf</td>
                    <td>afafakafaff</td>
                    <td>gobikegogreen</td>
                    <td class="text-center"><a class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="d-grid gap-2" style="margin-top:2vh">
            <button type=" button" class="btn btn-outline-primary btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="border-radius: 8px"><i class="fas fa-plus"> </i> Tambah Guru</button>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Gurunya minimal S3</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Username</label>
                                <input type="text" class="form-control" id="validationDefault01" value="user" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Password</label>
                                <input type="password" class="form-control" id="validationDefault02" value="ajg" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <h5 style="margin-top:4vh;font-weight:bold;">DAFTAR SISWA</h5>

        <table class="table" style="margin-top:2vh; font-family: 'Nunito', sans-serif;"">
            <thead class=" text-center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody class=" text-center">
                <tr>
                    <th scope="row">1</th>
                    <td>1301180386</td>
                    <td>Hafizh Indriyanto</td>
                    <td>hafizhidy</td>
                    <td>hafizh</td>
                    <td class="text-center"><a class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>1301180386</td>
                    <td>Hafizh Indriyanto</td>
                    <td>hafizhidy</td>
                    <td>hafizh</td>
                    <td class="text-center"><a class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>1301180386</td>
                    <td>Hafizh Indriyanto</td>
                    <td>hafizhidy</td>
                    <td>hafizh</td>
                    <td class="text-center"><a class="btn btn-info" href=""><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="d-grid gap-2" style="margin-top:2vh">
            <button type=" button" class="btn btn-outline-primary btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="border-radius: 8px"><i class="fas fa-plus"> </i> Tambah Siswa</button>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Siswa Cerdas</div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Pilih Kelas</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="validationDefault02" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Username</label>
                                <input type="text" class="form-control" id="validationDefault01" value="user" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Password</label>
                                <input type="password" class="form-control" id="validationDefault02" value="ajg" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->

</body>


</html>