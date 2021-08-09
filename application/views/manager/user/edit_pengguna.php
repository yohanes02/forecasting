<?php
$this->load->view('tema2/head');
$this->load->view('tema2/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-10 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">E D I T &nbsp; D A T A &nbsp; P E N G G U N A</h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <?php echo form_open_multipart('manager/pengguna/simpan_ubah', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" placeholder="Masukkan Username Anda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="*******" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="Masukan Nama Lengkap Anda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="col-sm-2 control-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="userfile" name="userfile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">level</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="level" id="level" required>
                                    <option value=""> Pilih level </option>

                                    <?php
                                    $manager = "";
                                    $stocker = "";
                                    if ($level == "Manager") {
                                        $manager = 'selected="selected"';
                                        $stocker = "";
                                    } else if ($level == "Stocker") {
                                        $manager = '';
                                        $stocker = 'selected="selected"';
                                    } else {
                                        $manager = '';
                                        $stocker = '';
                                        $kosong1 = 'selected="selected"';
                                    }
                                    ?>
                                    <option value="Manager" <?php echo $manager; ?>>Manager</option>
                                    <option value="Stocker" <?php echo $stocker; ?>>Stocker</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Simpan</button>
                                <a href="<?php echo site_url('manager/pengguna') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
                            </div>
                        </div>
                        <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                        <input type="hidden" name="st" value="<?php echo $st; ?>">
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
        $this->load->view('tema2/foot');
        ?>