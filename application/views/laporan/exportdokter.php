<?php
$nama_file = "DataDokter.xls";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=" . $nama_file . "");
header("Content-Transfer-Encoding: binary ");
?>
<table>
    <tr>
        <td align="center">
            <h3>Laporan Data Dokter</h3>
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td>
            <table cellpadding="8" style="border-collapse:collapse;" border="1">
                <thead style="background:#11c15b;color:white;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Dokter</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kota</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Poliknik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($dokter->result_array() as $dp) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $dp['kd_dokter']; ?></td>
                            <td><?php echo $dp['nm_dokter']; ?></td>
                            <td><?php echo $dp['jekel']; ?></td>
                            <td><?php echo $dp['alamat']; ?></td>
                            <td><?php echo $dp['kota']; ?></td>
                            <td><?php echo $dp['no_telp']; ?></td>
                            <td><?php echo $dp['jenis_poli']; ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

            <p>&nbsp;</p>
            <p align="right" style="margin-right:60px;">Minas, <?= date("d/m/Y"); ?><br>
            </p>
            <p align="right" style="margin-right:40px;">
                Ka. Puskesmas Minas<br>
                <br>
                <br>
                <br>
                <br>
                ( . . . . . . . . . . . . . . . . .)
            </p>
        </td>
    </tr>
</table>