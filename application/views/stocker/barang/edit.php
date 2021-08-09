<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>
<?php
foreach ($barang->result_array() as $i) :
    $kode = $i['kode'];
   
    $nm_barang = $i['nm_barang'];
    $harga = $i['harga'];
    $id_unit = $i['id_unit'];
    $id_supplier = $i['id_supplier'];
?>

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                <div class="col-lg-10 col-xs-12">
                    <div class="box-content card white">
                        <h4 class="box-title">E D I T &nbsp; D A T A &nbsp; B A R A N G</h4>
                        <!-- /.box-title -->
                        <div class="card-content">
                            <?php echo form_open_multipart('stocker/barang/simpan_ubah', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label for="kode" class="col-sm-2 control-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nm_barang" class="col-sm-2 control-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_barang" name="nm_barang" value="<?= $nm_barang; ?>" placeholder="Masukkan Nama Barang" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga" class="col-sm-2 control-label">Harga Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga; ?>" placeholder="Masukkan Harga Barang" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_satuan" required="">
                                        <option value="">Pilih Satuan</option>

                                        <?php
                                        foreach ($satuan->result_array() as $j) {
                                            if ($id_unit == $j['id_unit']) {
                                        ?>
                                                <option value="<?php echo $j['id_unit']; ?>" selected="selected"><?php echo $j['unit']; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?php echo $j['id_unit']; ?>"><?php echo $j['unit']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier" class="col-sm-2 control-label">Supplier</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_supplier" required="">
                                        <option value="">Pilih Supplier</option>

                                        <?php
                                        foreach ($supplier->result_array() as $j) {
                                            if ($id_supplier == $j['id_supplier']) {
                                        ?>
                                                <option value="<?php echo $j['id_supplier']; ?>" selected="selected"><?php echo $j['nm_supplier']; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?php echo $j['id_supplier']; ?>"><?php echo $j['nm_supplier']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Edit</button>
                                    <a href="<?php echo site_url('stocker/barang') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.card-content -->
                    </div>
                    <!-- /.box-content -->
                </div>
                <!-- /.box-header -->


                <!-- /.box-body -->
            </div>
        <?php
    endforeach;
        ?>
        <!--tambahkan custom js disini-->
        <?php
        $this->load->view('tema/foot');
        ?>