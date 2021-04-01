<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($siswa as $row) {
        ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $row['username']; ?></td>
                <td><?= $row['password']; ?></td>
                <td><?= $row['nama_siswa']; ?></td>
            </tr>
    </tbody>
<?php }

?>
</table>