<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');

foreach ($order->result_array() as $i) :
    $idr = $i['id_order'];
    $kode = $i['kode'];
    $nm_barang = $i['nm_barang'];
    $qty = $i['qty_barang'];
    $unit = $i['unit'];
  
?>

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                <div class="col-lg-10 col-xs-12">
                    <div class="box-content card white">
                        <h4 class="box-title">P E N G E C E K A N &nbsp; S T O K &nbsp; B A R A N G &nbsp; M A S U K</h4>
                        <!-- /.box-title -->
                        <div class="card-content">
                            <?php echo form_open_multipart('stocker/order/cart', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label for="kd_barang" class="col-sm-3 control-label">Kode Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $kode; ?>" id="kd_barang" name="kd_barang" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nm_barang" class="col-sm-3 control-label">Nama Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $nm_barang; ?>" id="nm_barang" name="nm_barang" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga" class="col-sm-3 control-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $qty; ?>" id="jumlah" name="jumlah" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="satuan" class="col-sm-3 control-label">Satuan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $unit; ?>" id="unit" name="unit" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rusak" class="col-sm-3 control-label">Jumlah Tidak Sesuai</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="0" id="rusak" name="rusak" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ket" class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Ex: Rusak/Kadaluarsa" name="ket">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ket" class="col-sm-3 control-label">Tanggal Diterima</label>
                                <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="ket">
                                </div>
                            </div>

                            <input type="hidden" value="<?= $idr; ?>" name="id_order">

                            <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Simpan</button>
                                    <a href="<?php echo site_url('stocker/incoming') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.card-content -->
                    </div>
                    <!-- /.box-content -->
                </div>
                <!-- /.box-header -->
            <?php
        endforeach;
            ?>

            <!-- /.box-body -->
            </div>

            <!--tambahkan custom js disini-->
            <?php
            $this->load->view('tema/foot');
            ?>