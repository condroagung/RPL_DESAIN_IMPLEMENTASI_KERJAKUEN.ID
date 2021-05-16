<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
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
                                <?php
                                $skor = 0;
                                foreach ($avg_hasil as $avg) {
                                    $skor += ($avg['skor_akhir']);
                                }
                                if ($count_modul_done == 0) {
                                    echo 0;
                                } else {
                                    $skor_avg = number_format($skor / $count_modul_done, 2);
                                    echo $skor_avg;
                                }
                                ?></span>
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
                        <td class="col-3 px-0 py-2"><span style="font-weight:400">: <?= $total_soal ?></span>
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

        <?php $no = 0;
        $no_temp = 0;
        foreach ($modul as $m) {
        ?>

            <div class="row" style="background-color:white; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); border-radius:8px; margin-top:2vh">
                <div class="col-1" style=" margin-top:2vh; margin-left:2vh"><?= $no + 1 ?></div>
                <div class="col-2" style=" margin-left: -2vh; margin-top:2vh">
                    <p style="font-weight:700">KODE MODUL : <span style="font-weight:400">BIM<?= $no + 1 ?></span></p>
                </div>
                <div class="col-4" style=" margin-top:2vh"><?= $m['judul_modul'] ?></div>
                <div class="col-2" style=" margin-top:2vh">
                    <p style="font-size:16px; font-weight:700"> JUMLAH SOAL : <span style="font-weight:400">
                            <?php
                            if ($no < count($count_soal_modul)) {
                                echo number_format($count_soal_modul[$no]['id_soal']);
                            } else {
                                echo 0;
                            } ?>
                        </span></p>
                </div>
                <div class="col-2">
                    <p style="font-size:16px; font-weight:700;  margin-top:2vh"> WAKTU PENGERJAAN : <span style="font-weight:400"><?= $m['rata_waktu'] ?> MENIT</span> </p>
                </div>
                <?php
                if ($no_temp < (count($hasil))) { ?>
                    <div class="col-1" style="background-color:rgba(39, 174, 96, 1); border-radius: 0px 8px 8px 0px;">
                        <a href="<?= base_url('MulaiUjian/ujian/' . $m['id_modul']) ?>" onclick="return confirm('apakah anda akan memulai ujian lagi ?')" style=" text-decoration:none">
                            <p style="color:white; font-size:24px; margin-bottom:10px; padding:15px;  text-align: center;">
                                <?php
                                echo number_format($hasil[$no_temp]['skor_akhir']);
                                ?></p>
                        </a>
                    </div>
                    <?php } else {
                    if ($m['status_modul'] == 0) { ?>
                        <div class="col-1">
                            <a href="" onclick="alert('Soal belum bisa dikerjakan');"><i class="fas fa-lock" style="color:rgba(242, 153, 74, 1); margin-left:3vh; font-size:30px; padding:25px;"></i></a>
                        </div>
                    <?php } else { ?>
                        <div class="col-1">
                            <a href="<?= base_url('MulaiUjian/ujian/' . $m['id_modul']) ?>" onclick="return confirm('apakah anda akan memulai ujian ?')"><i class="fas fa-play" style="color:rgba(39, 174, 96, 1); margin-left:3vh; font-size:30px; padding:25px;"></i></a>
                        </div>
                <?php }
                } ?>
            </div>
        <?php $no++;
            $no_temp++;
        } ?>
    </div>
</div>