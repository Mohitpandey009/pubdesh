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
</head>

<body>
    <div class="wrapper">

        <!-- start Modal structure -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Approved</h1>
                    </div>

                    <div class="modal-body">
                        <form id="updateForm">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">User_id:</label>
                                <input type="text" class="form-control" id="recipient-name" name="recipient_name"
                                    placeholder="enter the user_id">
                            </div>

                            <div class="mb-3">
                                <label for="revenue-share" class="col-form-label">Revenue Share:</label>
                                <input type="number" class="form-control" id="revenue-share" name="share"
                                    placeholder="Enter the revenue in percentage">
                            </div>

                        </form>
                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary" id="sendMessage" data-bs-dismiss="modal">Send
                            message</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- start Modal structure -->

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

            <!-- header -->
            <?php include 'common/adminheader/adminheader.php'; ?>
            <!-- End header -->

            <div class="container">
                <div class="page-inner">
                    <div class=" flex-column flex-md-row pt-2 pb-4">

                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pendingapprove as $row): ?>
                                        <tr>
                                            <td><?php echo $row->s_no; ?></td>

                                            <td><?php echo $row->name; ?></td>

                                            <td><?php echo $row->email; ?></td>

                                            <td style="display:flex; justify-content:space-evenly; flex-wrap:wrap;">

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                                    value='<?= $row->s_no ?>'>Approved</button>

                                                <button type="button" class="btn btn-danger decline"
                                                    value='<?= $row->s_no ?>'>Decline</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                    </div>
                </div>

                <!-- the footer start -->
                <?php include 'common/footer/footer.php' ?>
                <!-- the footer end -->
            </div>


        </div>
    </div>

    <!-- jQuery should be included before other scripts -->
    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>

    <!-- script for decline -->
    <script>
        $(document).ready(function () {
            $('.decline').click(function (e) {
                e.preventDefault();
                const id = $(this).val();

                // Prompt the user for confirmation
                const userInput = prompt("To confirm deletion, please enter 'delete125':");

                // Check user input
                if (userInput === 'delete125') {
                    $.ajax({
                        type: "DELETE",
                        url: '<?= base_url('Admin_conroller/delete_publisher/') ?>' + id,
                        success: function (res, status, xhr) {
                            if (xhr.status === 200) {
                                alert("Request successful: " + res);
                                location.reload();
                            }
                        },
                        error: function (xhr, status, error) {
                            alert(xhr.responseText);
                            console.log("Error: ", xhr.responseText);
                        }
                    });
                } else {
                    alert("Confirmation failed. Deletion request cancelled.");
                }
            });
        });
    </script>

    <!-- script for approved -->
    <script>
        $(document).ready(function () {
            let publisherId;

            // When the modal is shown, capture the publisher ID from the button value
            $('#exampleModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget); // Button that triggered the modal
                publisherId = button.val(); // Extract value from data-* attributes
            });

            // Handle the form submission
            $('#sendMessage').click(function () {
                const userId = $('#recipient-name').val();
                const share = $('#revenue-share').val();
                // console.log("the data coming",userId);

                $.ajax({
                    type: "POST",
                    url: '<?= base_url('Admin_conroller/approve_publisher/') ?>' + publisherId,
                    data: {
                        userid: userId,
                        share: share
                    },
                    success: function (res, status, xhr) {
                        if (xhr.status === 200) {
                            // alert(res);
                            location.reload(); // Reload the page on success
                            console.log("this is success", res);
                        } else {
                            alert("Failed to approve publisher.");
                            console.log("the error ", res);
                        }
                    }
                });
            });
        });
    </script>

    <script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

    <!-- Kaiadmin JS -->
    <script src="<?php echo base_url('assets/js/kaiadmin.min.js') ?>"></script>


</body>

</html>