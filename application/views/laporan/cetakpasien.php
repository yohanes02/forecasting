<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Puskesmas Minas Jaya</title>
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
                <img style="margin-left:250px;margin-top:10px;position:absolute;" src="<?= base_url(); ?>/assets/images/puskes.png" width="70" height="70" alt="ok" />
                <div align="center">
                    <h2><strong>Puskesmas Minas Jaya</strong></h2>
                    <p style="margin-top: -10px;">Jalan Kesehatan No. 1 Kel. Minas Jaya Kec. Minas</p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <hr style="margin-top: -10px;">

                <div align="center">
                    <h3><strong>Laporan Data Pasien</strong></h3>
                </div>
                <table width="1000" border="1" cellspacing="5" cellpadding="5">
                    <thead style="background:#11c15b;color:white;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Pasien</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Tgl Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasien->result_array() as $dp) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $dp['kd_pasien']; ?></td>
                                <td><?php echo $dp['nm_pasien']; ?></td>
                                <td><?php echo $dp['umur']; ?></td>
                                <td><?php echo $dp['jekel']; ?></td>
                                <td><?php echo $dp['alamat']; ?></td>
                                <td><?php echo $dp['kota']; ?></td>
                                <td><?php echo $dp['pekerjaan']; ?></td>
                                <td><?php echo $dp['tgl_daftar']; ?></td>
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
</body>

</html>