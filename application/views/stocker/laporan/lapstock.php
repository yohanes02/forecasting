<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content card">
                    <h4 class="box-title">
                        <center>L A P O R A N &nbsp; S T O K &nbsp; B A R A N G </center>
                    </h4>

                    <p class="form-group" align="right" style="margin-top: 15px;">
                        <a href="<?php echo base_url(); ?>stocker/lapstock/print" class="btn btn-xs btn-rounded btn-bordered btn-danger"><i class="fa fa-print"></i> Cetak</a>
                        <a href="<?php echo base_url(); ?>stocker/lapstock/xls" class="btn btn-xs btn-rounded btn-bordered btn-danger"><i class="fa fa-file-excel-o"></i> Download Excel</a>
                        
                    </p>


                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="6%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Kode Barang</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th style="background-color: #c13333;color:white;">Qty Stock</th>
                                <th style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Supplier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($stock->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $dp['kode']; ?></td>
                                    <td><?php echo $dp['nm_barang']; ?></td>
                                    <td><?php echo $dp['quality']; ?></td>
                                    <td><?php echo $dp['unit']; ?></td>
                                    <td><?php echo $dp['nm_supplier']; ?></td>
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
        $this->load->view('tema/foot');
        ?>