<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Penggunaan Barang</title>
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
                    <h2><strong>Laporan Penggunaan Barang</strong></h2>
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
                <div align="right">
                    <p> Jawa Barat, <?= date("d/m/Y"); ?></p>
                </div>

                <table width="1000" border="1" cellspacing="5" cellpadding="5">
                    <thead style="background:#e6e6c8;">
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
                                <td><?php echo date('d-m-Y', strtotime($dp['tgl_keluar'])); ?></td>
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

                <p>&nbsp;</p>

            </td>
        </tr>
    </table>
</body>

</html>