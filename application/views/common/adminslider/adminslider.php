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
                                <a href="<?php echo base_url('authenticate/admindashboard') ?>">
                                    <span class="sub-item">Dashboard </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('authenticate/pendingrequest'); ?>">
                        <i class="fas fa-layer-group"></i>
                        <p>Panding Requests</p>
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


<script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>


<!-- jQuery Scrollbar -->
<script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

<!-- Kaiadmin JS -->
<script src="<?php echo base_url('assets/js/kaiadmin.min.js') ?>"></script>

 <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

    <!-- Kaiadmin JS important-->
    <script src="<?php echo base_url('assets/js/kaiadmin.min.js') ?>"></script>

    <!-- script for jquery and bootstrap -->
    <script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>


