<div class="container py-md-4">
    <div class="row d-flex justify-content-center text-center">
        <div class="center">

            <div class="card-deck">
                <?php
                foreach ($beritaberanda as $key => $value) { ?>
                    <div class="card">
                        <img src="<?= base_url('assets/gambar/hama/' .  $value->gambar) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value->nama ?></h5>
                            <p class="card-text">Jl. Tangkuban Perahu 517 Kotak Pos 8413 Lembang 40391 Jawa Barat</p>
                            <a class="btn btn-sm btn-rounded btn-success mb-5" href="<?= base_url('F_Hama/detail_hama/' . $value->id_hamapenyakit) ?>" target="blank"><i class="si si-globe"></i> Detail Hama</a>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>

    </div>
</div>