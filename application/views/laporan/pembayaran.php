<?php
if ($this->session->userdata("level") == "Admin") {
    $this->load->view('tema/head');
    $this->load->view('tema/topbar');
    $this->load->view('tema/sidebar');
} else {
    $this->load->view('usertema/head');
    $this->load->view('usertema/topbar');
    $this->load->view('usertema/sidebar');
}
?>

<!-- Main content -->
<section class="content">

    <div class="row">
        <?php echo form_open_multipart('laporan/pembayaran/set', 'class="form-horizontal"'); ?>

        <div class="col-xs-12">
            <div class="box box">
                <div class="box-header">
                    <h3 style="color: green;margin-right: 10px;"><b>Laporan Data Pembayaran</b></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="box-body">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input class="form-control" type="date" name="tanggal_awal">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="tanggal_akhir">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tanggal_awal">Cari</label>
                                <button type="submit" class="btn btn-primary form-control"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div><!-- /.form-group -->
                    </div>

                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <?php echo form_close(); ?>
    </div>

    <div class="box">
        <div class="box-body">

            <?php
            if ($this->session->userdata("tanggal_awal") != "") {
                $data = "exporttgl";
                $data2 = "cetaktgl";
            } else {
                $data = "export";
                $data2 = "cetak";
            }
            ?>
            <p align="left">
                <a href="<?php echo base_url(); ?>laporan/pembayaran/<?= $data; ?>" target="_blank" class="btn btn-primary"><i class="glyphicon glyphicon-file glyphicon-white"></i> Excel</a>
                <a href="<?php echo base_url(); ?>laporan/pembayaran/<?= $data2; ?>" target="_blank" class="btn btn-danger"><i class="glyphicon glyphicon-print glyphicon-white"></i> Cetak </a>
            </p>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px" style="background-color:rgb(46, 132, 33);;color:white;">No</th>
                        <th style="background-color:rgb(46, 132, 33);color:white;">No. Regis</th>
                        <th style="background-color:rgb(46, 132, 33);color:white;">Tanggal</th>
                        <th style="background-color:rgb(46, 132, 33);color:white;">Kode Pasien</th>
                        <th style="background-color:rgb(46, 132, 33);color:white;">Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pembayaran->result_array() as $dp) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $dp['no_regis']; ?></td>
                            <td><?php echo $dp['tgl']; ?></td>
                            <td><?php echo $dp['kd_pasien']; ?></td>
                            <td><?php echo $dp['totalbiaya']; ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

</section><!-- /.content -->

<!--tambahkan custom js disini-->
<?php
if ($this->session->userdata("level") == "Admin") {
    $this->load->view('tema/foot');
} else {
    $this->load->view('usertema/foot');
}
?>