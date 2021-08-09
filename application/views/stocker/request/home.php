<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">D A T A &nbsp; R E Q U E S T &nbsp; O R D E R</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>
                    <p align="left">
                        <a href="<?php echo base_url(); ?>stocker/req/tambah" class="btn btn-sm btn-rounded btn-bordered btn-danger"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Add New Request</a></p>

                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="50px" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Tanggal Permintaan</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th style="background-color: #c13333;color:white;">Qty</th>
                                <th style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Tanggal Kirim</th>
                                <th style="background-color: #c13333;color:white;">Status</th>
                                <th width="60px" style="background-color: #c13333;color:white;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($request->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($dp['tgl_request'])); ?></td>
                                    <td><?php echo $dp['nm_barang']; ?></td>
                                    <td><?php echo $dp['qty_barang']; ?></td>
                                    <td><?php echo $dp['unit']; ?></td>
                                    <td><?php echo $dp['tgl_kirim']; ?></td>
                                    <td>
                                        <?php if ($dp['status_request'] == "ordered") {
                                            echo '<button class="btn btn-rounded btn-xs btn-success" style="color:black">' . $dp["status_request"] . '</button>';
                                        } else {
                                            echo '<button class="btn btn-rounded btn-xs" style="background-color:#ffc800;color:black">' . $dp["status_request"] . '</button>';
                                        } ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>stocker/req/edit/<?php echo $dp['id_request']; ?>" title="ubah"><button class="btn btn-circle btn-sm btn-warning"><i class="ace-icon fa fa-pencil"></i></button>

                                            <a href="<?php echo base_url(); ?>stocker/req/hapus/<?php echo $dp['id_request']; ?>" onClick="return confirm('Anda Yakin..??');" title="hapus"><button class="btn btn-circle btn-sm btn-danger"><i class="ace-icon fa fa-trash-o"></i></button>
                                    </td>
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
        </div>


        <!--tambahkan custom js disini-->
        <?php
        $this->load->view('tema/foot');
        ?>