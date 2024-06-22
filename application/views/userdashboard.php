<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/kaiadmin.min.css')?>" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css')?>" />
  </head>
  <body>
    <div class="wrapper">
      
            <!-- the slider included -->
            <?php include'common/userslider/sideslider.php';?>
             <!-- the slider included end-->

      <div class="main-panel">

        <!-- the header start-->
       <?php include'common/header.php';?>
       <!-- the header end-->
        
          <div class="container">
              <div class="page-inner">
                  <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                      <div>
                          <h2>Hello And Admin Name</h2>
                          <h3 class="mb-3">Dashboard</h3>
                      </div>

                  </div>
                  <div class="row">
                  </div>
              </div>

              <footer class="footer" >
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
