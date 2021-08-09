<?php
$this->load->view('tema2/head');
$this->load->view('tema2/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">D A T A &nbsp; O R D E R</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>

                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="background-color: #c13333;color:white;">ID Order</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Tanggal Order</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th style="background-color: #c13333;color:white;">Nama Supplier</th>
                                <th style="background-color: #c13333;color:white;">Harga</th>
                                <th width="3%" style="background-color: #c13333;color:white;">Jumlah</th>
                                <th width="3%" style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Total Harga</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Status</th>
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
                                    <td>
                                        <?php if ($dp['status_order'] == "completed") {
                                            echo '<button class="btn btn-rounded btn-xs btn-success">' . $dp["status_order"] . '</button>';
                                        } else {
                                            echo '<button class="btn btn-rounded btn-xs" style="background-color:#ffc800;color:black">' . $dp["status_order"] . '</button>';
                                        } ?>
                                    </td>
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