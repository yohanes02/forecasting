<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">D A T A &nbsp; S U P P L I E R</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>
                    <p align="left">
                        <a href="<?php echo base_url(); ?>stocker/supplier/tambah" class="btn btn-sm btn-rounded btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah Data</a></p>

                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="50px" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Nama Supplier</th>
                                <th style="background-color: #c13333;color:white;">No. Telp</th>
                                <th style="background-color: #c13333;color:white;">Alamat</th>
                                <th width="60px" style="background-color: #c13333;color:white;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($supplier->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $dp['nm_supplier']; ?></td>
                                    <td><?php echo $dp['telp']; ?></td>
                                    <td><?php echo $dp['alamat']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>stocker/supplier/edit/<?php echo $dp['id_supplier']; ?>" title="ubah_v"><button class="btn btn-circle btn-sm btn-warning"><i class="ace-icon fa fa-pencil"></i></button>

                                            <a href="<?php echo base_url(); ?>stocker/supplier/hapus/<?php echo $dp['id_supplier']; ?>" onClick="return confirm('Anda Yakin..??');" title="hapus_v"><button class="btn btn-circle btn-sm btn-danger"><i class="ace-icon fa fa-trash-o"></i></button>
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