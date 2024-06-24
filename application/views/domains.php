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

    <!-- include the slider start -->

    <!-- include the slider end -->

    <div class="main-panel">

        <!-- include the header start -->
        <?php include 'common/userheader/header.php'; ?>
        <!-- include the header end -->

        <div class="container">
            <div class="Domandata" style="text-align:center;">
                <h1>Domain Data</h1>
            </div>
            <?php if (!empty($domain)): ?>
                <table style="width:98%; margin:auto;">
                    <tr>
                        <th>ID</th>
                        <th>Domain</th>
                    </tr>
                    <?php $index = 1; ?>

                    <?php foreach ($domain as $d): ?>
                        <tr>
                            <td><?php echo $index; ?></td>
                            <td><?php echo $d->domain; ?></td>
                            <!-- Add other fields as needed -->
                        </tr>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No domains found.</p>
            <?php endif; ?>

            <!-- the footer start -->
            <?php include 'common/footer/footer.php' ?>
            <!-- the footer end -->

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


    <!-- jQuery Vector Maps -->
    <script src="<?php echo base_url('assets/js/plugin/jsvectormap/jsvectormap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/jsvectormap/world.js') ?>"></script>

    <!-- Kaiadmin JS -->
    <script src="<?php echo base_url('assets/js/kaiadmin.min.js') ?>"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url('assets/js/setting-demo.js') ?>"></script>

</body>

</html>