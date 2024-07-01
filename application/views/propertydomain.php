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

    <?php
    $id = $this->uri->segment(3);
    $filteredData = [];
    foreach ($domain as $item) {
        if ($item->prop_id === $id) {
            $filteredData[] = $item;
        }
    }
    ?>

    <div class="main-panel">

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

                <?php foreach ($filteredData as $d): ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $d->domain; ?></td>
                        <!-- Add other fields as needed -->
                    </tr>
                    <?php $index++; ?>
                <?php endforeach; ?>
            </table>



            <!-- the footer start -->
            <?php include 'common/footer/footer.php' ?>
            <!-- the footer end -->

        </div>
    </div>


    
    </div>
    </div>
    
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js')?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?>"></script>

    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/js/plugin/chart.js/chart.min.js')?>"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')?>"></script>

    <!-- Chart Circle -->
    <script src="<?php echo base_url('assets/js/plugin/chart-circle/circles.min.js')?>"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url('assets/js/plugin/datatables/datatables.min.js')?>"></script>

    <!-- Kaiadmin JS -->
    <script src="<?php echo base_url('assets/js/kaiadmin.min.js')?>"></script>

</body>