<div class="container-fluid" style="font-family: 'Nunito', sans-serif;">
    <p style="font-size: 24px; margin-top:2vh">Selamat Datang <span style="font-weight:700"><?php echo session()->get('username') ?>!</span></p>
    <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px">PAKET SOAL YANG TERSEDIA</p>

    <div class="row row-cols-1 row-cols-md-6 g-4">
        <div class="col">
            <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <img src="<?php echo base_url('images/indo.png'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="<?php echo base_url('PageSiswa/lihat_modul'); ?>" style="text-decoration:none; color:black">
                        <h5 class="card-title text-center">BAHASA INDONESIA - 5A</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <img src="<?php echo base_url('images/mat.png'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="<?php echo base_url('PageSiswa/lihat_modul'); ?>" style="text-decoration:none; color:black">
                        <h5 class="card-title text-center">MATEMATIKA - 5A</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0" style="box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1);">
                <img src="<?php echo base_url('images/ipa.png'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="<?php echo base_url('PageSiswa/lihat_modul'); ?>" style="text-decoration:none; color:black">
                        <h5 class="card-title text-center">IPA - 5A</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <p style="margin-top:4vh;font-family: 'Poppins', sans-serif; font-size:18px">REKAP NILAI SEMESTER INI</p>

    <table class="display" id="" style="margin-top:2vh; font-family: 'IBM Plex Sans', sans-serif; box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.1); background-color:white " data-page-length='10'>
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
            <tr>
                <th scope="row">1</th>
                <td>BI769</td>
                <td>Bahasa Indonesia</td>
                <td>7</td>
                <td>490</td>
                <td>70</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>MTK0234</td>
                <td>Matematika</td>
                <td>10</td>
                <td>950</td>
                <td>95</td>
            </tr>
        </tbody>
    </table>
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