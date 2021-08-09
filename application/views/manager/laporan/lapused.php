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
                        <center>L A P O R A N &nbsp; P E N G G U N A A N &nbsp; B A R A N G </center>
                    </h4>

                    <div class="group-row">
                        <div class="box-body">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo form_open_multipart('Manager/lapused/set', 'class="form-horizontal"'); ?>
                                    <span style="color: red;">Tanggal Awal</span>
                                    <input type="date" name="tanggal_awal" style="height: 30px;border-color:red;color:red;" required>

                                    <span style="color: red;">Tanggal Akhir</span>
                                    <input type="date" name="tanggal_akhir" style="height: 30px;border-color:red;color:red;">

                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-search"></i></button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div><!-- /.form-group -->
                        </div>

                        <p style="margin-top: 15px;margin-left:-100px;">
                            <a href="<?php echo base_url(); ?>Manager/lapused/print" class="btn btn-xs btn-rounded btn-bordered btn-danger"><i class="fa fa-print"></i> Cetak</a>
                            <a href="<?php echo base_url(); ?>Manager/lapused/xls" class="btn btn-xs btn-rounded btn-bordered btn-danger"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                           
                        </p>
                    </div>

                    <table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Tgl Keluar</th>
                                <th style="background-color: #c13333;color:white;">Kode Barang</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty Stok</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty Keluar</th>
                                <th width="5%" style="background-color: #c13333;color:white;">End Stock</th>
                                <th width="6%" style="background-color: #c13333;color:white;">Satuan</th>
                                <th width="20%" style="background-color: #c13333;color:white;">Staff Gudang</th>
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
                                    <td><?php echo $dp['beg_qty']; ?></td>
                                    <td><?php echo $dp['qty_keluar']; ?></td>
                                    <td><?php echo $dp['end_qty']; ?></td>
                                    <td><?php echo $dp['unit']; ?></td>
                                    <td><?php echo $dp['staff_gudang']; ?></td>
                                </tr>
                            <?php
                                $no++;
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