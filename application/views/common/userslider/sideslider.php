<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="#" class="logo">
            <img src="<?php echo base_url('assets/img/kaiadmin/logo_light.svg') ?>" alt="navbar brand" class="navbar-brand" height="20" />
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <li class="nav-item active">
              <a href="<?php echo base_url('userdashboard') ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span class="sub-item">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#domainsMenu" aria-expanded="false" class="collapsed">
                <i class="fas fa-globe"></i>
                <p>Domains</p>
                <span class="caret"></span>
              </a>

              <div class="collapse" id="domainsMenu">
                <ul class="nav nav-collapse">
                  <?php 
                    $printed_properties = array();
                    foreach($domain as $d): 
                      if(!in_array($d->property, $printed_properties)):
                        $printed_properties[] = $d->property;
                  ?>
                    <li>
                    <a href="<?= base_url('propertydomain/' . $d->prop_id); ?>">

                        <span class="sub-item"><?php echo $d->property; ?></span>
                      </a>
                    </li>
                  <?php 
                      endif;
                    endforeach; 
                  ?>
                </ul>
              </div>
              
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="fas fa-file-alt"></i>
                <p>Reports</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('userpayments') ?>">
                <i class="fas fa-credit-card"></i>
                <p>Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="fas fa-file-invoice"></i>
                <p>Generate Invoice</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->
  </div>

  <!-- JavaScript Files -->
  
</div>

