<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-10 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">T A M B A H &nbsp; D A T A &nbsp; S U P P L I E R</h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <?php echo form_open_multipart('stocker/supplier/simpan', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="supplier" class="col-sm-2 control-label">Nama Supplier</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Masukkan Nama Supplier" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hp" class="col-sm-2 control-label">Telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="0761********" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <Textarea class="form-control" id="alamat" name="alamat" placeholder="Ex: Jl. Soekarno Hatta No. 2B, Pekanbaru" required></Textarea>
                            </div>
                        </div>

                        <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Simpan</button>
                                <a href="<?php echo site_url('stocker/supplier') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
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

        <!--tambahkan custom js disini-->
        <?php
        $this->load->view('tema/foot');
        ?>