<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
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

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow: auto;
        }

        .container {
            width: 100%;
            max-width: none !important;
            padding: 0px 0px !important;
            box-shadow: none !important;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 10px;
            border: 1px solid #ccc;
            width: 90%;
            margin: auto;
            border-radius: 10px;
        }

        .row+.row {
            border-top: none;
        }

        .row div {
            flex: 1;
            text-align: center;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            padding: 10px;
            width: 100%;
            border: 1px solid black;
            border-top: none;
            margin-top: -1px;
        }

        .dropdown-content div {
            flex: 1;
            text-align: center;
            padding: 5px;
        }

        .accordion-button::after {
            display: none;
        }

        .accordion-button {
            background-color: #dddddd !important;
            color: black !important;
        }

        .accordion-button.collapsed {
            background-color: white !important;
            color: black !important;
        }

        .accordion-collapse {
            width: 90% !important;
            margin: auto !important;
            border-radius: 0px 0px 5px 5px !important;
            border-top: 0 !important;
            box-shadow: -1px -2px 9px rgba(0, 0, 0, 0.2);
        }

        .accordion-header {
            width: 90%;
            margin: 0px auto;
            box-shadow: -1px -2px 9px rgba(0, 0, 0, 0.2);
            border-radius: 5px 5px 0px 0px;
        }

        .accordion-item {
            border: 0;
            margin-top: 10px;
        }

        .heading,
        .totalheading {
            font-weight: 900;
        }

        .totalheading h5,
        .totalheading p {
            margin: 0;
        }

        .heading h6 {
            padding-top: 8px;
        }

        .mainpaymentheading {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: 10PX auto;
            /* border: 1px solid black; */
            padding: 3px 25px;
            border-radius: 5px;
            background-color: #dddddd;
        }

        .mainpaymentheading p {
            /* font-size: 13px; */
            margin-bottom: 0 !important;
        }

        @media screen and (max-width:576px) {
            .heading h3 {
                font-size: 15px !important;
                padding-top: 8px;
            }

            .heading h6 {
                font-size: 13px;
            }

            .mainpaymentheading p {
                font-size: 10px;
            }
        }
    </style>

</head>

<body>
    <div class="main-panel">
        <div class="container">
            <div class="mainpaymentheading">
                <p>MONTH & YEAR</p>
                <p>INVOICE STATUS</p>
                <p>NET EARNINGS</p>
            </div>
            <div class="accordion" id="accordionExample">


                <!-- Accordion Item #1 -->
                <?php foreach ($publisher_earn as $index => $earn):
                    $totalpay = 0;
                    $earnings = json_decode($earn['publisher_earn'], true); ?>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?= $index ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?= $index ?>" aria-expanded="false"
                                aria-controls="collapse<?= $index ?>">
                                <div class="heading" style="justify-content: space-between; display: flex; flex: 1;">
                                    <h3><?= $earn['month'] ?>     <?= $earn['year'] ?></h3>
                                    <h6><?php echo $earn['revenue'] > 0 ? 'Revenue Generated' : 'Not Revenue Generated'; ?>
                                    </h6>
                                    <h6>Earnings</h6>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse<?= $index ?>" class="accordion-collapse collapse"
                            aria-labelledby="heading<?= $index ?>" data-bs-parent="#accordionExample">
                            <?php foreach ($earnings as $earning): ?>
                                <div class="accordion-body" style="display: flex; justify-content: space-between; flex: 1;">
                                    <p>Domain : <?= $earning['domain_id'] ?></p>
                                    <p>$ <?php
                                    $revenue = ($earning['pay_domain'] * $earn['revenue']) / 100;
                                    echo $earning['pay_domain'] - $revenue;
                                    $totalpay += $earning['pay_domain'] - $revenue;
                                    ?></p>
                                </div>
                            <?php endforeach; ?>
                            <hr>
                            <div class="heading">
                                <h3 style="font-weight: 900; padding: 0px 20px;">GROSS TOTAL</h3>
                                <div class="accordion-body" style="display: flex; justify-content: space-between; flex: 1;">
                                    <h5>Total</h5>
                                    <p><?= $totalpay ?></p>
                                </div>
                                <div class="accordion-body" style="display: flex; justify-content: space-between; flex: 1;">
                                    <h5>Conversion Rate</h5>
                                    <p>$ 1 = <?= $earn['conversionRate'] ?></p>
                                </div>
                                <div class="accordion-body" style="display: flex; justify-content: space-between; flex: 1;">
                                    <h5>Invalid Deduction</h5>
                                    <p>$ <?= $earn['invalidDeduction'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="totalheading">
                                <h3 style="font-weight: 900; padding: 0px 20px;">GRAND TOTAL</h3>
                                <div class="accordion-body" style="display: flex; justify-content: space-between; flex: 1;">
                                    <h5>Net Payment</h5>
                                    <p>INR : <?= ($totalpay - $earn['invalidDeduction']) * $earn['conversionRate'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <!--   Core JS Files   -->
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

        <!-- Kaiadmin JS -->
        <script src="<?php echo base_url('assets/js/kaiadmin.min.js') ?>"></script>


    </div>

</body>

</html>