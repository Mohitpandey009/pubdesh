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

<!-- include the slider start -->
        <?php include'common/adminslider/adminslider.php'; ?>
<!-- include the slider end -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
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
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon hidden-caret">
                                <a class="nav-link bank-button"
                                    href="<?php echo base_url('pubroute_controller/bank') ?>" aria-expanded="false">
                                    <i class="fas fa-university"></i>
                                </a>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="<?php echo base_url('assets/img/profile.jpg') ?>" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">Hizrian</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="<?php echo base_url('assets/img/profile.jpg') ?>"
                                                        alt="image profile" class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>Hizrian</h4>
                                                    <p class="text-muted">ID = 1234567</p>

                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                                href="<?php echo base_url('pubroute_controller/profile/') ?>">View
                                                Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <div class="container">
                <div class="Domandata" style="text-align:center;">
                    <h1>Domain Data</h1>
                </div>
                <table style="width:98%; margin:auto;">
                    <tr>
                        <th>ID</th>
                        <th>Domain</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1. example.com</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>anotherdomain.com</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Function to allow only numbers (integers) in the input fields
                function restrictToNumbers(event) {
                    const input = event.target;
                    input.value = input.value.replace(/\D/g, ''); // Replace non-digit characters with empty string
                }

                // Selecting the input fields that need numeric validation
                const zipCodeField = document.getElementById('zipCode');
                const accountNumberField = document.getElementById('accountNumber');
                const confirmAccountNumberField = document.getElementById('confirmAccountNumber');

                // Attaching event listeners to the input fields
                zipCodeField.addEventListener('input', restrictToNumbers);
                accountNumberField.addEventListener('input', restrictToNumbers);
                confirmAccountNumberField.addEventListener('input', restrictToNumbers);

                // Adjusting labels if "number" is entered instead of "type"
                const orgTypeLabel = document.querySelector('label[for="orgType"]');
                orgTypeLabel.textContent = "Organization Number:";

                const accountTypeLabel = document.querySelector('label[for="accountType"]');
                accountTypeLabel.textContent = "Bank Account Number Type:";
            });
        </script>

        <script>
            // JavaScript to handle GST registration details
            document.addEventListener('DOMContentLoaded', function () {
                const gstDetails = document.getElementById('gstDetails');
                const gstYes = document.getElementById('gstYes');
                const gstNo = document.getElementById('gstNo');

                gstYes.addEventListener('change', function () {
                    if (gstYes.checked) {
                        gstDetails.innerHTML = `
                        <label for="gstNumber">GST Number:</label>
                        <input type="text" id="gstNumber" name="gstNumber" required>
                    `;
                    }
                });

                gstNo.addEventListener('change', function () {
                    if (gstNo.checked) {
                        gstDetails.innerHTML = `
                        
                    `;
                    }
                });
            });
        </script>
        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
    </div>
    </div>
    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/js/plugin/chart.js/chart.min.js') ?>"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>

    <!-- Chart Circle -->
    <script src="<?php echo base_url('assets/js/plugin/chart-circle/circles.min.js') ?>"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url('assets/js/plugin/datatables/datatables.min.js') ?>"></script>



    <!-- jQuery Vector Maps -->
    <script src="<?php echo base_url('assets/js/plugin/jsvectormap/jsvectormap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/jsvectormap/world.js') ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url('assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- Kaiadmin JS -->
    <script src="<?php echo base_url('assets/js/kaiadmin.min.js') ?>"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url('assets/js/setting-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/demo.js') ?>"></script>
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
</body>

</html>