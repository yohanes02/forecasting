    <?php
    $this->load->view('tema/head');
    $this->load->view('tema/sidebar');
    ?>

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">

                <div class="col-lg-4 col-xs-12">
                    <a href="<?= site_url('stocker/barang'); ?>">
                        <div class="box-content">
                            <h4 class="box-title text-info">Data Barang</h4>
                            <div class="content widget-stat">
                                <div id="traffic-sparkline-chart-1" class="left-content margin-top-15"></div>
                                <!-- /#traffic-sparkline-chart-1 -->
                                <div class="right-content">
                                    <h2 class="counter text-info"><?= $dtbarang; ?></h2>
                                    <!-- /.counter -->
                                    <p class="text text-info">Data Barang</p>
                                    <!-- /.text -->
                                </div>
                                <!-- .right-content -->
                            </div>
                            <!-- /.content widget-stat -->
                        </div>
                    </a>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-4 col-xs-12 -->

                <div class="col-lg-4 col-xs-12">
                    <a href="<?= site_url('stocker/stock'); ?>">
                        <div class="box-content">
                            <h4 class="box-title text-success">Persediaan Barang</h4>
                            <div class="content widget-stat">
                                <div id="traffic-sparkline-chart-2" class="left-content margin-top-10"></div>
                                <!-- /#traffic-sparkline-chart-2 -->
                                <div class="right-content">
                                    <h2 class="counter text-success"><?= $dtstock; ?></h2>
                                    <!-- /.counter -->
                                    <p class="text text-success">Data Persediaan</p>
                                    <!-- /.text -->
                                </div>
                                <!-- .right-content -->
                            </div>
                            <!-- /.content widget-stat -->
                        </div>
                    </a>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-4 col-xs-12 -->

                <div class="col-lg-4 col-xs-12">
                    <a href="<?= site_url('stocker/supplier'); ?>">
                        <div class="box-content">
                            <h4 class="box-title text-danger">Data Supplier</h4>
                            <div class="content widget-stat">
                                <div id="traffic-sparkline-chart-3" class="left-content"></div>
                                <!-- /#traffic-sparkline-chart-3 -->
                                <div class="right-content">
                                    <h2 class="counter text-danger"><?= $dtsupplier; ?> <i class="fa fa-angle-double-up"></i></h2>
                                    <!-- /.counter -->
                                    <p class="text text-danger">Data supplier</p>
                                    <!-- /.text -->
                                </div>
                                <!-- .right-content -->
                            </div>
                            <!-- /.content widget-stat -->
                        </div>
                    </a>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-4 col-xs-12 -->

                <div class="col-lg-13 col-xs-13">
                    <div class="box-content">
                        <h4 class="box-title text-warning">Forcasting Stock Barang <span class="text-success">[<?= $namabarang; ?>]<span></h4>
                        <div id="graph" class="morris-chart" style="height: 200px"></div>

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
                    <a href="<?= site_url('stocker/incoming'); ?>">
                        <div class="box-content bg-success text-white">
                            <div class="statistics-box with-icon">
                                <i class="ico small fa fa-truck"></i>
                                <p class="text text-white">STOCK INCOMING</p>
                                <h2 class="counter"><?= $dtincoming; ?></h2>
                            </div>
                        </div>
                    </a>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-3 col-md-6 col-xs-12 -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <a href="<?= site_url('stocker/used'); ?>">
                        <div class="box-content bg-info text-white">
                            <div class="statistics-box with-icon">
                                <i class="ico small fa fa-sign-out"></i>
                                <p class="text text-white">USED STOCK</p>
                                <h2 class="counter"><?= $dtused; ?></h2>
                            </div>
                        </div>
                    </a>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-3 col-md-6 col-xs-12 -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <a href="<?= site_url('stocker/req'); ?>">
                        <div class="box-content bg-warning text-white">
                            <div class="statistics-box with-icon">
                                <i class="ico small fa fa-shopping-cart"></i>
                                <p class="text text-white">REQUEST ORDER</p>
                                <h2 class="counter"><?= $dtrequest; ?></h2>
                            </div>
                        </div>
                    </a>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-3 col-md-6 col-xs-12 -->
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <a href="<?= site_url('stocker/lapincom'); ?>">
                        <div class="box-content bg-danger text-white">
                            <div class="statistics-box with-icon">
                                <i class="ico small fa fa-warning"></i>
                                <small class="text text-white">DEFECTIVE GOODS</small>
                                <h2 class="counter"><?= $rusak ?></h2>
                            </div>
                        </div>
                    </a>
                    <!-- /.box-content -->
                </div>
                <!-- /.col-lg-3 col-md-6 col-xs-12 -->
            </div>
            <!-- .row -->

            <?php $this->load->view('tema/foot'); ?>