<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-10 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">A D D &nbsp; R E Q U E S T &nbsp; O R D E R</h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <?php echo form_open_multipart('stocker/req/simpan', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="kode" class="col-sm-2 control-label">Kode Barang</label>
                            <div class="col-sm-10">
                                <select class="form-control select2_1" name="kodeb" id="kodeb" onchange="changeValue(this.value)" required>

                                    <option value="">Pilih Kode Barang</option>
                                    <?php
                                    $db = mysqli_connect('localhost', 'root', '', 'forecasting');
                                    $result = mysqli_query($db, "Select a.kode, a.nm_barang, b.unit, c.quality from barang a left join satuan b on a.id_unit=b.id_unit left join stock c on a.kode=c.kode");
                                    $jsArray = "var dtB = new Array();\n";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row['kode'] . '">' . $row['kode'] . ' - ' . $row['nm_barang'] . '</option>';
                                        $jsArray .= "dtB['" . $row['kode'] . "'] = {barang:'" . addslashes($row['nm_barang']) . "',unit:'" . addslashes($row['unit']) . "',sisa:'" . addslashes($row['quality']) . "'};\n";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_barang" class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="background-color: #fde11a5e;" id="nm_barang" name="nm_barang" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="col-sm-2 control-label">Jumlah Barang</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                            </div>
                            <label for="sisa" class="col-sm-2 control-label">Sisa Stock</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" style="background-color: #fde11a5e;" id="sisa" name="sisa" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="background-color: #fde11a5e;" id="unit" name="unit" readonly>
                            </div>
                        </div>

                        <script type="text/javascript">
                            <?php echo $jsArray; ?>

                            function changeValue(kodeb) {
                                document.getElementById('nm_barang').value = dtB[kodeb].barang;
                                document.getElementById('unit').value = dtB[kodeb].unit;
                                document.getElementById('sisa').value = dtB[kodeb].sisa;
                            }
                        </script>

                        <div class="form-group">
                            <label for="tgl_kirim" class="col-sm-2 control-label">Tanggal Kirim</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_kirim" name="tgl_kirim" required>
                            </div>
                        </div>
                        <br>

                        <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Simpan</button>
                                <a href="<?php echo site_url('stocker/req') ?>" class="btn btn-sm btn-rounded btn-warning">Batal</a>
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