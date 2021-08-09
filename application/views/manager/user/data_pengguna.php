<?php
$this->load->view('tema2/head');
$this->load->view('tema2/sidebar');
?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">D A T A &nbsp; A K U N &nbsp; P E N G G U N A</h4>
                    <p class="box-title" style="border-bottom: 1px solid red;margin-top:-15px;"></p>
                    <p align="left">
                        <a href="<?php echo base_url(); ?>manager/pengguna/tambah" class="btn btn-sm btn-rounded btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah Data</a></p>

                    <!------ Message berhasil atau tidak ---------->
                    <?php echo $this->session->userdata('message'); ?>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="50px" style="background-color: #c13333;color:white;">No</th>
                                <th style="background-color: #c13333;color:white;">Username</th>
                                <th style="background-color: #c13333;color:white;">Nama lengkap</th>
                                <th style="background-color: #c13333;color:white;">Foto</th>
                                <th style="background-color: #c13333;color:white;">Level</th>
                                <th width="60px" style="background-color: #c13333;color:white;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengguna->result_array() as $dp) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $dp['username']; ?></td>
                                    <td><?php echo $dp['nama_lengkap']; ?></td>
                                    <td align="center">

                                        <!------- IF untuk avatar foto -------->
                                        <?php

                                        if ($dp['foto'] == '') {
                                            echo "<img width='40' height='40'  src='" . base_url() . "megaable/files/assets/images/user-b.png'>";
                                        } else {
                                            echo "<img width='40' height='50' src='" . base_url() . "assets/file_user/thumb/$dp[foto]'>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $dp['level']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>manager/pengguna/edit/<?php echo $dp['id_user']; ?>" title="ubah_v"><button class="btn btn-circle btn-sm btn-warning"><i class="ace-icon fa fa-pencil"></i></button>

                                            <a href="<?php echo base_url(); ?>manager/pengguna/hapus/<?php echo $dp['id_user']; ?>" onClick="return confirm('Anda Yakin..??');" title="hapus_v"><button class="btn btn-circle btn-sm btn-danger"><i class="ace-icon fa fa-trash-o"></i></button>
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