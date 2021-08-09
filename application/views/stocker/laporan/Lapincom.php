<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<!-- Modal Pemberitahuan -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-danger">
                    <i class="ico fa fa-warning" style="color: red;"></i> Pemberitahuan
                </h3>
            </div>
            <div class="modal-body">
                <h5>Harap memilih tanggal terlebih dahulu, untuk mencetak <b>Report Quality Supply</b> !!</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-xs btn-primary btn-rounded" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Pengisian RQS -->
<div id="modalrqs" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ce4848;">
                <h3 class="modal-title text-white">
                    <i class="ico fa fa-warning" style="color: white;"></i> Filter Report Quality Supply
                </h3>
            </div>
            <form method="post" action="<?php echo base_url('stocker/lapincom/rqs') ?>" id="form-rqs">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="tgl" class="col-sm-3 control-label">Tanggal </label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="nm_barang" value="<?= $this->session->userdata('tg1'); ?>" required>
                            </div>
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <label for="supplier" class="col-sm-3 control-label">Supplier </label>
                            <div class="col-sm-9">
                                <select class="select2_1" name="supplier" required style="width: 100%;">

                                    <option value="">Pilih Supplier</option>
                                    <?php
                                    foreach ($supplier->result_array() as $dt) {
                                    ?>
                                        <option value="<?php echo $dt['id_supplier']; ?>"><?php echo $dt['nm_supplier']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-rounded" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-success btn-rounded">Cetak</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content card">
                    <h4 class="box-title">
                        <center>L A P O R A N &nbsp; P E N E R I M A A N &nbsp; B A R A N G </center>
                    </h4>
                    <br>

                    <div class="group-row" style="position:absolute;z-index:2;">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo form_open_multipart('stocker/lapincom/set', 'class="form-horizontal"'); ?>
                                    <span style="color: red;">Filter Tanggal :</span>
                                    <input type="date" name="tanggal_awal" style="height: 30px;border-color:red;color:red;">
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-search"></i></button>
                                    <span style="margin-left: 10px;">
                                        <a href="<?php echo base_url(); ?>stocker/lapincom/print" class="btn btn-xs btn-rounded btn-bordered btn-danger"><i class="fa fa-print"></i> Cetak</a>
                                       

                                       
                                    </span>
                                    <?php echo form_close(); ?>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    </div>

                    <table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
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
                                    <?php
                                    $n = $dp['minus'];
                                    if ($n > 0) {
                                        echo "<td style='background-color:yellow;'><b>$n</b></td>";
                                    } else {
                                        echo "<td>$n</td>";
                                    }
                                    ?>
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