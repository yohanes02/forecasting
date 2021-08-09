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

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Laporan Data Dokter
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Laporan Data Dokter</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
            <p align="left">
                <a href="<?php echo base_url(); ?>laporan/dokter/export" target="_blank" class="btn btn-primary"><i class="glyphicon glyphicon-file glyphicon-white"></i> Excel</a>
                <a href="<?php echo base_url(); ?>laporan/dokter/cetak" target="_blank" class="btn btn-danger"><i class="glyphicon glyphicon-print glyphicon-white"></i> Cetak </a>
            </p>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px" style="background-color: rgb(46, 132, 33);color:white;">No</th>
                        <th style="background-color: rgb(46, 132, 33);color:white;">Kode Dokter</th>
                        <th style="background-color: rgb(46, 132, 33);color:white;">Nama Dokter</th>
                        <th style="background-color: rgb(46, 132, 33);color:white;">Jenis Kelamin</th>
                        <th style="background-color: rgb(46, 132, 33);color:white;">Alamat</th>
                        <th style="background-color: rgb(46, 132, 33);color:white;">Kota</th>
                        <th style="background-color: rgb(46, 132, 33);color:white;">No telp</th>
                        <th style="background-color: rgb(46, 132, 33);color:white;">Poliknik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($dokter->result_array() as $dp) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $dp['kd_dokter']; ?></td>
                            <td><?php echo $dp['nm_dokter']; ?></td>
                            <td><?php echo $dp['jekel']; ?></td>
                            <td><?php echo $dp['alamat']; ?></td>
                            <td><?php echo $dp['kota']; ?></td>
                            <td><?php echo $dp['no_telp']; ?></td>
                            <td><?php echo $dp['jenis_poli']; ?></td>
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