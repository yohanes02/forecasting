<?php
$nama_file = "DataPemeriksaan.xls";
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
            <h3>Laporan Data Pemeriksaan</h3>
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td>
            <table cellpadding="8" style="border-collapse:collapse;" border="1">
                <thead style="background:#11c15b;color:white;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No. Registrasi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pasien->result_array() as $dp) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $dp['no_regis']; ?></td>
                            <td><?php echo $dp['tgl']; ?></td>
                            <td><?php echo $dp['nm_pasien']; ?></td>
                            <td><?php echo $dp['nm_dokter']; ?></td>
                            <td><?php echo $dp['diagnosa']; ?></td>
                            <td><?php echo $dp['keterangan']; ?></td>
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