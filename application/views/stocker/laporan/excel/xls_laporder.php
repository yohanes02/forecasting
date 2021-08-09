<?php
$nama_file = "Laporan-Request-Order.xls";
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
        <td colspan="11" align="center">
            <h3>Laporan Request Order (RO)</h3>
        </td>
    </tr>
    <tr>
        <td colspan="11" align="right">
            <p> Pekanbaru, <?= date("d/m/Y"); ?></p>
        </td>
    </tr>
</table>
<table width="1000" border="1" cellspacing="5" cellpadding="5">
    <thead style="background:#435966;color:white;">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tgl Order</th>
            <th scope="col">Kode Barang</th>
           
            <th scope="col">Nama Barang</th>
            <th scope="col">Unit</th>
            <th scope="col">End Stock</th>
            <th scope="col">Order</th>
            <th scope="col">Price</th>
            <th scope="col">Receive</th>
            <th scope="col">Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($order->result_array() as $dp) {
        ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?php echo date('d-m-Y', strtotime($dp['tgl_request'])); ?></td>
                <td><?php echo $dp['kode']; ?></td>
                
                <td><?php echo $dp['nm_barang']; ?></td>
                <td><?php echo $dp['unit']; ?></td>
                <td align="center"><?php echo $dp['quality']; ?></td>
                <td align="center"><?php echo $dp['qty_barang']; ?></td>
                <td><?php echo rupiah($dp['harga']); ?></td>
                <td align="center"><?php echo $dp['qty_barang']; ?></td>
                <td><?php echo rupiah($dp['harga_total']); ?></td>
            </tr>
        <?php
            $no++;
            $gt[] = $dp['harga_total'];
        }
        $j = array_sum($gt);
        ?>
    </tbody>
    <tfoot>
        <td colspan="10">Grand Total</td>
        <td><?= rupiah($j); ?></td>
    </tfoot>
</table>