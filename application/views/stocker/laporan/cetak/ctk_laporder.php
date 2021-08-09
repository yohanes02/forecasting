<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Request Order (RO)</title>
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
                    <h2><strong>Laporan Request Order (RO)</strong></h2>
                    <h3 style="margin-top: -10px;">( PT Sepka Medika Alkesindo )</h3>
                    <?php
                    $tg1 = $this->session->userdata('tg1');
                    $tg2 = $this->session->userdata('tg2');

                    if ($tg1 != "" and $tg2 != "") { ?>
                        <h3 style="margin-top: -10px;">Periode : <?= date("d/m/Y", strtotime($tg1)); ?> s/d <?= date("d/m/Y", strtotime($tg2)); ?></h3>
                    <?php } else if ($tg1 != "") { ?>
                        <h3 style="margin-top: -10px;">Periode : <?= date("d/m/Y", strtotime($tg1)); ?></h3>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <hr style="margin-top: -10px;">

                <table width="1000" border="1" cellspacing="5" cellpadding="5">
                    <thead style="background:#e6e6c8;">
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

                <p>&nbsp;</p>

            </td>
        </tr>
    </table>
</body>

</html>