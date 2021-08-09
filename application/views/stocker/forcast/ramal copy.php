<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
include('forcast2.php');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content card">
                    <h4 class="box-title">
                        <center>
                            <h3>Forcasting Stock "<?= $this->session->userdata('barang'); ?>"</h3>
                        </center>
                    </h4>
                    <br>
                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Periode </th>
                                <th style="background-color: #c13333;color:white;">Aktual</th>
                                <th width="15%" style="background-color: #c13333;color:white;">Forcasting <span class="text-warning">[<?= $alpa ?>]</span></th>
                                <th width="5%" style="background-color: #c13333;color:white;">Eror</th>
                                <th width="6%" style="background-color: #c13333;color:white;">MAE</th>
                            </tr>
                        </thead>
                        <tbody>
							<tr>
                                <td>1</td>
                                <td><?= format_bulan($n+1); ?></td>
                                <td><?= $a9; ?></td>
                                <td><?= $ft9; ?></td>
                                <td><?= $e9; ?></td>
                                <td><?= $m9; ?></td>
                            </tr>
							<tr>
                                <td>1</td>
                                <td><?= format_bulan($n+2); ?></td>
                                <td><?= $a10; ?></td>
                                <td><?= $ft10; ?></td>
                                <td><?= $e10; ?></td>
                                <td><?= $m10; ?></td>
                            </tr>
							<tr>
                                <td>1</td>
                                <td><?= format_bulan($n+1); ?></td>
                                <td><?= $a9; ?></td>
                                <td><?= $ft9; ?></td>
                                <td><?= $e9; ?></td>
                                <td><?= $m9; ?></td>
                            </tr>
                            <!-- Data Pertama -->
                            <tr>
                                <td>1</td>
                                <td><?= format_bulan(1); ?></td>
                                <td><?= $a1; ?></td>
                                <td><?= $ft1; ?></td>
                                <td><?= $E1; ?></td>
                                <td><?= $M1; ?></td>
                            </tr>

                            <!-- Data Kedua -->
                            <?php if ($n > 2 || $ny == 1) {
                                echo '<tr>
                                <td>2</td>
                                <td>' . format_bulan(2) . '</td>
                                <td>' . $a2 . '</td>
                                <td>' . $ft2 . '</td>
                                <td>' . $e2 . '</td>
                                <td>' . $m2 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Ketiga -->
                            <?php if ($n > 3 || $ny == 1) {
                                echo '<tr>
                                <td>3</td>
                                <td>' . format_bulan(3) . '</td>
                                <td>' . $a3 . '</td>
                                <td>' . $ft3 . '</td>
                                <td>' . $e3 . '</td>
                                <td>' . $m3 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Keempat -->
                            <?php if ($n > 4 || $ny == 1) {
                                echo '<tr>
                                <td>4</td>
                                <td>' . format_bulan(4) . '</td>
                                <td>' . $a4 . '</td>
                                <td>' . $ft4 . '</td>
                                <td>' . $e4 . '</td>
                                <td>' . $m4 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Kelima -->
                            <?php if ($n > 5 || $ny == 1) {
                                echo '<tr>
                                <td>5</td>
                                <td>' . format_bulan(5) . '</td>
                                <td>' . $a5 . '</td>
                                <td>' . $ft5 . '</td>
                                <td>' . $e5 . '</td>
                                <td>' . $m5 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Keenam -->
                            <?php if ($n > 6 || $ny == 1) {
                                echo '<tr>
                                <td>6</td>
                                <td>' . format_bulan(6) . '</td>
                                <td>' . $a6 . '</td>
                                <td>' . $ft6 . '</td>
                                <td>' . $e6 . '</td>
                                <td>' . $m6 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Ketujuh -->
                            <?php if ($n > 7 || $ny == 1) {
                                echo '<tr>
                                <td>7</td>
                                <td>' . format_bulan(7) . '</td>
                                <td>' . $a7 . '</td>
                                <td>' . $ft7 . '</td>
                                <td>' . $e7 . '</td>
                                <td>' . $m7 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Kedelapan -->
                            <?php if ($n > 8 || $ny == 1) {
                                echo '<tr class="test">
                                <td>8</td>
                                <td>' . format_bulan(8) . '</td>
                                <td>' . $a8 . '</td>
                                <td>' . $ft8 . '</td>
                                <td>' . $e8 . '</td>
                                <td>' . $m8 . '</td>
                            </tr>';

							echo '<tr class="test">
                                <td>9</td>
                                <td>' . format_bulan(9) . '</td>
                                <td>' . $a9 . '</td>
                                <td>' . $ft9 . '</td>
                                <td>' . $e9 . '</td>
                                <td>' . $m9 . '</td>
                            </tr>';

							echo '<tr class="test">
                                <td>10</td>
                                <td>' . format_bulan(10) . '</td>
                                <td>' . $a10 . '</td>
                                <td>' . $ft10 . '</td>
                                <td>' . $e10 . '</td>
                                <td>' . $m10 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Kesembilan -->
                            <?php if ($n > 9 || $ny == 1) {

                                echo '<tr>
                                <td>9</td>
                                <td>' . format_bulan(9) . '</td>
                                <td>' . $a9 . '</td>
                                <td>' . $ft9 . '</td>
                                <td>' . $e9 . '</td>
                                <td>' . $m9 . '</td>
                            </tr>';


                            } ?>

                            <!-- Data Kesepuluh -->
                            <?php if ($n > 10 || $ny == 1) {
                                echo '<tr>
                                <td>10</td>
                                <td>' . format_bulan(10) . '</td>
                                <td>' . $a10 . '</td>
                                <td>' . $ft10 . '</td>
                                <td>' . $e10 . '</td>
                                <td>' . $m10 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Kesebelas -->
                            <?php if ($n > 11 || $ny == 1) {
                                echo '<tr>
                                <td>11</td>
                                <td>' . format_bulan(11) . '</td>
                                <td>' . $a11 . '</td>
                                <td>' . $ft11 . '</td>
                                <td>' . $e11 . '</td>
                                <td>' . $m11 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Kedua Belas -->
                            <?php if ($n > 12 || $ny == 1) {
                                echo '<tr>
                                <td>12</td>
                                <td>' . format_bulan(12) . '</td>
                                <td>' . $a12 . '</td>
                                <td>' . $ft12 . '</td>
                                <td>' . $e12 . '</td>
                                <td>' . $m12 . '</td>
                            </tr>';
                            } ?>

                            <!-- Data Nextyear -->
                            <?php if ($n == 1 && $ny == 1) {
                                $ff = $ft13;
                                echo '
                            <tr class="bg-warning text-white">
                                <td>13</td>
                                <td>' . format_bulan(1) . '</td>
                                <td></td>
                                <td>' . $ff . '</td>
                                <td></td>
                                <td>' . $cari . '</td>
                            </tr>';
                            } else { ?>


                                <!-- End Table Forcasting -->
                                <tr class="bg-warning text-white">
                                    <td><?php if ($n > 1) {
                                            echo $n;
                                        } ?>
                                    </td>
                                    <td><?php if ($n > 1) {
                                            echo format_bulan($n);
                                        } ?></td>
                                    <td><?=$a9?></td>
                                    <td>
                                        <?php
                                        if ($n == 1) {
                                            // echo $ft1;
                                            $ff = number_format($ft1, 3);
                                            echo $ff;
                                        } else if ($n == 2) {
                                            // echo $ft2;
                                            $ff = number_format($ft2, 3);
                                            echo $ff;
                                        } else if ($n == 3) {
                                            // echo $ft3;
                                            $ff = number_format($ft3, 3);
                                            echo $ff;
                                        } else if ($n == 4) {
                                            // echo $ft4;
                                            $ff = number_format($ft4, 3);
                                            echo $ff;
                                        } else if ($n == 5) {
                                            // echo $ft5;
                                            $ff = number_format($ft5, 3);
                                            echo $ff;
                                        } else if ($n == 6) {
                                            // echo $ft6;
                                            $ff = number_format($ft6, 3);
                                            echo $ff;
                                        } else if ($n == 7) {
                                            echo $ft7;
                                            $ff = number_format($ft7, 3);
                                        } else if ($n == 8) {
                                            echo $ft8;
                                            $ff = number_format($ft8, 3);
                                        } else if ($n == 9) {
                                            // echo $ft9;
                                            $ff = number_format($ft9, 3);
                                            echo $ff;
                                        } else if ($n == 10) {
                                            // echo $ft10;
                                            $ff = number_format($ft10, 3);
                                            echo $ff;
                                        } else if ($n == 11) {
                                            // echo $ft11;
                                            $ff = number_format($ft11, 3);
                                            echo $ff;
                                        } else if ($n == 12) {
                                            //echo $ft12;
                                            $ff = number_format($ft12, 3);
                                            echo $ff;
                                        }
                                        ?></td>
                                    <td><?=$e9?></td>
                                    <td><?= $m9; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                    <?php echo form_open_multipart('stocker/forcast/submit', 'class="form-horizontal"'); ?>

                    <!-- input hidden ke database forcasting -->
                    <input type="hidden" name="kode" value="<?= $this->session->userdata('kode') ?>">
                    <input type="hidden" name="bulan" value="<?= format_bulan($this->session->userdata('bul')) ?>">
                    <input type="hidden" name="tahun" value="<?= $this->session->userdata('tahun') ?>">
                    <input type="hidden" name="alpa" value="<?= $alpa ?>">
                    <input type="hidden" name="forcasting" value="<?= $ff ?>">
                    <input type="hidden" name="MAE" value="<?= $cari ?>">
                    <div class="form-group margin-bottom-0" style="margin-right: 0;">
                        <div class="col-sm-offset-10 col-sm-12">
                            <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Save</button>
                            <a href="<?php echo site_url('stocker/forcast') ?>" class="btn btn-sm btn-rounded btn-warning">Back</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <br>

                </div>
                <!-- /.box-body -->
            </div>
        </div>


        <!--tambahkan custom js disini-->
        <?php
        $this->load->view('tema/foot');
        ?>