<div class="container-fluid">
    <h3 style="margin-top:2vh">Selamat Datang <span style="font-weight:bold">ADMIN!</span></h3>

    <h5 style="margin-top:4vh;font-weight:bold">DAFTAR PAKET SOAL</h5>

    <div class="row row-cols-1 row-cols-md-6 g-4" style="margin-top:2vh; border-radius: 0">
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