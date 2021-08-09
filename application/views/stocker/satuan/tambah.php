<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-10 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">T A M B A H &nbsp; U N I T &nbsp; S A T U A N</h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <?php echo form_open_multipart('stocker/satuan/simpan', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ket" class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukan Keterangan" required>
                            </div>
                        </div>

                        <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Simpan</button>
                                <a href="<?php echo site_url('stocker/satuan') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
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