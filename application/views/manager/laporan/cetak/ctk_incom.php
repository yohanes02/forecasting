<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Penerimaan Barang</title>
    <style type="text/css">
        table.tabel1 {
            border: 1px dashed;
        }
    </style>
</head>

<body onload="window.print();">
    <table class="tabel1" width="1024" cellspacing="4" cellpadding="4">
        <tr>
            <td>
            <div class="logos" style="margin-left:100px;margin-top:-10px;position:absolute;">
                    <img src="<?= base_url(); ?>/assets/images/img/logosepka1.jpeg" width="100" height="90" alt="ok" />
                    <small style="margin-left: -120px;margin-top:20px;">Sepka Medika Alkesindo</small>
                </div>
                <div align="center">
                    <h2><strong>Laporan Penerimaan Barang</strong></h2>
                    <h3 style="margin-top: -10px;">( PT Sepka Medika Alkesindo )</h3>
                    <?php
                    $tg1 = $this->session->userdata('tg1');

                    if ($tg1 != "") { ?>
                        <h3 style="margin-top: -10px;">Periode : <?= date("d/m/Y", strtotime($tg1)); ?></h3>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <hr style="margin-top: -10px;">
                <div align="right">
                    <p> Jawa Barat, <?= date("d/m/Y"); ?></p>
                </div>

                <table width="1000" border="1" cellspacing="5" cellpadding="5">
                    <thead style="background:#e6e6c8;">
                        <th>No</th>
                        <th>Tgl Terima</th>
                        <th>Supplier</th>
                        <th>Nama Barang</th>
                        <th>Qty Awal</th>
                        <th>Qty Masuk</th>
                        <th>Rusak</th>
                        <th>Qty Stok</th>
                        <th>Satuan</th>
                        <th>Staff Gudang</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($incoming->result_array() as $dp) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($dp['tgl_terima'])); ?></td>
                                <td><?php echo $dp['nm_supplier']; ?></td>
                                <td><?php echo $dp['nm_barang']; ?></td>
                                <td><?php echo $dp['qty_awal']; ?></td>
                                <td><?php echo $dp['qty_masuk']; ?></td>
                                <td><?php echo $dp['minus']; ?></td>
                                <td><?php echo $dp['qty_stock']; ?></td>
                                <td><?php echo $dp['unit']; ?></td>
                                <td><?php echo $dp['staff_gudang']; ?></td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>

                </table>

                <p>&nbsp;</p>

            </td>
        </tr>
    </table>
</body>

</html>