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
    <script>
        function toggleDomainFields() {
            var domainSection = document.getElementById("domainSection");
            if (domainSection.style.display === "none" || domainSection.style.display === "") {
                domainSection.style.display = "block";
            } else {
                domainSection.style.display = "none";
            }
        }
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/kaiadmin.min.css') ?>" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>" />
</head>

<body>

    <script src="<?php echo base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>

    <script>
        $(document).ready(function () {
            $('#publisherId').change(function () {
                var user_id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: `<?= base_url('Admin_conroller/publisher_all_domain/') ?>${user_id}`,
                    success: function (response) {

                        // Initialize an array to store domain data
                        var domains = [];
                        var domainSection = $('#domainFieldsContainer');
                        domainSection.empty();

                        // Check if response contains data
                        if (response.length > 0) {
                            // Loop through each domain data and store in array
                            response.forEach(function (domain) {
                                domains.push({
                                    domain
                                });

                                // Append each domain field to the container
                                domainSection.append(`
                                    <div class="domainField">
                                        <label class="asigndomain" value="${domain.domain_id}">${domain.domain}:</label>
                                        <input type="hidden" name="domain_id[]" value="${domain.domain}">
                                        <input type="text" name="paydomain[]">
                                    </div>
                                `);
                            });

                        } else {
                            $('#alert_text').html('No domains found for the selected user ID.');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to fetch domain data. Please try again.');
                    }
                });
            });
        });
    </script>

    <div class="wrapper">

        <!-- Sidebar -->
        <?php include 'common/adminslider/adminslider.php'; ?>
        <!-- End Sidebar -->

        <div class="main-panel">

             <!-- header -->
             <?php include 'common/adminheader/adminheader.php'; ?>
            <!-- End header -->

            <div class="container userpayment">

                <?php if ($this->session->flashdata('message')): ?>
                    <label for="" class="error-label text-center text-danger"><?= $this->session->flashdata('message') ?></label>
                <?php endif; ?>

                <div class="text-center text-danger" id="alert_text"></div>

                <form action="<?= base_url('Admin_conroller/admin_payment_submit'); ?>" method="post"
                    class="userpaymentform">
                    <label for="publisherId">Publisher ID:</label>

                    <select id="publisherId" name="publisherId">

                        <?php foreach ($approve as $item): ?>
                            <option value="<?= $item['user_id']; ?>"><?php echo $item['user_id']; ?></option>
                        <?php endforeach; ?>

                        <!-- Add more publishers as needed -->
                    </select><br><br>


                    <label for="year">Year:</label>
                    <select id="month" name="year">
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select><br><br>

                    <label for="month">Month:</label>
                    <select id="month" name="month">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select><br><br>

                    <label for="domainDropdown" onclick="toggleDomainFields()" class="domainnames"
                        style="cursor: pointer;">
                        Domain Names:<i class=" fas fa-solid fa-angle-down"></i>
                    </label>

                    <div id="domainSection" style="display: none;">
                        <div id="domainFieldsContainer">
                            <!-- Domain fields will be dynamically added here -->
                        </div>
                    </div><br>

                    <label for="invalidDeduction">Invalid Deduction:</label>
                    <input type="text" id="invalidDeduction" name="invalidDeduction"><br>

                    <label for="conversionRate">Conversion Rate:</label>
                    <input type="text" id="conversionRate" name="conversionRate"><br>

                    <input type="submit" value="Submit">
                </form>

            </div>

             <!-- the footer start -->
             <?php include 'common/footer/footer.php' ?>
                <!-- the footer end -->
                 
        </div>

    </div>
    </div>

</body>

</html>