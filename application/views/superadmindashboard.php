<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?php echo base_url('assets/img/kaiadmin/favicon.ico') ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?php echo base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?php echo base_url('assets/css/fonts.min.css') ?>"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/kaiadmin.min.css') ?>" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>" />
</head>

<body>
    <div class="wrapper">

        <!-- the admin slider included -->
        <?php include 'common/adminslider/adminslider.php'; ?>
        <!-- the admin slider included end-->


        <div class="main-panel">

            <!-- Sidebar -->
            <div class="sidebar" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="<?php echo base_url('assets/img/kaiadmin/logo_light.svg') ?>" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item active">

                                <div class="">
                                    <ul class="nav-item">
                                        <li>
                                            <a href="<?php echo base_url('Pubroute_controller/admindashboard') ?>">
                                                <span class="sub-item">Dashboard </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('Pubroute_controller/pendingrequest'); ?>">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Panding Requests <sup><?= $pendingcount ?></sup></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Pubroute_controller/property'); ?>">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Create Property</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('Pubroute_controller/asigndomain'); ?>">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Asign Domain</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('Pubroute_controller/adminpayments'); ?>">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Admin Payment</p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h2>Hello And Admin Name</h2>
                            <h3 class="mb-3">Dashboard</h3>
                        </div>

                    </div>
                    <div class="row">
                    </div>
                </div>

                <!-- the footer start -->
                <?php include 'common/footer/footer.php' ?>
                <!-- the footer end -->

            </div>


            <!-- End Custom template -->
        </div>
    </div>
</body>

</html>