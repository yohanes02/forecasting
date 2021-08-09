<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">D A T A &nbsp; S T O K &nbsp; B A R A N G</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>
                    <p align="left">
                        <a href="<?php echo base_url(); ?>stocker/stock/use" class="btn btn-sm btn-rounded btn-bordered btn-danger"><i class="glyphicon glyphicon-minus glyphicon-white"></i> Use Stock</a></p>

                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="6%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Kode Barang</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th style="background-color: #c13333;color:white;">Qty Stock</th>
                                <th style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Min Stock</th>
                                <th width="10%" style="background-color: #c13333;color:white;">Status</th>
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
                                    <td><?php echo $dp['min_stock']; ?></td>
                                    <td>
                                        <?php if ($dp['quality'] < 1) {
                                            echo '' . $dp["status"] . '</button>';
                                        } else if ($dp['quality'] > $dp['min_stock']) {
                                            echo '' . $dp["status"] . '</button>';
                                        } else {
                                            echo '' . $dp["status"] . '</button>';
                                        } ?>
                                    </td>
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