<div class="row">
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                    <i class="fa fa-file-text"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    <strong>USER</strong><br>
                    <small><?= $total_user ?></small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                    <i class="gi gi-usd"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    <strong>Hama & Penyakit</strong><br>
                    <small><?= $hama_penyakit ?> </small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                    <i class="gi gi-envelope"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    <strong>Varietas</strong>
                    <small><?= $tbl_varietas ?></small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                    <i class="gi gi-picture"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    <strong>Komoditas</strong>
                    <small><?= $tbl_komoditas ?></small>
                </h3>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Description List Default Block -->
            <div class="block">
                <!-- Description List Default Title -->
                <div class="block-title">
                    <h2><strong>Sistem Informasi Budidaya</strong></h2>
                </div>
                <!-- END Description List Default Title -->

                <!-- Description List Default Content -->
                <dl>
                    <dt>Salah satu komoditas unggulan
                        hortikultura nasional adalah komoditas buah
                        mangga (Mangifera indica L). Selain diminati
                        oleh masyarakat, komoditas ini juga
                        berpontensi untuk meningkatkan kesejahteraan
                        petaninya karena memiliki nilai ekonomis yang
                        cukup tinggi. Pemasaran mangga oleh petani
                        ke pasar modern dan pasar ekspor merupakan
                        peluang yang besar karena petani sudah dapat
                        menghasilkan mangga dengan kualitas yang
                        baik dan dengan memasarkan hasil produksi
                        mangga ke pasar modern, maka nilai jual pun
                        akan meningkat dibandingkan dengan pasar
                        tradisional sehingga pendapatan petani pun
                        meningkat.
                        Terdapat beberapa daerah di Jawa
                        Barat yang merupakan sentra produksi mangga
                        diantaranya yaitu Kabupaten Indramayu,
                        Kabupaten Cirebon, Kabupaten Majalengka,
                        Kabupaten Kuningan, dan Kabupaten
                        Sumedang</dt>
                    <br>
                    <dt>Sistem Informasi Budidaya Mangga Inovasi Hortikultura berbasis web
                        merupakan sistem informasi untuk membantu petani atau penyuluh dalam memberikan
                        informasi budidaya dan penganggulangan hama penyakit komoditas hortikultura.
                        Selain itu juga merupakan pangkalan data yang menyimpan semua Informasi dari para
                        teknologi yang telah dihasilkan oleh Puslitbanghorti</dt>

                </dl>

                </dl>
                <!-- END  Default Content -->
            </div>
            <!-- END Description List Default Block -->
        </div>

    </div>
    <canvas id="myChart"></canvas>
    <?php
    //Inisialisasi nilai variabel awal
    $nama_jurusan = "";
    $jumlah = null;
    foreach ($hasil as $item) {
        $jur = $item->nmvarietas;
        $nama_jurusan .= "'$jur'" . ", ";
        $jum = $item->total;
        $jumlah .= "$jum" . ", ";
    }
    ?>
    <script src="<?php echo base_url() ?>/assets/Chartsjs/chart.js">
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: [<?php echo $nama_jurusan; ?>],
                datasets: [{
                    label: 'Data Jurusan Mahasiswa ',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                    borderColor: ['rgb(255, 99, 132)'],
                    data: [<?php echo $jumlah; ?>]
                }]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <!-- END Widget -->


    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="<?= base_url('assets/'); ?>js/vendor/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
    <script src="<?= base_url('assets/'); ?>js/app.js"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="<?= base_url('assets/'); ?>js/pages/compCharts.js"></script>
    <script>
        $(function() {
            CompCharts.init();
        });
    </script>
    </body>

    </html>