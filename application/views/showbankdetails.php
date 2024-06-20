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

        <!-- the slider included -->
        <?php include 'common/userslider/sideslider.php'; ?>
          <!-- the slider included end-->
           
        <div class="main-panel">

            <!-- the header -->
            <?php include 'common/header.php'; ?>

            <div class="container">
                <div class="mainheading">
                    <h2>Your Bank Details</h2>
                </div>


                <div class="form">

                    <!-- Organization Type -->
                    <div class="form-group">
                        <label for="orgType">Organization Type:</label>
                        <select id="orgType" name="orgType" disabled>
                            <option value="">Select Organization Type</option>
                            <option value="Company" <?= ($userbank['organization'] == 'Company') ? 'selected' : ''; ?>>
                                Company</option>
                            <option value="Individual" <?= ($userbank['organization'] == 'Individual') ? 'selected' : ''; ?>>Individual</option>
                        </select>

                    </div>

                    <!-- Country -->
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select id="country" name="country" disabled>
                            <option value="">Select a country</option>
                            <!-- Add more country options as needed -->
                            <option value="USA" <?= ($userbank['country'] == 'USA') ? 'selected' : ''; ?>>USA</option>
                            <option value="India" <?= ($userbank['country'] == 'India') ? 'selected' : ''; ?>>India
                            </option>
                            <option value="UK" <?= ($userbank['country'] == 'UK') ? 'selected' : ''; ?>>UK</option>
                        </select>

                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="<?= $userbank['address'] ?>" readonly>

                    </div>

                    <!-- City and Zip Code -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" value="<?= $userbank['city'] ?>" readonly>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="zipCode">Zip Code:</label>
                            <input type="text" id="zipCode" name="zipCode" value="<?= $userbank['zip_code'] ?>"
                                readonly>

                        </div>
                    </div>

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?= $userbank['name'] ?>" readonly>

                    </div>

                    <!-- Bank Name -->
                    <div class="form-group">
                        <label for="bankName">Bank Name:</label>
                        <input type="text" id="bankName" name="bankName" value="<?= $userbank['bank_name'] ?>" readonly>

                    </div>

                    <!-- Account Number and Confirm Account Number -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="accountNumber">Account Number:</label>
                            <input type="text" id="accountNumber" name="accountNumber"
                                value="<?= $userbank['ac_number'] ?>" readonly>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirmAccountNumber">Confirm Account Number:</label>
                            <input type="text" id="confirmAccountNumber" name="confirmAccountNumber"
                                value="<?= $userbank['ac_number'] ?>" readonly>

                        </div>
                    </div>

                    <!-- Bank Account Type -->
                    <div class="form-group">
                        <label for="accountType">Bank Account Type:</label>
                        <select id="accountType" name="accountType" disabled>
                            <option value="">Choose Account Type</option>
                            <option value="saving" <?= ($userbank['account_type'] == 'saving') ? 'selected' : ''; ?>>
                                Saving</option>
                            <option value="current" <?= ($userbank['account_type'] == 'current') ? 'selected' : ''; ?>>
                                Current</option>
                        </select>

                    </div>

                    <!-- Pan Card Number -->
                    <div class="form-group">
                        <label for="panCardNumber">Pan Card Number:</label>
                        <input type="text" id="panCardNumber" name="panCardNumber"
                            value="<?= $userbank['pan_number'] ?>" readonly>

                    </div>

                    <!-- Are you GST Registered? -->
                    <?php
                    if ($userbank['gst_number'] !== null) {
                        ?>
                        <div class="form-group" id="gstDetails">
                            <label for="gstNumber">GST Number:</label>
                            <input type="text" id="gstNumber" name="gstNumber"
                                value="<?php echo $userbank['gst_number']; ?>" readonly>
                        </div>
                        <?php
                    } else {
                        echo '                        
                                <div class="form-group">
                                    <label>Are you GST Registered?</label>
                                    <div class="flex-container">
                                        <input type="radio" id="gstYes" name="gstRegistered" value="yes" disabled>
                                        <label for="gstYes">Yes</label>
                                        <input type="radio" id="gstNo" name="gstRegistered" value="no" checked readonly>
                                        <label for="gstNo">No</label>
                                    </div>
                                </div>';
                    }
                    ?>

                    <!-- Pan Card - File Upload -->
                    <?php
                    $image_name = str_replace('uploads/', '', $userbank['pan_img']);
                    ?>
                    <div class="form-group">
                        <label for="panCardFile">Pan Card Image:</label>
                        <?php echo $image_name; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>