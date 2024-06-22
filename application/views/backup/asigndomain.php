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
        <?php include 'common/adminslider/adminslider.php'; ?>
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
                        <th>ID</th>
                        <th>Publisher ID</th>
                        <th>Property</th>
                        <th>Domain</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>publisher123</td>
                        <td>1. example,</td>
                        <td>1. example.com,<br>2. anotherdomain.com,<br> 3. viral.com</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> example</td>
                        <td>1. example.com,<br>2. anotherdomain.com,<br> 3. viral.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>publisher456</td>
                        <td>anotherdomain.com</td>
                    </tr>
                </table>
            </div>

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Help </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Licenses </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                    <div>
                        Distributed by
                        <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
                    </div>
                </div>
            </footer>
        </div>

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
    </div>
    </div>
</body>

</html>