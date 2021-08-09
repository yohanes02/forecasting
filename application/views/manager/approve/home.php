<?php
$this->load->view('tema2/head');
$this->load->view('tema2/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">D A T A &nbsp; R E Q U E S T &nbsp; O R D E R</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>

                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Tanggal Order</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th style="background-color: #c13333;color:white;">Nama Supplier</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Harga</th>
                                <th style="background-color: #c13333;color:white;">Tanggal Kirim</th>
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
                                    <td><?php echo date("d-m-Y", strtotime($dp['tgl_request'])) ?></td>
                                    <td><?php echo $dp['nm_barang']; ?></td>
                                    <td><?php echo $dp['nm_supplier']; ?></td>
                                    <td><?php echo $dp['qty_barang']; ?></td>
                                    <td><?php echo $dp['unit']; ?></td>
                                    <td><?php echo $dp['harga']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($dp['tgl_kirim'])) ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>manager/approve/edit/<?php echo $dp['id_request']; ?>" title="ubah"><button class="btn btn-circle btn-sm btn-danger"><i class="ace-icon fa fa-pencil"></i></button>

                                            <a href="<?php echo base_url(); ?>manager/approve/acc/<?php echo $dp['id_request']; ?>" onClick="return confirm('Apakah anda yakin setuju order barang ini ??');" title="Acc"><button class="btn btn-circle btn-sm btn-success"><i class="ace-icon fa fa-check"></i></button>
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
        $this->load->view('tema2/foot');
        ?>