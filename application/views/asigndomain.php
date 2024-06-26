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
                                <input type="text" class="form-control" id="domain">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="send">Send message</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Structure End-->

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

                <?php
                if ($this->session->flashdata('error')) {
                    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                }
                ?>

                <div class="form-container">
                    <form action="<?= base_url('Admin_conroller/savedomaindata') ?>" method="post">
                        <div class="form-group">
                            <label for="publisherid">Publisher ID :</label>
                            <select id="publisherid" name="publisherid" required>
                                <option value="">Choose Publisher Id</option>
                                <?php foreach ($publiser as $pub_id) { ?>
                                    <option value="<?= $pub_id['user_id'] ?>"><?= $pub_id['user_id'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="property">Property :</label>
                            <select id="property" name="property" required>
                                <option value="">Choose Property</option>
                                <?php foreach ($prop_id as $id) { ?>
                                    <option value="<?= $id['PROP_id'] ?>"><?= $id['property'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="asigndomain">Asign Domain :</label>
                            <input type="text" id="asigndomain" name="asigndomain" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-create">Create</button>
                        </div>
                    </form>
                </div>

                <div class="Domandata" style="text-align:center;">
                    <h1>Domain Data</h1>
                </div>

                <table style="width:98%; margin:auto;">
                    <tr>
                        <th>Publisher ID</th>
                        <th>Property</th>
                        <th>Domains</th>
                    </tr>

                    <?php
                    $groupedData = [];
                    foreach ($domain as $row) {
                        $pub_id = $row['pub_id'];
                        $property = $row['property'];

                        if (!isset($groupedData[$pub_id])) {
                            $groupedData[$pub_id] = [];
                        }

                        if (!isset($groupedData[$pub_id][$property])) {
                            $groupedData[$pub_id][$property] = [];
                        }

                        $groupedData[$pub_id][$property][] = $row;
                    }

                    foreach ($groupedData as $pub_id => $properties) {
                        $pub_id_rowspan = count($properties);
                        $firstProperty = true;

                        foreach ($properties as $property => $domains) {
                    ?>
                            <tr>
                                <?php if ($firstProperty) : ?>
                                    <td rowspan="<?= $pub_id_rowspan ?>"><?= htmlspecialchars($pub_id) ?></td>
                                    <?php $firstProperty = false; ?>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($property) ?></td>
                                <td>
                                    <?php foreach ($domains as $domain) : ?>
                                        <?= htmlspecialchars($domain['domain']) ?>

                                        <button type="button" class="btn btn-danger delete-btn"  
                                        id="<?= $domain['domain_id'] ?>">Delete</button>
                                    
                                        <button type="button" class="btn btn-primary openModalButton" data-domain-id="<?= $domain['domain_id'] ?>">Edit</button>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <!-- the footer start -->
            <?php include 'common/footer/footer.php' ?>
            <!-- the footer end -->
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        $(document).ready(function () {
            $('.delete-btn').click(function () {
                var id = $(this).attr('id');
                var table = '1';

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
            let domainId;
            // Open modal on Edit button click
            $('.openModalButton').click(function () {
                 domainId = $(this).data('domain-id');
                // console.log("the domian id ",domainId);
                $('#exampleModal').modal('show');
            });

            $('#send').click(function () {
                var domain = $('#domain').val();
                $.ajax({
                    type: 'POST',
                    url: `<?= base_url('Admin_conroller/update_domian/') ?>${domainId}`,
                    data: { domain: domain },
                    success: function (response) {
                        location.reload();
                        // console.log('Update successful:', response);
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
