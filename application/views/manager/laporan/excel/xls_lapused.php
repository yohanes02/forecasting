<?php
$nama_file = "Laporan-penggunaan-barang.xls";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=" . $nama_file . "");
header("Content-Transfer-Encoding: binary ");
?>

<table border="1" cellspacing="5" cellpadding="5">
    <tr>
        <td colspan="9" align="center">
            <h3>Laporan Penggunaan Barang</h3>
        </td>
    </tr>
    <tr>
        <td colspan="9" align="right">
            <p> Pekanbaru, <?= date("d/m/Y"); ?></p>
        </td>
    </tr>
</table>
<table width="1000" border="1" cellspacing="5" cellpadding="5">
    <thead style="background:#435966;color:white;">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tgl Keluar</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Qty Stock</th>
            <th scope="col">Qty Keluar</th>
            <th scope="col">End Stock</th>
            <th scope="col">Satuan</th>
            <th scope="col">Staf Gudang</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($used->result_array() as $dp) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $dp['tgl_keluar']; ?></td>
                <td><?php echo $dp['kode']; ?></td>
                <td><?php echo $dp['nm_barang']; ?></td>
                <td align="center"><?php echo $dp['beg_qty']; ?></td>
                <td align="center"><?php echo $dp['qty_keluar']; ?></td>
                <td align="center"><?php echo $dp['end_qty']; ?></td>
                <td align="center"><?php echo $dp['unit']; ?></td>
                <td><?php echo $dp['staff_gudang']; ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>