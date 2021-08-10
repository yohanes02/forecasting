<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-10 col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title">P E R A M A L A N &nbsp; S T O K &nbsp; B A R A N G </h4>
                    <!-- /.box-title -->
                    <div class="card-content">

                        <!------ Message berhasil atau tidak ---------->
                        <?php echo $this->session->userdata('message'); ?>

                        <?php echo form_open_multipart('stocker/forcast/result', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="kode" class="col-sm-2 control-label">Stok Barang</label>
                            <div class="col-sm-10">
                                <select class="form-control select2_1" name="kode" required>

                                    <option value="">Pilih Kode Barang</option>
                                    <?php
                                    foreach ($barang->result_array() as $org) {
                                    ?>
                                        <option value="<?php echo $org['kode']; ?>"><?php echo $org['kode'] . ' - ' . $org['nm_barang']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_barang" class="col-sm-2 control-label">Bulan </label>
                            <?php
                            $a = date('m');
                            // $bln = $a + 1;
                            $bln = $a;
                            $tahun = date('Y');
                            ?>
                            <div class="col-sm-5">
                                <select class="form-control" name="bulan" required>
                                    <option value="<?= format_bulan(1) ?>" <?php if ($bln == 1) {
                                                                                echo 'selected';
                                                                            } ?>>Januari</option>
                                    <option value="<?= format_bulan(2) ?>" <?php if ($bln == 2) {
                                                                                echo 'selected';
                                                                            } ?>>Februari</option>
                                    <option value="<?= format_bulan(3) ?>" <?php if ($bln == 3) {
                                                                                echo 'selected';
                                                                            } ?>>Maret</option>
                                    <option value="<?= format_bulan(4) ?>" <?php if ($bln == 4) {
                                                                                echo 'selected';
                                                                            } ?>>April</option>
                                    <option value="<?= format_bulan(5) ?>" <?php if ($bln == 5) {
                                                                                echo 'selected';
                                                                            } ?>>Mei</option>
                                    <option value="<?= format_bulan(6) ?>" <?php if ($bln == 6) {
                                                                                echo 'selected';
                                                                            } ?>>Juni</option>
                                    <option value="<?= format_bulan(7) ?>" <?php if ($bln == 7) {
                                                                                echo 'selected';
                                                                            } ?>>Juli</option>
                                    <option value="<?= format_bulan(8) ?>" <?php if ($bln == 8) {
                                                                                echo 'selected';
                                                                            } ?>>Agustus</option>
                                    <option value="<?= format_bulan(9) ?>" <?php if ($bln == 9) {
                                                                                echo 'selected';
                                                                            } ?>>September</option>
                                    <option value="<?= format_bulan(10) ?>" <?php if ($bln == 10) {
                                                                                echo 'selected';
                                                                            } ?>>Oktober</option>
                                    <option value="<?= format_bulan(11) ?>" <?php if ($bln == 11) {
                                                                                echo 'selected';
                                                                            } ?>>November</option>
                                    <option value="<?= format_bulan(12) ?>" <?php if ($bln == 12) {
                                                                                echo 'selected';
                                                                            } ?>>Desember</option>

                                </select>
                            </div>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="tahun" value="<?= date('Y') ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group margin-bottom-0" style="margin-left: 65%;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">Ramalkan</button>
                                <a href="<?php echo site_url('') ?>" class="btn btn-sm btn-rounded btn-danger">Batal</a>
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