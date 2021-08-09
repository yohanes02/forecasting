<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">D A T A &nbsp; B A R A N G</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>
                    <p align="left">
                        <a href="<?php echo base_url(); ?>stocker/barang/tambah" class="btn btn-sm btn-rounded btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah Data</a></p>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="6%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Kode Barang</th>
                                
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th style="background-color: #c13333;color:white;">Harga Barang</th>
                                <th style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Supplier</th>
                                <th width="10%" style="background-color: #c13333;color:white;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barang->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $dp['kode']; ?></td>
                                    
                                    <td><?php echo $dp['nm_barang']; ?></td>
                                    <td><?php echo $dp['harga']; ?></td>
                                    <td><?php echo $dp['unit']; ?></td>
                                    <td><?php echo $dp['nm_supplier']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>stocker/barang/edit/<?php echo $dp['kode']; ?>" title="ubah data"><button class="btn btn-circle btn-sm btn-warning"><i class="ace-icon fa fa-pencil"></i></button>

                                            <a href="<?php echo base_url(); ?>stocker/barang/hapus/<?php echo $dp['kode']; ?>" onClick="return confirm('Anda Yakin..??');" title="hapus data"><button class="btn btn-circle btn-sm btn-danger"><i class="ace-icon fa fa-trash-o"></i></button>
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