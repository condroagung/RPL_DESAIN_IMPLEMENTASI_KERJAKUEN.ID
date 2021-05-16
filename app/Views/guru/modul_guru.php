<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <?php if (!empty(session()->getFlashdata('success'))) { ?>
        <?php echo session()->getFlashdata('success'); ?>
    <?php } ?>
    <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:5px"><?= $paket['nama_mapel'] ?></p>
    <div class="m-2 mb-4 rounded-3 shadow p-3 bg-white d-flex flex-row">
        <div>
            <img src="<?= base_url() . '/uploads/' . $paket['cover']; ?>" href="#" class="p-2" style="height:300px; width:300px" alt="">
        </div>
        <div class="col p-2">
            <p class="" style="font-weight:700; font-size:18px;">Detail Paket Soal</p>
            <table class="table table-borderless" style="font-weight:700; color:rgba(79, 79, 79, 1)">
                <tbody>
                    <tr>
                        <td class="col-3 px-0 py-2">Kode Mapel</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $paket['nama_paket'] ?></span></td>
                        <td class="col-3 px-0 py-2">Rata-rata nilai</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">:
                                <?php if (count($avg_all) == 0) {
                                    echo 0;
                                } else {
                                    echo number_format($avg_all[0]['skor_akhir'], 2, ',', ',');
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-3 px-0 py-2">Nama Mapel</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $paket['nama_mapel'] ?></td>
                        <td class="col-3 px-0 py-2">Jumlah modul selesai</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $count_modul_done ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-3 px-0 py-2">Guru Pengampu</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $paket['nama_guru'] ?>.</td>
                        <td class="col-3 px-0 py-2">Jumlah soal selesai</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $count_soal_done ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-3 px-0 py-2">Kelas</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $paket['kelas'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-3 px-0 py-2">Jumlah Modul</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $count_modul ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-3 px-0 py-2">Rata-rata waktu pengerjaan</td>
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">:
                                <?php
                                if ($check_avg_time == 0) {
                                    echo 0;
                                } else {
                                    echo number_format($avg_time[0]['rata_waktu'], 2, ',', '.');
                                }
                                ?> Menit</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p style="margin-top:2vh;font-family: 'Poppins', sans-serif; font-size:18px; font-weight:700">DAFTAR MODUL</p>
            </div>
        </div>

        <?php
        $no = 1;
        $no_modul = 0;
        foreach ($modul as $m) { ?>

            <div class="row" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);margin-top:2vh">
                <div class="col-1" style=" margin-top:2vh; margin-left:2vh"><?= $no ?></div>
                <div class="col-2" style=" margin-left: -2vh; margin-top:2vh">
                    <p style="font-weight:700">KODE MODUL : <span style="font-weight:400">BIM<?= $no ?></span></p>
                </div>
                <div class="col-3" style=" margin-top:2vh"><?= $m['judul_modul'] ?></div>
                <div class="col-2" style=" margin-top:2vh">
                    <p style="font-size:16px; font-weight:700"> JUMLAH SOAL : <span style="font-weight:400">
                            <?php
                            if ($no_modul < count($count_soal_modul)) {
                                echo number_format($count_soal_modul[$no_modul]['id_soal']);
                            } else {
                                echo 0;
                            } ?>
                        </span></p>
                </div>
                <div class="col-2" style=" margin-top:2vh;">
                    <p style="font-size:16px; font-weight:700"> WAKTU PENGERJAAN : <span style="font-weight:400"><?= $m['rata_waktu'] ?> MENIT</span> </p>
                </div>
                <div class="col-2">
                    <?php if ($m['status_modul'] == 0) { ?>
                        <a href=""><i class="fas fa-lock" style="background-color:rgba(242, 153, 74, 1); color:white; margin-left:3vh; font-size:24px; margin-top:1.5vh; padding:5px; border-radius:4px" onclick="alert('modul belum dibuka')"></i></a>
                    <?php } else { ?>
                        <a href=""><i class="fas fa-unlock" style="background-color:rgba(39, 174, 96, 1); color:white; margin-left:3vh; font-size:24px; margin-top:1.5vh; padding:5px; border-radius:4px" onclick="alert('modul sudah dibuka')"></i></a>
                    <?php } ?>
                    <a href="<?= base_url('KelolaModul/edit_modul/' . $m['id_modul'] . '/' . $no);  ?>"><i class="fas fa-pen" style="background-color:#2F80ED; color:white; margin-left:3vh; font-size:24px; padding:5px; border-radius:4px"></i></a>
                    <a href="<?= base_url('PageGuru/lihat_nilai/' . $m['id_modul']) . '/' . $no;  ?>"><i class="fas fa-tasks" style="background-color:#9B51E0; color:white; margin-left:3vh; font-size:24px; padding:5px; border-radius:4px"></i></a>
                    <a href=""><i class="fas fa-ellipsis-v" style="color:black; margin-left:2vh; font-size:24px; border-radius:4px"></i></a>
                </div>
            </div>

        <?php $no++;
            $no_modul++;
        } ?>
        <div class="row">
            <div class="col col-md-12">
                <div class="d-grid gap-2" style="margin-top:2vh; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1)">
                    <a href="<?= base_url('KelolaModul/buat_modul') ?>" type="button" class="btn btn-light" style="border-radius: 8px; font-weight:700"><i class="fas fa-plus" style="margin-right:1vw;"> </i>BUAT MODUL BARU</a>
                </div>
            </div>
        </div>
    </div>
</div>