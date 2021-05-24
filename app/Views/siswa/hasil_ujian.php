<div class="container" style="font-family: 'Nunito', sans-serif; color:rgba(79, 79, 79, 1)">
    <div class="row">
        <div class="col col-md">
            <p style="margin-top:2vh; font-weight:700; font-size:24px; margin-left:5px">Detail Nilai Modul</p>
        </div>
    </div>
    <div class="row" style="margin-top:2vh">
        <div class="col-md-12">
            <table class="display" style="margin-top:3vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white; " data-page-length='10'>
                <thead class="text-center">
                    <tr>
                        <th scope="col">Attempt</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Berakhir</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($jawaban as $j) { ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $j['skor_akhir']; ?></td>
                            <td><?php
                                $evdate = DateTime::createFromFormat('d/m/Y H:i:s', $j['waktu_mulai']);
                                echo ($evdate->format("j-F-Y, H:i:s")) ?></td>
                            <td><?php
                                $evdate = DateTime::createFromFormat('d/m/Y H:i:s', $j['waktu_berakhir']);
                                echo ($evdate->format("j-F-Y, H:i:s")) ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo base_url('PageSiswa/detail_hasil/' . $j['id_ujian'] . '/' . $j['id_modul']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-list"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
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
            },
            dom: 'lBfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>