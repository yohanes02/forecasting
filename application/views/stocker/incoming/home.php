<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">P E N E R I M A A N &nbsp; S T O K &nbsp; B A R A N G</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>
                    <p align="left">
                        <button class="btn btn-sm btn-rounded btn-bordered btn-danger" data-toggle="modal" data-target="#modal-order"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Add New Incoming</button>
                        <?php
                        // hitung barang yang akan masuk
                        $sql = $this->db->query("SELECT id_order FROM orders where status_order='approved'");
                        $cek = $sql->num_rows();

                        if ($cek > 0) {
                            echo '<i?>Tekan <b>Add New Incoming</b> untuk menerima barang masuk !!</i>';
                        } else {
                            echo '<i>Tidak ada barang yang akan masuk !!</i>';
                        }
                        ?>
                    </p>

                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Tgl Terima</th>
                                <th style="background-color: #c13333;color:white;">Supplier</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty Awal</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty Masuk</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Rusak</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty Stok</th>
                                <th width="6%" style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Staff Gudang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($incoming->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($dp['tgl_terima'])); ?></td>
                                    <td><?php echo $dp['nm_supplier']; ?></td>
                                    <td><?php echo $dp['nm_barang']; ?></td>
                                    <td><?php echo $dp['qty_awal']; ?></td>
                                    <td><?php echo $dp['qty_masuk']; ?></td>
                                    <td><?php echo $dp['minus']; ?></td>
                                    <td><?php echo $dp['qty_stock']; ?></td>
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
        $this->load->view('tema/foot');
        ?>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modal-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ModalCenterTitle">Pilih Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <form class="form-control" method="post" action="<?php echo base_url('stocker/order/check') ?>" id="form-order">
                                    <table class="table table-striped table-bordered table-hover" id="table-order">
                                        <thead>
                                            <tr>
                                                <th width="5%" style="background-color: #c13333;color:white;">Check</th>
                                                <th style="background-color: #c13333;color:white;">ID ORDER</th>
                                                <th width="15%" style="background-color: #c13333;color:white;">Tanggal Order</th>
                                                <th style="background-color: #c13333;color:white;">Nama Supplier</th>
                                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                                <th width="5%" style="background-color: #c13333;color:white;">Qty Masuk</th>
                                                <th width="5%" style="background-color: #c13333;color:white;">Satuan</th>
                                                <th width="15%" style="background-color: #c13333;color:white;">Tanggal kirim</th>
                                                <th width="5%" style="background-color: #c13333;color:white;">Status Order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($orders->result_array() as $dp) {
                                            ?>
                                                <tr>
                                                    <td><input style="height: 20px;width: 20px;" type="checkbox" class="check-item btn" name="id_order" value="<?php echo $dp['id_order']; ?>"></td>
                                                    <td><?php echo $dp['id_order']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($dp['tanggal_order'])); ?></td>
                                                    <td><?php echo $dp['nm_supplier']; ?></td>
                                                    <td><b><?php echo $dp['nm_barang']; ?></b></td>
                                                    <td><?php echo $dp['qty_barang']; ?></td>
                                                    <td><?php echo $dp['unit']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($dp['tgl_kirim'])); ?></td>
                                                    <td><?php echo $dp['status_order']; ?></td>
                                                </tr>
                                            <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-rounded" id="btn-pilih">Receive</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        if ($incom > 0) {
            echo "<script>$('#modal-order').modal('show');</script>";
        }
        ?>

        </html>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#table-order').DataTable({
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function(row) {
                                    var data = row.data();
                                    return 'Details for ' + data[1];
                                }
                            }),
                            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                tableClass: 'table'
                            })
                        }
                    }
                });
            });
        </script>