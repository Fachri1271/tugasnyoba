<?php if (!defined('BASEPATH')) exit('No direct script access allowed');    ?>

<ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
    <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
    <li class="nav-item" data-option-value=".websites"><a class="nav-link text-1 text-uppercase" href="#">Websites</a></li>
    <li class="nav-item" data-option-value=".logos"><a class="nav-link text-1 text-uppercase" href="#">Logos</a></li>
    <li class="nav-item" data-option-value=".brands"><a class="nav-link text-1 text-uppercase" href="#">Brands</a></li>
    <li class="nav-item" data-option-value=".medias"><a class="nav-link text-1 text-uppercase" href="#">Medias</a></li>
</ul>


<div class="container py-md-4">
    <div class="row d-flex justify-content-center text-center">
        <div class="center">
            <?php foreach ($budidaya as $key => $value) {
            ?>
                <div class="card-deck">
                    <div class="card">
                        <img src="<?= base_url('assets/'); ?>img/balitsa2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Balai Penelitian Tanaman Sayuran
                                (Balitsa)</h5>
                            <p class="card-text">Jl. Tangkuban Perahu 517 Kotak Pos 8413 Lembang 40391 Jawa Barat</p>
                            <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>

                        </div>
                    </div>
                    <div class="card">
                        <img src="<?= base_url('assets/'); ?>img/balitbu.jpg" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title">Balai Penelitian Tanaman Buah Tropika (Balitbu Tropika)</h5>
                            <p class="card-text">Jl. Raya Solok Aripan Km. 8 Solok 27351 Sumatera Barat</p>
                            <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>

                        </div>
                    </div>

                    <div class="card">
                        <img src="<?= base_url('assets/'); ?>img/bls2.jpg" class="card-img-top" alt="...">

                        <div class="card-body">

                            <h5 class="card-title">Balai Penelitian Tanaman Hias
                                (Balithi)</h5>
                            <br>
                            <p class="card-text">Jl. Raya Ciherang, Pacet, PO.Box 8 SDL Cianjur 43253 Jawa Barat</p>
                            <br>
                            <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>

                        </div>
                    </div>
                    <div class="card">
                        <img src="<?= base_url('assets/'); ?>img/Balitjestro.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Balai Penelitian Tanaman Jeruk dan Buah Sub Tropik (Balitjestro)</h5>
                            <p class="card-text">Jl. Raya Tlekung No.1 Junrejo Kota Batu 65301 Jawa Timur</p>
                            <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container py-md-4">
    <div class="row d-flex justify-content-center text-center">
        <div class="center">

            <div class="card-deck">
                <div class="card">
                    <img src="<?= base_url('assets/'); ?>img/balitsa2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Balai Penelitian Tanaman Sayuran
                            (Balitsa)</h5>
                        <p class="card-text">Jl. Tangkuban Perahu 517 Kotak Pos 8413 Lembang 40391 Jawa Barat</p>
                        <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>

                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('assets/'); ?>img/balitbu.jpg" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title">Balai Penelitian Tanaman Buah Tropika (Balitbu Tropika)</h5>
                        <p class="card-text">Jl. Raya Solok Aripan Km. 8 Solok 27351 Sumatera Barat</p>
                        <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>

                    </div>
                </div>

                <div class="card">
                    <img src="<?= base_url('assets/'); ?>img/bls2.jpg" class="card-img-top" alt="...">

                    <div class="card-body">

                        <h5 class="card-title">Balai Penelitian Tanaman Hias
                            (Balithi)</h5>
                        <br>
                        <p class="card-text">Jl. Raya Ciherang, Pacet, PO.Box 8 SDL Cianjur 43253 Jawa Barat</p>
                        <br>
                        <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>

                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('assets/'); ?>img/Balitjestro.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Balai Penelitian Tanaman Jeruk dan Buah Sub Tropik (Balitjestro)</h5>
                        <p class="card-text">Jl. Raya Tlekung No.1 Junrejo Kota Batu 65301 Jawa Timur</p>
                        <a class="btn btn-sm btn-rounded btn-success mb-5" href="http://balitjestro.litbang.pertanian.go.id" target="blank"><i class="si si-globe"></i> Detail Hama</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>