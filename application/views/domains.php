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

    <!-- include the slider start -->
    <div class="sidebar" data-background-color="dark">
    <?php if (!empty($domain)): ?>
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="<?php echo base_url('assets/img/kaiadmin/logo_light.svg') ?>" alt="navbar brand" class="navbar-brand" height="20" />
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
                    <a href="<?php echo base_url('Pubroute_controller/userdashboard') ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="sub-item">Dashboard</span>
                    </a>
                </li>

                    <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#base">
                                <i class="fas fa-globe"></i>
                                <p>Domains</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">

                                <?php foreach ($domain as $d): ?>
                                    <li>
                                        <a href="<?php echo base_url('pubroute_controller/domains/') ?>">
                                            <span class="sub-item"><?= $d->property;?></span>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-file-alt"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url('pubroute_controller/userpayments')?>">
                        <i class="fas fa-credit-card"></i>
                        <p>Payments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-file-invoice"></i>
                        <p>Generate Invoice</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
    <!-- include the slider end -->

    <div class="main-panel">

        <!-- include the header start -->
        <?php include 'common/userheader/header.php'; ?>
        <!-- include the header end -->

        <div class="container">
            <div class="Domandata" style="text-align:center;">
                <h1>Domain Data</h1>
            </div>
          
                <table style="width:98%; margin:auto;">
                    <tr>
                        <th>ID</th>
                        <th>Domain</th>
                    </tr>
                    <?php $index = 1; ?>

                    <?php foreach ($domain as $d): ?>
                        <tr>
                            <td><?php echo $index; ?></td>
                            <td><?php echo $d->domain; ?></td>
                            <!-- Add other fields as needed -->
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No domains found.</p>
            <?php endif; ?>

            <!-- the footer start -->
            <?php include 'common/footer/footer.php' ?>
            <!-- the footer end -->

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </div>
    </div>
    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

</body>

</html>