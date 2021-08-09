<footer class="footer">
    <ul class="list-inline">
        <li><strong>2021 © PT Sepka Medika Alkesindo</strong></li>
    </ul>
</footer>
</div>
<!-- /.main-content -->
</div>

<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url(); ?>assets/scripts/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/scripts/modernizr.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/nprogress/nprogress.js"></script>
<script src="<?= base_url(); ?>assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/waves/waves.min.js"></script>

<script>
    function logout() {
        swal({
                title: "Keluar?",
                text: "Anda Yakin Ingin Keluar?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Saya Yakin",
                cancelButtonText: "Tidak, Tetap disini !",
                closeOnConfirm: false,
                closeOnCancel: false,
                confirmButtonColor: "#f60e0e"
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: '<?= base_url() ?>auth/logout',
                        error: function() {
                            alert('Something is wrong');
                        },
                        success: function(data) {
                            swal("Berhasil logout !", "Selamat Bertemu Kembali :)", "success");
                            location.reload();
                        }
                    });
                } else {
                    window.location = "<?= base_url() ?>"
                }
            });
    }
</script>

<!-- Morris Chart -->
<script src="<?= base_url(); ?>assets/plugin/chart/morris/morris.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chart/morris/raphael-min.js"></script>
<script src="<?= base_url(); ?>assets/scripts/chart.morris.init.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugin/select2/js/select2.min.js"></script>

<!-- Data Tables -->
<script src="<?= base_url(); ?>assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/scripts/datatables.demo.min.js"></script>

<script src="<?= base_url(); ?>assets/scripts/main.min.js"></script>

<!-- Demo Scripts -->
<script src="<?= base_url(); ?>assets/scripts/form.demo.min.js"></script>

<script>
    var serries = JSON.parse(`<?php echo $data; ?>`);
    console.log(serries);

    Morris.Line({
        element: 'graph',
        data: <?php echo $data; ?>,
        xkey: 'bulan',
        ykeys: ['forcasting', 'aktual'],
        labels: ['forcasting', 'aktual'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        parseTime: false,
        hideHover: true,
        lineWidth: '6px',
        stacked: true,
        behaveLikeLine: true,
        resize: true,
        pointFillColors: ['white'],
        pointStrokeColors: ['red'],
        lineColors: ['#fcb03b', '#ea65a2']
    });
</script>

</body>

</html>