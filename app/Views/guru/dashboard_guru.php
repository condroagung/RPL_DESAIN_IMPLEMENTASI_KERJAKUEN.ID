<div class="container-fluid" style="font-family: 'Nunito', sans-serif; margin-left:2vh; color:rgba(79, 79, 79, 1)">
    <?php if (!empty(session()->getFlashdata('success'))) { ?>
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
                        <a href="<?= base_url('PageGuru/lihat_modul/' . $p['id_paket']); ?>" style="text-decoration:none; color:black">
                            <p class="card-title text-center" style="font-weight:700; font-size:20px; color:rgba(79, 79, 79, 1)"><?= $p['nama_mapel'] ?> - <?= $p['kelas'] ?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px; font-weight:700">REKAP NILAI SISWA SEMESTER INI</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-left:-2vh">
            <table class="display caption-top" style="margin-top:2vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white " data-page-length='10'>
                <caption> </caption>
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Jumlah Modul</th>
                        <th scope="col">Nilai Total</th>
                        <th scope="col">Rata-Rata</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-family: 'IBM Plex Sans', sans-serif;">
                    <?php $no = 1;
                    $no_modul = 0;
                    foreach ($rekap as $r) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $r['nama_paket'] ?></td>
                            <td><?= $r['nama_mapel'] ?></td>
                            <td><?php
                                if (empty($modul_guru)) {
                                    echo 0;
                                } else {
                                    foreach ($modul_guru as $m) {
                                        if ($r['id_paket'] == $m['id_paket']) {
                                            echo $m['id_modul'];
                                        } else {
                                            echo 0;
                                        }
                                    }
                                }
                                ?></td>
                            <td><?php
                                if (count($total_nilai) < 0) {
                                    echo 0;
                                } else {
                                    $skor = 0;
                                    foreach ($total_nilai as $m) {
                                        if ($r['id_paket'] == $m['id_paket']) {
                                            $skor = $skor + $m['skor_akhir'];
                                        } else {
                                            $skor = $skor + 0;
                                        }
                                    }
                                    echo $skor;
                                }
                                ?></td>
                            <td><?php
                                if (count($total_nilai) < 0) {
                                    echo 0;
                                } else {
                                    $skor = 0;
                                    $pembagi = 0;
                                    foreach ($total_nilai as $m) {
                                        if ($r['id_paket'] == $m['id_paket']) {
                                            $skor = $skor + $m['skor_akhir'];
                                            $pembagi = $pembagi + 1;
                                        } else {
                                            $skor = $skor + 0;
                                            $pembagi = $pembagi + 0;
                                        }
                                    }
                                    if ($pembagi == 0) {
                                        echo 0;
                                    } else {
                                        echo number_format($skor / $pembagi, 2);
                                    }
                                }
                                ?></td>
                        </tr>
                    <?php

                    } ?>
                </tbody>
            </table>
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
</script>