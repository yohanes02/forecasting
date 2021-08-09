<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>
<?php
foreach ($supplier->result_array() as $i) :
    $id_sup = $i['id_supplier'];
    $supplier = $i['nm_supplier'];
    $hp = $i['telp'];
    $alamat = $i['alamat'];
?>

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                <div class="col-lg-10 col-xs-12">
                    <div class="box-content card white">
                        <h4 class="box-title">E D I T &nbsp; D A T A &nbsp; S U P P L I E R</h4>
                        <!-- /.box-title -->
                        <div class="card-content">
                            <?php echo form_open_multipart('stocker/supplier/simpan_ubah', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label for="supplier" class="col-sm-2 control-label">Nama Supplier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo $supplier; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hp" class="col-sm-2 control-label">Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $hp; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <Textarea class="form-control" id="alamat" name="alamat" required><?php echo $alamat; ?></Textarea>
                                </div>
                            </div>
                            <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Edit</button>
                                    <a href="<?php echo site_url('stocker/supplier') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
                                </div>
                            </div>
                            <input type="hidden" name="id_sup" value="<?php echo $id_sup; ?>">
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