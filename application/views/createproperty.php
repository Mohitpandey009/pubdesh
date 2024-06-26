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
        <!-- Modal Structure -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Property</h1>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="Properties">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="send">Send message</button>
                    </div>
                </div>
            </div>
        </div>

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
                                <p>Panding Requests  <sup><?=$pendingcount?></sup></p>
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

        <div class="main-panel">
            <!-- Header -->
            <?php include 'common/adminheader/adminheader.php'; ?>
            <!-- End header -->

            <div class="container">
                <div class="form">
                    <form action="<?php echo base_url('Admin_conroller/createproperty') ?>" method="post"
                        style="display:flex; margin:40px 0px;">
                        <div class="form-group" style="width:40%">
                            <input type="text" name="property" placeholder="Create Property" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" style="padding:9px 17px; ">Create</button>
                        </div>
                    </form>
                </div>
                <div class="Domandata" style="text-align:center;">
                    <h1>All Properties</h1>
                </div>

                <table style="width:98%; margin:auto;">
                    <tr>
                        <th>ID</th>
                        <th>Properties</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($allproperty as $data) { ?>
                        <tr>
                            <td><?= $data['s_no'] ?></td>
                            <td><?= $data['property'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger delete-btn"
                                    id="<?= $data['PROP_id'] ?>">Delete</button>
                                <button type="button" class="btn btn-warning openModalButton"
                                    data-prop-id="<?= $data['PROP_id'] ?>" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Edit</button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <!-- The footer start -->
            <?php include 'common/footer/footer.php' ?>
            <!-- The footer end -->

        </div>
    </div>
    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        $(document).ready(function () {
            $('.delete-btn').click(function () {
                var id = $(this).attr('id');
                var table = '0';

                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: `<?= base_url('Admin_conroller/deletedata/') ?>${id}/${table}`,
                        type: 'POST',
                        success: function (response) {
                            response = JSON.parse(response);
                            if (response.status === 'success') {
                                location.reload();
                            } else {
                                alert('Failed to delete the record. Please try again.');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while trying to delete the record.');
                        }
                    });
                }
            });

            let publisherId;

            $('.openModalButton').click(function () {
                publisherId = $(this).data('prop-id');
                $('#exampleModal').modal('show');
            });

            $('#send').click(function () {
                var property = $('#Properties').val();
                $.ajax({
                    type: 'POST',
                    url: `<?= base_url('Admin_conroller/update_property/') ?>${publisherId}`,
                    data: { property: property },
                    success: function (response) {
                        location.reload();
                        console.log('Update successful:', response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to update. Please try again.');
                    }
                });
            });
        });
    </script>
</body>
</html>
