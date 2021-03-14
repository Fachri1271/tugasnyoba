<div class="container-fluid">
    <div class="row">
        <div class="col">

            <div class="blog-posts">
                <div class="row px-3">
                    <?php
                    foreach ($beritaberanda as $key => $value) { ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-1-5">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">

                                    <img src="<?= base_url('assets/gambar/hama/'  . $value->gambar) ?>" class="card-img-top" alt="...">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h5 class="card-title"><?= $value->nama ?></h5>

                                    <div class="post-meta">

                                        <span class="d-block mt-2"><a href="<?= base_url('F_Hama/detail_hama/' . $value->id_hamapenyakit) ?>" class="btn btn-xs btn-light text-1 text-uppercase">Detail Hama</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>


                    <?php } ?>
                </div>



            </div>

        </div>

    </div>

</div>