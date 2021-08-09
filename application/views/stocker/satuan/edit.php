<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>
<?php
foreach ($satuan->result_array() as $i) :
    $idunit = $i['id_unit'];
    $unit = $i['unit'];
    $ket = $i['keterangan'];
?>

    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                <div class="col-lg-10 col-xs-12">
                    <div class="box-content card white">
                        <h4 class="box-title">E D I T &nbsp; U N I T &nbsp; S A T U A N</h4>
                        <!-- /.box-title -->
                        <div class="card-content">
                            <?php echo form_open_multipart('stocker/satuan/simpan_ubah', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $unit; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ket" class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ket" name="ket" value="<?php echo $ket; ?>" required>
                                </div>
                            </div>
                            <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Edit</button>
                                    <a href="<?php echo site_url('stocker/satuan') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
                                </div>
                            </div>
                            <input type="hidden" name="idunit" value="<?php echo $idunit; ?>">
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