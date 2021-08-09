<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Penggunaan Barang</title>
    <style type="text/css">
        body {
            font-family: Arial;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <table class="tabel1" width="100%">
        <tr>
            <td>
                <div class="logos" style="margin-top:5px;position:absolute;">
                    <img src="<?php echo base_url() . '/assets/images/img/aw.png'; ?>" width="100" height="90" alt="ok" />
                    <small style="margin-left: -100px;margin-top:50px;position:absolute;">Restaurant Khas Amerika</small>
                </div>
                <div align="center">
                    <h2><strong>Laporan Penggunaan Barang</strong></h2>
                    <h3 style="margin-top: -10px;">( Mall Ciputra Seraya )</h3>
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
                    <p> Pekanbaru, <?= date("d/m/Y"); ?></p>
                </div>

                <table width="100%" border="1" cellpadding="5">
                    <thead style="background-color:#e6e6c8;">
                        <tr>
                            <th>No</th>
                            <th width="10%">Tgl Keluar</th>
                            <th>Kode Barang</th>
                            <th width="20%">Nama Barang</th>
                            <th>Qty Stock</th>
                            <th>Qty Keluar</th>
                            <th>End Stock</th>
                            <th>Satuan</th>
                            <th width="20%">Staf Gudang</th>
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

                <p>&nbsp;</p>

            </td>
        </tr>
    </table>
</body>

</html>