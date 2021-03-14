<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>ProUI - Responsive Bootstrap Admin Template</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/favicon.png">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>img/icon180.png" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/plugins.css">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/main.css">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/themes.css">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="<?= base_url('assets/'); ?>js/vendor/modernizr.min.js"></script>
</head>

<body>
    <!-- Login Full Background -->
    <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
    <img src="img/placeholders/backgrounds/login_full_bg.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
    <!-- END Login Full Background -->

    <!-- Login Container -->
    <div id="login-container" class="animation-fadeIn">
        <!-- Login Title -->
        <div class="login-title text-center">
            <h1><i class="gi gi-flash"></i> <strong>Sistem Informasi Budidaya Mangga</strong><br><small>Please <strong>Login</strong> Terlebih Dahulu !! <strong></strong></small></h1>
            <h4><?php echo $this->session->flashdata('msg'); ?></h4>
        </div>
        <!-- END Login Title -->

        <!-- Login Block -->
        <div class="block push-bit">
            <!-- Login Form -->
            <?php

            echo validation_errors(' <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-exclamation-circle"></i> Warning</h4> <a href="javascript:void(0)" class="alert-link"></a>
        ', '</div>');

            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fa fa-times-circle"></i> Error</h4> <a href="javascript:void(0)" class="alert-link">Gagal</a>!
            ';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fa fa-check-circle"></i> Success</h4>  <a href="javascript:void(0)" class="alert-link">Succes </a>!
           
            ';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }

            echo form_open('Auth/login') ?>

            <div class="form-group">
                <div class="col-xs-20">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                        <input type="text" id="username" name="username" class="form-control input-lg" placeholder="Masukkan Username Andaa...">

                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-20">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Masukkan Password Anda....">
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">

                <div class="col-xs-20 text-center">
                    <button type="submit" name="login" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
                </div>

            </div>

            <?php form_close() ?>
            <!-- END Login Form -->

            <!-- Reminder Form -->

            <!-- END Register Form -->
        </div>
        <!-- END Login Block -->
    </div>
    <!-- END Login Container -->

    <!-- Modal Terms -->
    <div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Terms &amp; Conditions</h4>
                </div>
                <div class="modal-body">
                    <h4>Title</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4>Title</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4>Title</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Terms -->

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="<?= base_url('assets/'); ?>js/vendor/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
    <script src="<?= base_url('assets/'); ?>js/app.js"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="<?= base_url('assets/'); ?>js/pages/login.js"></script>
    <script>
        $(function() {
            Login.init();
        });
    </script>
</body>

</html>