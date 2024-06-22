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

        <!-- Sidebar -->
        <?php include 'common/userslider/sideslider.php'; ?>
        <!-- End Sidebar -->

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
            <div class="container mainprofilepage">
            <?php
                    if ($this->session->flashdata('error')) {
                        echo '<div class="alert alert-danger passwordalert">' . $this->session->flashdata('error') . '</div>';
                    }
                    if ($this->session->flashdata('success')) {
                        echo '<div class="alert alert-successnote">' . $this->session->flashdata('success') . '</div>';
                    }
                    ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="userprofile">
                            <img src="<?php echo base_url('assets/img/profile.jpg') ?>" alt="image profile"
                                class="profileimg rounded" />
                        </div>
                    </div>



                    <div class="col-lg-8">
                        <h1 class="userheading">User Profile</h1>
                        <div class="userdetails">
                            <p>Name: <?= $user_data['name'] ?></p>
                            <p>Email: <?= $user_data['email'] ?></p>
                            <p>Phone No: <?= $user_data['number'] ?></p>
                            <p>Publisher ID: <?= $user_data['user_id'] ?></p>
                            <button id="changePasswordBtn">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Password Change Popup -->
        <div id="passwordChangePopup"
            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center;">
            <div class="popup-content"
                style="background: white; padding: 20px; border-radius: 10px; position: relative;">
                <span class="close" style="position: absolute; top: 10px; right: 10px; cursor: pointer;">&times;</span>

                <!-- reset password start -->
                <form id="" action="<?= base_url('User_controller/reset_password') ?>" method="post">
                    <div class="form-group"> 
                        <label for="oldPassword">Old Password:</label>
                        <input type="password" id="oldPassword" class="form-control" name="oldPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <input type="password" id="newPassword" class="form-control" name="newPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit_btn">Change Password</button>
                </form>

                <!-- reset password start -->

            </div>
        </div>

    </div>
    <!-- jQuery should be included before other scripts -->
    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>

    <!-- script for reset password -->


    <script>
        var changePasswordBtn = document.getElementById("changePasswordBtn");
        var passwordChangePopup = document.getElementById("passwordChangePopup");
        var popupClose = document.querySelector(".close");
        var passwordChangeForm = document.getElementById("passwordChangeForm");

        changePasswordBtn.onclick = function () {
            passwordChangePopup.style.display = "flex";
        }

        popupClose.onclick = function () {
            passwordChangePopup.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == passwordChangePopup) {
                passwordChangePopup.style.display = "none";
            }
        }

        passwordChangeForm.onsubmit = function (event) {
            event.preventDefault();
            var oldPassword = document.getElementById("oldPassword").value;
            var newPassword = document.getElementById("newPassword").value;

            passwordChangePopup.style.display = "none";
            passwordChangeForm.reset();
        }
    </script>

</body>

</html>