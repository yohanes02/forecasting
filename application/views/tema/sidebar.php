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

                <!-- 2. Menu Master Data -->
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-book-multiple"></i><span>Master Data</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="<?= base_url(); ?>stocker/barang"><i class="mdi mdi-briefcase"></i> Barang</a></li>
                        <li><a href="<?= base_url(); ?>stocker/satuan"><i class="fa fa-sitemap"></i> unit satuan</a></li>
                        <li><a href="<?= base_url(); ?>stocker/supplier"><i class="mdi mdi-truck-delivery"></i> Supplier</a></li>
                    </ul>
                    <!-- /.sub-menu js__content -->
                </li>

                <!-- 3. Menu Stock -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "stock") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }
                ?>
                <a class="waves-effect" href="<?= base_url(); ?>stocker/stock"><i class="menu-icon mdi mdi-database"></i><span>Stock</span></a>
                </li>

                <!-- 4. Menu Incoming -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "incoming") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }

                // hitung barang yang akan masuk
                $sql = $this->db->query("SELECT id_order FROM orders where status_order='approved'");
                $cek = $sql->num_rows();

                if ($cek > 0) {
                    $n = $cek;
                } else {
                    $n = 0;
                }
                ?>
                <a class="waves-effect" href="<?= base_url(); ?>stocker/incoming"><i class="menu-icon mdi mdi-checkbox-marked-circle-outline"></i><span>Incoming</span><span class="notice" style="background-color: yellow;color:black;"><?= $n; ?></span></a>
                </li>

                <!-- 5. Menu Used -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "used") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }
                ?>
                <a class="waves-effect" href="<?= base_url(); ?>stocker/used"><i class="menu-icon mdi mdi-logout-variant"></i><span>Used</span></a>
                </li>

                <!-- 6. Menu Request -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "req") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }
                ?>
                <a class="waves-effect" href="<?= site_url('stocker/req'); ?>"><i class="menu-icon mdi mdi-cart"></i><span>Request Order</span></a>
                </li>

                <!-- 7. Menu Forcasting -->
                <?php
                $url = $this->uri->segment(2);
                if ($url == "forcast") {
                    echo "<li class='active'>";
                } else {
                    echo "<li>";
                }
                ?>
                <a class="waves-effect" href="<?= base_url(); ?>stocker/forcast"><i class="menu-icon mdi mdi-recycle"></i><span>Peramalan Stok Barang</span></a>
                </li>
            </ul>
            <!-- /.menu js__accordion -->
            <h5 class="title">Extra</h5>
            <!-- /.title -->

            <ul class="menu js__accordion">

                <!-- 8. Laporan -->
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-note-text"></i><span>Laporan</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="<?= base_url(); ?>stocker/lapstock"><i class="mdi mdi-note-text"></i> Stock Barang</a></li>
                        <li><a href="<?= base_url(); ?>stocker/lapused"><i class="mdi mdi-note-text"></i> Penggunaan Stok</a></li>
                        <li><a href="<?= base_url(); ?>stocker/laporder"><i class="mdi mdi-note-text"></i> Request Order</a></li>
                        <li><a href="<?= base_url(); ?>stocker/lapincom"><i class="mdi mdi-note-text"></i> Penerimaan Barang</a></li>
                    </ul>
                    <!-- /.sub-menu js__content -->
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
                    <a href="<?= site_url('stocker/incoming') ?>">
                        <span class="avatar bg-success"><i class="fa fa-warning"></i></span>
                        <span class="name">Incoming Stock</span>
                        <span class="desc">Terdapat <?= $n; ?> Barang yang akan masuk, Harap Periksa !!</span>
                    </a>
                </li>
        </ul>
        <!-- /.notice-list -->
        <a href="<?= site_url('stocker/incoming') ?>" class="notice-read-more">Lihat Barang Yang Akan Masuk <i class="fa fa-angle-down"></i></a>

    <?php } else { ?>
        <li>
            <a href="#">
                <span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
                <span class="name">No Incoming</span>
                <span class="desc">Tidak ada stok barang masuk !</span>
            </a>
        </li>
    <?php } ?>


    </div>
    <!-- /.content -->
</div>
<!-- /#notification-popup -->