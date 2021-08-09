<div class="main-menu">
    <header class="header">
        <a href="<?= base_url(); ?>" class="logo"><i class="ico mdi mdi-kodi"></i>Stock Forecasting</a>
        <button type="button" class="button-close fa fa-times js__menu_close"></button>
        <div class="user">

            <!------- IF untuk avatar foto -------->
            <?php
            $iu = $this->session->userdata('id_user');
            $avatar = $this->db->query("select foto from users where id_user=$iu");
            foreach ($avatar->result_array() as $r) {
                if ($r['foto'] == '') { ?>
                    <a class="avatar"><img src="<?= base_url(); ?>assets/file_user/user_b.png" alt=""><span class="status online"></span></a>
                <?php } else { ?>
                    <a class="avatar"><img src="<?= base_url(); ?>assets/file_user/<?= $r['foto']; ?>" alt=""><span class="status online"></span></a>
            <?php
                }
            }
            ?>

            <h5 class="name"><a href="#"><?= $this->session->userdata('nama_lengkap'); ?></a></h5>
            <h5 class="position"><?= $this->session->userdata('level'); ?></h5>
            <!-- /.name -->
            <div class="control-wrap js__drop_down">
                <i class="fa fa-caret-down js__drop_down_button"></i>
                <div class="control-list">
                    <div class="control-item"><a href="profile.html"><i class="fa fa-user"></i> Profile</a></div>
                    <div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div>
                    <div class="control-item"><a onclick="logout()"><i class="fa fa-sign-out"></i> Log out</a></div>
                </div>
                <!-- /.control-list -->
            </div>
            <!-- /.control-wrap -->
        </div>
        <!-- /.user -->
    </header>
    <!-- /.header -->
    <div class="content">

        <div class="navigation">
            <h5 class="title">Navigation</h5>
            <!-- /.title -->
            <ul class="menu js__accordion">

                <!-- 1. Menu Home -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "home") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }
                ?>
                <a class="waves-effect" href="<?= base_url(); ?>"><i class="menu-icon mdi mdi-home"></i><span>Home</span></a>
                </li>

                <!-- 2. Approve -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "approve") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }

                // hitung request order
                $sql = $this->db->query("SELECT id_request FROM request where status_request='proccessed'");
                $cek = $sql->num_rows();

                if ($cek > 0) {
                    $n = $cek;
                } else {
                    $n = 0;
                }
                ?>
                <a class="waves-effect" href="<?= base_url(); ?>manager/approve"><i class="menu-icon mdi mdi-check-circle-outline"></i><span>Approve</span><span class="notice" style="background-color: yellow;color:black;"><?= $n; ?></span></a>
                </li>

                <!-- 2. Approve -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "order") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }
                ?>
                <a class="waves-effect" href="<?= base_url(); ?>manager/order"><i class="menu-icon mdi mdi-cart"></i><span>Order</span></a>
                </li>
            </ul>
            <!-- /.menu js__accordion -->
            <h5 class="title">Extra</h5>
            <!-- /.title -->

            <ul class="menu js__accordion">
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-note-text"></i><span>Laporan</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="<?= base_url(); ?>manager/lapstock"><i class="mdi mdi-note-text"></i> Stock Barang</a></li>
                        <li><a href="<?= base_url(); ?>manager/lapused"><i class="mdi mdi-note-text"></i> Penggunaan Barang</a></li>
                        <li><a href="<?= base_url(); ?>manager/laporder"><i class="mdi mdi-note-text"></i> Pengorderan Barang</a></li>
                        <li><a href="<?= base_url(); ?>manager/lapincom"><i class="mdi mdi-note-text"></i> Penerimaan Barang</a></li>
                    </ul>
                    <!-- /.sub-menu js__content -->
                </li>

                <!-- 8. Menu Pengguna -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "pengguna") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }
                ?>
                <a class="waves-effect" href="<?= site_url('manager/pengguna'); ?>"><i class="menu-icon mdi mdi-account"></i><span>Akun</span></a>
                </li>

                <li>
                    <a class="waves-effect" onclick="logout()"><i class="menu-icon mdi mdi-logout"></i><span>Logout</span></a>
                </li>
            </ul>
            <!-- /.menu js__accordion -->
        </div>
        <!-- /.navigation -->
    </div>
    <!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title">Home</h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">
        <div class="ico-item">
            <a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
            <form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
            <!-- /.searchform -->
        </div>
        <!-- /.ico-item -->
        <a href="#" class="ico-item pulse"><span class="ico-item mdi mdi-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
        <a href="#" class="ico-item mdi mdi-logout" onclick="logout()"></a>
    </div>
    <!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
    <h2 class="popup-title">Your Notifications</h2>
    <!-- /.popup-title -->
    <div class="content">
        <ul class="notice-list">

            <?php if ($n > 0) { ?>
                <li>
                    <a href="<?= site_url('manager/approve') ?>">
                        <span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
                        <span class="name">Request Order</span>
                        <span class="desc"><?= $n ?> Data Permintaan order stok barang !</span>
                    </a>
                </li>
        </ul>
        <!-- /.notice-list -->
        <a href="<?= site_url('manager/approve') ?>" class="notice-read-more">Lihat data permintaan order stok <i class="fa fa-angle-down"></i></a>
    <?php } else { ?>
        <li>
            <a href="<?= site_url('manager/approve') ?>">
                <span class="avatar bg-danger"><i class="fa fa-warning"></i></span>
                <span class="name">No Request Order</span>
                <span class="desc">Tidak ada Permintaan Stok !!</span>
            </a>
        </li>
    <?php } ?>

    </div>
    <!-- /.content -->
</div>
<!-- /#notification-popup -->