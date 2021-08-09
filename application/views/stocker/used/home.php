<?php
$this->load->view('tema/head');
$this->load->view('tema/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">P E N G G U N A A N &nbsp; S T O K &nbsp; B A R A N G</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Tgl Keluar</th>
                                <th style="background-color: #c13333;color:white;">Kode Barang</th>
                                <th style="background-color: #c13333;color:white;">Nama Barang</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty Stok</th>
                                <th width="5%" style="background-color: #c13333;color:white;">Qty Keluar</th>
                                <th width="5%" style="background-color: #c13333;color:white;">End Stock</th>
                                <th width="6%" style="background-color: #c13333;color:white;">Satuan</th>
                                <th style="background-color: #c13333;color:white;">Staff Gudang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($used->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($dp['tgl_keluar'])); ?></td>
                                    <td><?php echo $dp['kode']; ?></td>
                                    <td><?php echo $dp['nm_barang']; ?></td>
                                    <td><?php echo $dp['beg_qty']; ?></td>
                                    <td><?php echo $dp['qty_keluar']; ?></td>
                                    <td><?php echo $dp['end_qty']; ?></td>
                                    <td><?php echo $dp['unit']; ?></td>
                                    <td><?php echo $dp['staff_gudang']; ?></td>
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