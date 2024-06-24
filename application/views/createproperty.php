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
        <?php include 'common/adminslider/adminslider.php'; ?>
        <!-- include the slider end -->

        <div class="main-panel">

            <!-- header -->
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
                    </tr>
                    <?php foreach ($allproperty as $data) { ?>
                        <tr>
                            <td><?= $data['s_no'] ?></td>
                            <td><?= $data['property'] ?></td>

                        </tr>
                    <?php } ?>
                </table>
            </div>

            <!-- the footer start -->
            <?php include 'common/footer/footer.php' ?>
            <!-- the footer end -->
             
        </div>

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
    </div>
    </div>

</body>

</html>