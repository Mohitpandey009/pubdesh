<div class="main-header">
    <!-- Main Header Logo -->
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <!-- Navigation Toggle Buttons -->
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <!-- Topbar Toggler Button -->
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <!-- Topbar Navigation -->
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <!-- Bank Details Link -->
                <li class="nav-item topbar-icon hidden-caret">
                    <a class="nav-link bank-button" href="http://localhost/pubdesh/bankdetails" aria-expanded="false">
                        <i class="fas fa-university"></i>
                    </a>
                </li>
                <!-- User Profile Dropdown -->
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="http://localhost/pubdesh/assets/img/profileavtar/avtar.png" alt="..." class="avatar-img rounded-circle" />
                        </div>
                    </a>
                    <!-- Dropdown Menu for User Profile -->
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img src="http://localhost/pubdesh/assets/img/profileavtar/avtar.png" alt="image profile" class="avatar-img rounded" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://localhost/pubdesh/profile">View Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="http://localhost/pubdesh/User_controller/logout">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
