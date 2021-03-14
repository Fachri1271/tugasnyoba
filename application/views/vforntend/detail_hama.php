<div role="main" class="main">
    <?php
    foreach ($detail_hama as $key => $value) { ?>
        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
            <div class="container-fluid">

                <div class="row align-items-center">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <div class="overflow-hidden pb-2">
                            <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">
                                <?= $value->nama ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pt-2 pb-4">
            <div class="row pb-4 mb-2">
                <div class="col-md-6 mb-4 mb-md-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
                    <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark mt-3" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                        <div>
                            <div class="<?= base_url('assets/'); ?>img-thumbnail border-0 border-radius-0 p-0 d-block">
                                <img src="<?= base_url('assets/'); ?>img/projects/project-short.jpg" class="img-fluid border-radius-0" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                <img src="img/projects/project-short-2.jpg" class="img-fluid border-radius-0" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="<?= base_url('assets/'); ?>img-thumbnail border-0 border-radius-0 p-0 d-block">
                                <img src="<?= base_url('assets/'); ?>img/projects/project-short-3.jpg" class="img-fluid border-radius-0" alt="">
                            </div>
                        </div>

                    </div>
                    <hr class="solid my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1000">
                    <div class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1100">
                        <strong class="text-uppercase text-1 mr-3 text-dark float-left position-relative top-2">Share</strong>
                        <ul class="social-icons">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="overflow-hidden">
                        <h2 class="text-color-dark font-weight-normal text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="600">Project <strong class="font-weight-extra-bold">Description</strong></h2>
                    </div>
                    <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"><?= $value->deskripsi ?></p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <div class="overflow-hidden pb-2">
                        <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">
                            <a class="btn btn-sm btn-rounded btn-success mb-5" href="<?= base_url('F_Hama/Hama') ?>" target="blank"><i class="si si-globe"></i> Kembali</a>
                    </div>
                </div>
            </div>

        </div>
    <?php } ?>
</div>