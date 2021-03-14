<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>Dashbaord Admin</title>

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
    <!-- Page Wrapper -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
    <div id="page-wrapper">
        <!-- Preloader -->
        <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
        <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie10"></div>
            </div>
        </div>
        <!-- END Preloader -->

        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
                Available #page-container classes:

                '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

                'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
                'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
                'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
                'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

                'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
                'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

                'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

                'style-alt'                                     for an alternative main style (without it: the default style)
                'footer-fixed'                                  for a fixed footer (without it: a static footer)

                'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
            -->
        <?php $this->user_login->proteksi_halaman(); ?>
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <!-- Alternative Sidebar -->
            <div id="sidebar-alt">
                <!-- Wrapper for scrolling functionality -->
                <div id="sidebar-alt-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Chat -->
                        <!-- Chat demo functionality initialized in js/app.js -> chatUi() -->
                        <a href="page_ready_chat.html" class="sidebar-title">
                            <i class="gi gi-comments pull-right"></i> <strong>Chat</strong>UI
                        </a>
                        <!-- Chat Users -->
                        <ul class="chat-users clearfix">
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar12.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar15.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar10.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-away">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar7.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-away">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar9.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-busy">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar3.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar13.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                        </ul>
                        <!-- END Chat Users -->

                        <!-- Chat Talk -->
                        <div class="chat-talk display-none">
                            <!-- Chat Info -->
                            <div class="chat-talk-info sidebar-section">
                                <button id="chat-talk-close-btn" class="btn btn-xs btn-default pull-right">
                                    <i class="fa fa-times"></i>
                                </button>
                                <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle pull-left">
                                <strong>sas</strong>
                            </div>
                            <!-- END Chat Info -->

                            <!-- Chat Messages -->
                            <ul class="chat-talk-messages">
                                <li class="text-center"><small>Yesterday, 18:35</small></li>
                                <li class="chat-talk-msg animation-slideRight">Hey admin?</li>
                                <li class="chat-talk-msg animation-slideRight">How are you?</li>
                                <li class="text-center"><small>Today, 7:10</small></li>
                                <li class="chat-talk-msg chat-talk-msg-highlight themed-border animation-slideLeft">I'm fine, thanks!</li>
                            </ul>
                            <!-- END Chat Messages -->

                            <!-- Chat Input -->
                            <form action="<?= base_url(); ?>Dashboard/index" method="post" id="sidebar-chat-form" class="chat-form">
                                <input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control form-control-borderless" placeholder="Type a message..">
                            </form>
                            <!-- END Chat Input -->
                        </div>
                        <!--  END Chat Talk -->
                        <!-- END Chat -->




                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Alternative Sidebar -->

            <!-- Main Sidebar -->
            <div id="sidebar">
                <!-- Wrapper for scrolling functionality -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        <a href="<?= base_url(); ?>Dashboard/index" class="sidebar-brand">
                            <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Pro</strong>UI</span>
                        </a>
                        <!-- END Brand -->

                        <!-- User Info -->
                        <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                            <div class="sidebar-user-avatar">
                                <a href="<?= base_url(); ?>Dashboard/index">
                                    <img src="<?= base_url('assets/'); ?>img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                </a>
                            </div>
                            <div class="sidebar-user-name"></div>

                        </div>
                        <!-- END User Info -->

                        <!-- Theme Colors -->
                        <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->

                        <!-- END Theme Colors -->

                        <!-- Sidebar Navigation -->

                        <ul class="sidebar-nav">
                            <li>

                                <a href="<?= base_url(); ?>Dashboard/index" class=" "><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>User/User"><i class="gi gi-leaf sidebar-nav-icon "></i><span class="sidebar-nav-mini-hide">User</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>Hama/hama"><i class="gi gi-leaf sidebar-nav-icon "></i><span class="sidebar-nav-mini-hide">Hama & Penyakit</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>Budidaya_tan/tampil_budidaya"><i class="gi gi-leaf sidebar-nav-icon "></i><span class="sidebar-nav-mini-hide">Budidaya</span></a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>Auth/logout_user"><i class="gi gi-log_out sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Logout</span></a>
                            </li>

                        </ul>
                        <!-- END Sidebar Navigation -->


                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Main Sidebar -->

            <!-- Main Container -->
            <div id="main-container">
                <!-- Header -->
                <!-- In the PHP version you can set the following options from inc/config file -->
                <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                <header class="navbar navbar-default">
                    <!-- Left Header Navigation -->
                    <ul class="nav navbar-nav-custom">
                        <!-- Main Sidebar Toggle Button -->
                        <li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                <i class="fa fa-bars fa-fw"></i>
                            </a>
                        </li>
                        <!-- END Main Sidebar Toggle Button -->

                        <!-- Template Options -->
                        <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="gi gi-settings"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-options">
                                <li class="dropdown-header text-center">Header Style</li>
                                <li>
                                    <div class="btn-group btn-group-justified btn-group-sm">
                                        <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                                    </div>
                                </li>
                                <li class="dropdown-header text-center">Page Style</li>
                                <li>
                                    <div class="btn-group btn-group-justified btn-group-sm">
                                        <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                        <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- END Template Options -->
                    </ul>
                    <!-- END Left Header Navigation -->

                    <!-- Search Form -->

                    <!-- END Search Form -->

                    <!-- Right Header Navigation -->
                    <ul class="nav navbar-nav-custom pull-right">
                        <!-- Alternative Sidebar Toggle Button -->
                        <li>
                            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');this.blur();">
                                <i class="gi gi-share_alt"></i>
                                <span class="label label-primary label-indicator animation-floating">4</span>
                            </a>
                        </li>
                        <!-- END Alternative Sidebar Toggle Button -->

                        <!-- User Dropdown -->

                        <!-- END User Dropdown -->
                    </ul>
                    <!-- END Right Header Navigation -->
                </header>
                <!-- END Header -->

                <!-- Page content -->
                <div id="page-content">
                    <?php $this->load->view($view); ?>
                    <!-- Dashboard Header -->
                    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->

                    <!-- END Dashboard Header -->

                    <!-- Mini Top Stats Row -->

                    <!-- END Mini Top Stats Row -->

                    <!-- Widgets Row -->

                    <!-- END Widgets Row -->
                </div>
                <!-- END Page Content -->

                <!-- Footer -->
                <footer class="clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="pull-left">
                        <span id="year-copy"></span> &copy; <a href="https://1.envato.market/x4R" target="_blank">ProUI 3.8</a>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
    </div>
    <!-- END Page Wrapper -->

    <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
    <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
    <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?= base_url(); ?>Dashboard/index" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                        <fieldset>
                            <legend>Vital Info</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Username</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">admin</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                <div class="col-md-8">
                                    <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                                <div class="col-md-8">
                                    <label class="switch switch-primary">
                                        <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Password Update</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                <div class="col-md-8">
                                    <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                <div class="col-md-8">
                                    <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div class="col-xs-12 text-right">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Modal Body -->
            </div>
        </div>
    </div>
    <!-- END User Settings -->

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="<?= base_url('assets/'); ?>js/vendor/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/plugins.js"></script>
    <script src="<?= base_url('assets/'); ?>js/app.js"></script>

    <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
    <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
    <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script src="<?= base_url('assets/'); ?>js/helpers/gmaps.min.js"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="<?= base_url('assets/'); ?>js/pages/index.js"></script>
    <script>
        $(function() {
            Index.init();
        });
    </script>
    <script src="<?= base_url('assets/'); ?>js/pages/tablesDatatables.js"></script>
    <script>
        $(function() {
            TablesDatatables.init();
        });
    </script>

</body>

</html>