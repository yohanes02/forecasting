<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-10 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">P E M A K A I A N &nbsp; S T O K &nbsp; B A R A N G </h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <?php echo form_open_multipart('stocker/stock/simpan', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="kode" class="col-sm-2 control-label">Kode Barang</label>
                            <div class="col-sm-10">
                                <select class="form-control select2_1" name="kodeb" id="kodeb" onchange="changeValue(this.value)" required>

                                    <option value="">Pilih Kode Barang</option>
                                    <?php
                                    $db = mysqli_connect('localhost', 'root', '', 'forecasting');
                                    $result = mysqli_query($db, "Select a.kode, a.nm_barang, b.unit from barang a left join satuan b on a.id_unit=b.id_unit");
                                    $jsArray = "var dtB = new Array();\n";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row['kode'] . '">' . $row['kode'] . ' - ' . $row['nm_barang'] . '</option>';
                                        $jsArray .= "dtB['" . $row['kode'] . "'] = {barang:'" . addslashes($row['nm_barang']) . "',unit:'" . addslashes($row['unit']) . "'};\n";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_barang" class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nm_barang" name="nm_barang" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl" value="<?= date("Y-m-d"); ?>" min="<?= date("Y-m-d"); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="unit" name="unit" readonly>
                            </div>
                        </div>

                        <script type="text/javascript">
                            <?php echo $jsArray; ?>

                            function changeValue(kodeb) {
                                document.getElementById('nm_barang').value = dtB[kodeb].barang;
                                document.getElementById('unit').value = dtB[kodeb].unit;
                            }
                        </script>

                        <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Simpan</button>
                                <a href="<?php echo site_url('stocker/stock') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
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