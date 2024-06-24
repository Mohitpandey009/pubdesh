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
                        <th>Publisher ID</th>
                        <th>Property</th>
                        <th>Domains</th>
                    </tr>
                    <?php
                    // Assuming $domain contains the fetched data including pub_id, PROP_id, domain_id, and domain
                    
                    // Group data by pub_id and property
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

                        $groupedData[$pub_id][$property][] = $row['domain'];
                    }

                    // Print the table
                    foreach ($groupedData as $pub_id => $properties) {
                        $pub_id_rowspan = count($properties);
                        $firstProperty = true;

                        foreach ($properties as $property => $domains) {
                            ?>
                            <tr>
                                <?php if ($firstProperty): ?>
                                    <td rowspan="<?= $pub_id_rowspan ?>"><?= htmlspecialchars($pub_id) ?></td>
                                    <?php $firstProperty = false; ?>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($property) ?></td>
                                <td>
                                    <?php foreach ($domains as $domain): ?>
                                        <?= htmlspecialchars($domain) ?><br>
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

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
    </div>
    </div>
</body>

</html>