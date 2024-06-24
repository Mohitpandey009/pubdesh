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

        <!-- the slider included start-->
        <?php include 'common/userslider/sideslider.php'; ?>
        <!-- the slider included end-->

        <div class="main-panel">

            <!-- the header -->
            <?php include 'common/userheader/header.php'; ?>
            <!-- the header -->

            <div class="container">
                <div class="mainheading">
                    <h2>Enter Your Bank Details</h2>
                </div>

                <?php if (isset($error)) { ?>
                    <div style="color: red; margin: 15px;">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>

                <div class="form">
                    <form id="bankDetailsForm" action="<?= base_url('User_controller/userbank_details') ?>"
                        method="post" enctype="multipart/form-data">
                        <!-- Organization Type -->
                        <div class="form-group">
                            <label for="orgType">Organization Type:</label>
                            <select id="orgType" name="orgType">
                                <option value="">Select Organization Type</option>
                                <option value="Company">Company</option>
                                <option value="Individual">Individual</option>
                            </select>
                            <small><?php echo form_error('orgType'); ?></small>
                        </div>

                        <!-- Country -->
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <select id="country" name="country">
                                <option value="">Select a country</option>
                                <!-- Add more country options as needed -->
                                <option value="USA">USA</option>
                                <option value="India">India</option>
                                <option value="UK">UK</option>
                            </select>
                            <small><?php echo form_error('country'); ?></small>
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address">
                            <small><?php echo form_error('address'); ?></small>
                        </div>

                        <!-- City and Zip Code -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City:</label>
                                <input type="text" id="city" name="city">
                                <small><?php echo form_error('city'); ?></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="zipCode">Zip Code:</label>
                                <input type="text" id="zipCode" name="zipCode">
                                <small><?php echo form_error('zipCode'); ?></small>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name">
                            <small><?php echo form_error('name'); ?></small>
                        </div>

                        <!-- Bank Name -->
                        <div class="form-group">
                            <label for="bankName">Bank Name:</label>
                            <input type="text" id="bankName" name="bankName">
                            <small><?php echo form_error('bankName'); ?></small>
                        </div>

                        <!-- Account Number and Confirm Account Number -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="accountNumber">Account Number:</label>
                                <input type="text" id="accountNumber" name="accountNumber">
                                <small><?php echo form_error('accountNumber'); ?></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirmAccountNumber">Confirm Account Number:</label>
                                <input type="text" id="confirmAccountNumber" name="confirmAccountNumber">
                                <small><?php echo form_error('confirmAccountNumber'); ?></small>
                            </div>
                        </div>


                        <!-- Bank IFSC code -->
                        <div class="form-group">
                            <label for="bankName">IFSC Code:</label>
                            <input type="text" id="ifsc" name="ifsc">

                        </div>

                        <!-- Bank Account Type -->
                        <div class="form-group">
                            <label for="accountType">Bank Account Type:</label>
                            <select id="accountType" name="accountType">
                                <option value="">Choose Account Type</option>
                                <option value="saving">Saving</option>
                                <option value="current">Current</option>
                            </select>
                            <small><?php echo form_error('accountType'); ?></small>
                        </div>

                        <!-- Pan Card Number -->
                        <div class="form-group">
                            <label for="panCardNumber">Pan Card Number:</label>
                            <input type="text" id="panCardNumber" name="panCardNumber">
                            <small><?php echo form_error('panCardNumber'); ?></small>
                        </div>

                        <!-- Are you GST Registered? -->
                        <div class="form-group">
                            <label>Are you GST Registered?</label>
                            <div class="flex-container">
                                <input type="radio" id="gstYes" name="gstRegistered" value="yes">
                                <label for="gstYes">Yes</label>
                                <input type="radio" id="gstNo" name="gstRegistered" value="no">
                                <label for="gstNo">No</label>
                            </div>
                            <small><?php echo form_error('gstRegistered'); ?></small>
                        </div>

                        <!-- GST Number or Upload Documents -->
                        <div class="form-group" id="gstDetails">
                            <!-- This will be dynamically filled based on GST registration status -->
                        </div>

                        <!-- Pan Card - File Upload -->
                        <div class="form-group">
                            <label for="panCardFile">Pan Card:</label>
                            <!-- <input type="file" id="panCardFile" name="panCardFile" > -->
                            <?= form_upload(['name' => 'panCardFile']); ?>

                        </div>
                        <div class="form-group submitbtn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>



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

            <!-- JavaScript to handle GST registration details -->
            <script>
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



</body>

</html>