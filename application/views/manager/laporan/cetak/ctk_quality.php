<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Quality Supply</title>
</head>

<?php
foreach ($incom->result_array() as $i) :
    $id = $i['id_order'];
    $nama = $i['staff_gudang'];
    $supplier = $i['nm_supplier'];
    $tgl_order = $i['tanggal_order'];
    $tgl_terima = $i['tgl_terima'];
?>

    <body onload="window.print();">
        <center>
            <h2> Non Conformance <br> (Report Penyimpangan Quality / Quality Supply)</h2>
            <table width="1024" border="1" cellspacing="0" cellpadding="4">
                <tr>
                    <td width="558">
                        <div align="left"><b>No : </b><?= $id ?>-<?= date('Y-d') ?></div>
                    </td>
                    <td width="432">
                        <div align="left"><strong>Tanggal Kejadian :</strong><?= format_tanggal($tgl_terima); ?></div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div align="left"><b>Nama Supplier : </b><?= $supplier ?></div>
                    </td>
                    <td>
                        <div align="left"><strong>Nomor PO :</strong> <?= $autokode ?></div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div align="left"><b>Tanggal Pengorderan : </b><?= format_tanggal($tgl_order) ?></div>
                    </td>
                    <td>
                        <div align="left"><strong>Tanggal Penerimaan Barang : </strong> <?= format_tanggal($tgl_terima); ?></div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="1024" border="1" cellspacing="0" cellpadding="4">
                <tr>
                    <th height="86" scope="col">No</th>
                    <th scope="col" width="30%">Nama Barang </th>
                    <th scope="col">Unit</th>
                    <th scope="col">Jumlah Yang Di Order </th>
                    <th scope="col">Jumlah Aktual Yang Rusak (Tidak Sesuai) </th>
                    <th scope="col">Selisih</th>
                </tr>
                <?php
                $no = 1;
                foreach ($incoming->result_array() as $dp) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dp['nm_barang']; ?></td>
                        <td align="center"><?php echo $dp['unit']; ?></td>
                        <td align="center"><?php echo $dp['qty_masuk']; ?></td>
                        <td align="center"><?php echo $dp['minus']; ?></td>
                        <td style="color: red;text-align:center;"><?php echo $dp['minus'] - $dp['qty_masuk'] ?></td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
            <table width="1024" border="0" cellspacing="0" cellpadding="4">
                <tr>
                    <td>
                        <p><strong>Keterangan Yang Diperoleh Store : </strong></p>
                    </td>
                </tr>
                <table width="1024" border="1" cellspacing="0" cellpadding="4">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Penjelasan Penyimpangan Barang (DETAIL) </strong></td>
                    </tr>
                    <tr>
                        <td><strong>1. Penyimpangan Ukuran / Dimensi, dll : </strong></td>
                    </tr>
                    <tr>
                        <td><strong>2. Penyimpangan Kondisi Product (Kadaluarsa, Perubahan Warna, Rasa, dll) : </strong></td>
                    </tr>
                    <tr>
                        <td><strong>3. Penyimpangan lain : </strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong>Operation : </strong></td>
                    </tr>
                    <tr height="86">
                        <td>
                            <div align="right"> </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right"><strong>Nama : </strong><?= $nama; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right"><strong>Jabatan : </strong> Stocker </div>
                        </td>
                    </tr>
                </table>
        </center>
    </body>
<?php endforeach; ?>

</html>