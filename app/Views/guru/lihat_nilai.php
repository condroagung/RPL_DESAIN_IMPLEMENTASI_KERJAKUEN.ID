<div class="container-fluid" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:3.5vh">MODUL <?= session()->get('no_modul') ?>
        <?php foreach ($nama_modul as $n) {
            echo $n['judul_modul'];
        } ?></p>
    <div class="row" style="margin-top:2vh">
        <div class="col-md-12">
            <table class="display" style="margin-top:2vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white; font-weight:500" data-page-length='10'>
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-family: 'IBM Plex Sans', sans-serif; font-weight:400">
                    <?php $no = 1;
                    $no_ujian = 0;
                    foreach ($data as $d) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $d['nis'] ?></td>
                            <td><?= $d['nama_siswa'] ?></td>
                            <td><?= $d['kelas'] ?></td>
                            <td><?php
                                if ($no_ujian < count($nilai)) {
                                    echo $nilai[$no_ujian]['skor_akhir'];
                                } else {
                                    echo 0;
                                }
                                ?></td>
                            <td class="text-center">
                                <a class="btn btn-info" style="background-color:rgba(47, 128, 237, 1)" data-bs-toggle="modal" data-bs-target="#edit_ujian<?= $d['id_ujian'] ?>"><i class="fas fa-pen"></i></a>
                                <a class="btn btn-light" href="<?php echo base_url('PageGuru/delete_ujian/' . $d['id_ujian']); ?>" style="background-color:#eb5757" onclick="return confirm('Apakah Anda yakin ingin menghapus hasil ujian ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php $no_ujian++;
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