<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
include('forcast2.php');
?>

<div id="wrapper">
	<?=
		print_r($allMae);
	?>
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
                            <?php
                                $a = array($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15);
                                $ft = array($ft1, $ft2, $ft3, $ft4, $ft5, $ft6, $ft7, $ft8, $ft9, $ft10, $ft11, $ft12, $ft13, $ft14, $ft15);
                                $e = array($E1, $e2, $e3, $e4, $e5, $e6, $e7, $e8, $e9, $e10, $e11, $e12, $e13, $e14, $e15);
                                $m = array($M1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10, $m11, $m12, $m13, $m14, $m15);
                                $index = 1;
                                for ($i=$n+1; $i <= $n+3 ; $i++) {
                                    if($i == 13 || $i == 14 || $i == 15) {
                                        echo "
                                        <tr>
                                            <td>$index</td>
                                            <td>".format_bulan($i-12)."</td>
                                            <td>".$a[$i-1]."</td>
                                            <td>".$ft[$i-1]."</td>
                                            <td>".$e[$i-1]."</td>
                                            <td>".$m[$i-1]."</td>
                                        </tr>
                                        ";
                                    } else {
                                        echo "
                                        <tr>
                                            <td>$index</td>
                                            <td>".format_bulan($i)."</td>
                                            <td>".$a[$i-1]."</td>
                                            <td>".$ft[$i-1]."</td>
                                            <td>".$e[$i-1]."</td>
                                            <td>".$m[$i-1]."</td>
                                        </tr>
                                        ";
                                    }
                                    $index++;
                                }
                            ?>
							<!-- <tr>
                                <td>1</td>
                                <td><?= format_bulan($n+1); ?></td>
                                <td><?= $a8; ?></td>
                                <td><?= $ft8; ?></td>
                                <td><?= $e8; ?></td>
                                <td><?= $m8; ?></td>
                            </tr>
							<tr>
                                <td>2</td>
                                <td><?= format_bulan($n+2); ?></td>
                                <td><?= $a9; ?></td>
                                <td><?= $ft9; ?></td>
                                <td><?= $e9; ?></td>
                                <td><?= $m9; ?></td>
                            </tr>
							<tr>
                                <td>3</td>
                                <td><?= format_bulan($n+3); ?></td>
                                <td><?= $a10; ?></td>
                                <td><?= $ft10; ?></td>
                                <td><?= $e10; ?></td>
                                <td><?= $m10; ?></td>
                            </tr> -->

                        </tbody>
                    </table>

                    <?php echo form_open_multipart('stocker/forcast/submit', 'class="form-horizontal"'); ?>

                    <!-- input hidden ke database forcasting -->
                    <input type="hidden" name="kode" value="<?= $this->session->userdata('kode') ?>">
                    <input type="hidden" name="bulan" value="<?= format_bulan($this->session->userdata('bul')) ?>">
                    <input type="hidden" name="tahun" value="<?= $this->session->userdata('tahun') ?>">
                    <input type="hidden" name="alpa" value="<?= $alpa ?>">
                    <!-- <input type="hidden" name="forcasting" value="<?= $ff ?>"> -->
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