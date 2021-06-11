<div class="container-fluid" style="font-family: 'Nunito', sans-serif; margin-left:2vh; color:rgba(79, 79, 79, 1)">
    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>
        <?php echo session()->getFlashdata('success'); ?>
    <?php } ?>
    <div class="row">
        <div class="col-md-12">
            <p style="margin-top:2vh;font-family: 'Poppins', sans-serif; font-size:18px; font-weight:700">PAKET SOAL YANG TERSEDIA</p>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-6 g-4">
        <?php foreach ($paket as $p) { ?>
            <div class="col">
                <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                    <img src="<?= base_url() . '/uploads/' . $p['cover']; ?>" class="card-img-top" alt="...">
                    <i class="fas fa-ellipsis-v" style="position:absolute; top:1vh; right:1vw; color:white"></i>
                    <div class="card-body">
                        <a href="<?= base_url('PageSiswa/lihat_modul_siswa/' . $p['id_paket']); ?>" style="text-decoration:none; color:black">
                            <p class="card-title text-center" style="font-weight:700; font-size:20px; color:rgba(79, 79, 79, 1)"><?= $p['nama_mapel'] ?> - <?= $p['kelas'] ?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px; font-weight:700">REKAP NILAI SEMESTER INI</p>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-12" style="margin-left:-2vh">
            <div class="table-responsive">
                <table class="display caption-top" style="margin-top:3vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white; " data-page-length='10'>
                    <caption> </caption>
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Jumlah Modul</th>
                            <th scope="col">Jumlah Modul Selesai</th>
                            <th scope="col">Nilai Total</th>
                            <th scope="col">Rata-Rata</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="font-family: 'IBM Plex Sans', sans-serif;">
                        <?php $no = 1;
                        $no_modul = 0;
                        $sum_avg = 0;
                        foreach ($paket as $p) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $p['nama_paket'] ?></td>
                                <td><?= $p['nama_mapel'] ?></td>
                                <td>
                                    <?php
                                    if (count($count_modul) == 0) {
                                        echo 0;
                                    } else {
                                        $mod = 0;
                                        foreach ($count_modul as $m) {
                                            if ($p['id_paket'] == $m['id_paket']) {
                                                echo $m['id_modul'];
                                            }
                                        }
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    if (count($count_modul) == 0) {
                                        echo 0;
                                    } else {
                                        $modul_done = 0;
                                        foreach ($sum_hasil as $s) {
                                            if ($s['id_paket'] == $p['id_paket']) {
                                                $modul_done++;
                                            }
                                        }
                                        echo $modul_done;
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    if (count($count_modul) == 0) {
                                        echo 0;
                                    } else {
                                        $sum = 0;
                                        foreach ($sum_hasil as $s) {
                                            if ($s['id_paket'] == $p['id_paket']) {
                                                $sum += $s['skor_tertinggi'];
                                            }
                                        }
                                        echo $sum;
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    if (count($sum_hasil) == 0) {
                                        echo 0;
                                    } else {
                                        $sum = 0;
                                        $count = 0;
                                        foreach ($sum_hasil as $s) {
                                            if ($s['id_paket'] == $p['id_paket']) {
                                                $sum += $s['skor_tertinggi'];
                                                $count++;
                                            }
                                        }
                                        if ($count == 0) {
                                            echo 0;
                                            $sum_avg += 0;
                                        } else {
                                            echo number_format($sum / $count, 2);
                                            $sum_avg += ($sum / $count);
                                        }
                                    }
                                    ?></td>
                            </tr>
                        <?php
                            $no_modul++;
                        } ?>
                    </tbody>
                    <?php if (count($paket) != 0) { ?>
                        <tfoot>
                            <td colspan="6" style="text-align:right;font-weight:700">Rata-Rata Keseluruhan</td>
                            <td style="text-align:center">
                                <?php
                                if (count($sum_hasil) == 0) {
                                    echo 0;
                                } else {
                                    $count_all = 0;
                                    foreach ($sum_hasil as $s) {
                                        $count_all++;
                                    }
                                    if ($count_all == 0) {
                                        echo 0;
                                    } else {
                                        if (count($paket) == 0) {
                                            echo 0;
                                        } else {
                                            echo number_format($sum_avg / count($paket), 2);
                                        }
                                    }
                                }
                                ?>
                            </td>
                        </tfoot>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('table.display').DataTable({
            fixedHeader: {
                header: true,
                footer: true
            }
        });
    });
    localStorage.clear();
</script>