<?php
$this->load->view('tema2/head');
$this->load->view('tema2/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content card">
                    <h4 class="box-title">
                        <center>L A P O R A N &nbsp; R E Q U E S T &nbsp; O R D E R &nbsp; ( O R ) </center>
                    </h4>

                    <div class="group-row">
                        <div class="box-body">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo form_open_multipart('Manager/laporder/set', 'class="form-horizontal"'); ?>
                                    <span style="color: red;">Tanggal Awal</span>
                                    <input type="date" name="tanggal_awal" style="height: 30px;border-color:red;color:red;" required>

                                    <span style="color: red;">Tanggal Akhir</span>
                                    <input type="date" name="tanggal_akhir" style="height: 30px;border-color:red;color:red;">

                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-search"></i></button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div><!-- /.form-group -->
                        </div>

                        <p align="right" style="margin-top: 15px;">
                            <a href="<?php echo base_url(); ?>Manager/laporder/print" class="btn btn-xs btn-rounded btn-bordered btn-danger"><i class="fa fa-print"></i> Cetak</a>
                            <a href="<?php echo base_url(); ?>Manager/laporder/xls" class="btn btn-xs btn-rounded btn-bordered btn-danger"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            
                        </p>
                    </div>

                    <table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="background-color: #c13333;color:white;">ID Order</th>
                                <th width="120px" style="background-color: #c13333;color:white;">Tanggal Order</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th style="background-color: #c13333;color:white;">Nama Supplier</th>
                                <th style="background-color: #c13333;color:white;">Harga</th>
                                <th width="3%" style="background-color: #c13333;color:white;">Jumlah</th>
                                <th width="3%" style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($order->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $dp['id_order']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($dp['tgl_request'])); ?></td>
                                    <td><?php echo $dp['nm_barang']; ?></td>
                                    <td><?php echo $dp['nm_supplier']; ?></td>
                                    <td><?php echo rupiah($dp['harga']); ?></td>
                                    <td><?php echo $dp['qty_barang']; ?></td>
                                    <td><?php echo $dp['unit']; ?></td>
                                    <td><?php echo rupiah($dp['harga_total']); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>


        <!--tambahkan custom js disini-->
        <?php
        $this->load->view('tema2/foot');
        ?>