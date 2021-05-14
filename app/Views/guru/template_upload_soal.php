<?php

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=Template_Upload_Soal.xls");

?>

<html>

<body>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Soal</td>
                <td>Pilihan A</td>
                <td>Pilihan B</td>
                <td>Pilihan C</td>
                <td>Pilihan D</td>
                <td>Skor Maksimal</td>
                <td>Kunci Jawaban</td>
            </tr>
        </thead>
        <tbody>
            <td>1</td>
            <td>x^2 + 2xy + y^2</td>
            <td>(x+y)^2</td>
            <td>(x)^2</td>
            <td>(y)^2</td>
            <td>(x-y)^2</td>
            <td>5(jangan diubah bagian ini)</td>
            <td>a/b/c/d</td>
        </tbody>
    </table>
</body>

</html>