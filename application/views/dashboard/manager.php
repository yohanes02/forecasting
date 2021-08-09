<?php
$this->load->view('tema2/head');
$this->load->view('tema2/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">

            <div class="col-lg-12 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title text-warning">Forcasting Stock Barang <span class="text-success">[<?= $namabarang; ?>]<span></h4>
                   
                    <!-- /.box-title -->
                    <div class="dropdown js__drop_down">
                        <form method="POST" action="<?= base_url() ?>dashboard/home">
                            <select class="form-control select2_1" name="year" id="year">
                                <?php
                                foreach ($tahun->result_array() as $dt) {
                                ?>
                                    <option value="<?php echo $dt['tahun']; ?>"><?php echo $dt['tahun'] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <select class="form-control select2_1" name="code" id="code">
                                <option value="">Pilih Kode Barang</option>
                                <?php
                                foreach ($barang->result_array() as $org) {
                                ?>
                                    <option value="<?php echo $org['kode']; ?>"><?php echo $org['kode'] . ' - ' . $org['nm_barang']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button class="btn btn-sm btn-primary btn-bordered">Proses</button>
                        </form>
                    </div>

                    <div id="graph" class="morris-chart" style="height: 200px"></div>
                    <div class="text-center">
                        <ul class="list-inline morris-chart-detail-list">
                            <li><i class="fa fa-circle"></i>Forcasting</li>
                            <li><i class="fa fa-circle"></i>Aktual</li>
                        </ul>
                    </div>
                    <!-- /#lines-morris-chart.morris-chart -->
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-lg-12 col-xs-12 -->
        </div>
        <!-- /.row -->

        <div class="row small-spacing">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <a href="<?= site_url('manager/approve'); ?>">
                    <div class="box-content bg-warning text-white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-shopping-cart"></i>
                            <p class="text text-white">DATA REQUEST</p>
                            <h2 class="counter"><?= $dtrequest ?></h2>
                        </div>
                    </div>
                    <!-- /.box-content -->
                </a>
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
            <div class="col-lg-3 col-md-6 col-xs-12">
                <a href="<?= site_url('manager/order'); ?>">
                    <div class="box-content bg-success text-white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-shopping-cart"></i>
                            <p class="text text-white">DATA ORDER</p>
                            <h2 class="counter"><?= $order ?></h2>
                        </div>
                    </div>
                    <!-- /.box-content -->
                </a>
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
            <div class="col-lg-3 col-md-6 col-xs-12">
                <a href="<?= site_url('manager/pengguna'); ?>">
                    <div class="box-content bg-info text-white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-users"></i>
                            <p class="text text-white">MANAGE USER</p>
                            <h2 class="counter"><?= $user ?></h2>
                        </div>
                    </div>
                    <!-- /.box-content -->
                </a>
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
            <div class="col-lg-3 col-md-6 col-xs-12">
                <a href="<?= site_url('manager/lapincom'); ?>">
                    <div class="box-content bg-danger text-white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-warning"></i>
                            <small class="text text-white">DEFECTIVE GOODS</small>
                            <h2 class="counter"><?= $rusak ?></h2>
                        </div>
                    </div>
                    <!-- /.box-content -->
                </a>
            </div>
            <!-- /.col-lg-3 col-md-6 col-xs-12 -->
        </div>
        <!-- .row -->

        <?php $this->load->view('tema2/foot'); ?>