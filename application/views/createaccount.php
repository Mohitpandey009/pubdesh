<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <script src="<?php echo base_url('assets/js/plugin/webfont/webfont.min.js')?>"></script>
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
                urls: ["<?php echo base_url('assets/css/fonts.min.css')?>"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/kaiadmin.min.css')?>" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css')?>" />
    <style>
        .container {
            margin-bottom: 150px; /* Provide space for the footer */
            overflow: hidden;
        }
        .footer {
          margin-top: 20px;
            overflow: hidden;
            position: fixed;
            bottom: 0;
            height: 130px;
           
        }
    </style>
</head>

<body>
    <nav class="topnav" id="topnav">
        <div class="maindiv">
            <div class="logodiv">
                <a href="#" class="logo">
                    <img src="https://static.thenounproject.com/png/603655-200.png" alt="Logo">
                </a>
            </div>
            <a href="<?php echo base_url('pubroute_controller/index')?>" class="active">Login</a>
            <a href="<?php echo base_url('pubroute_controller/userRegister')?>">Register</a>
            <button class="icon" onclick="toggle()"><img
                    src="<?php echo base_url('assets/img/png-clipart-hamburger-button-computer-icons-marmon-keystone-canada-menu-red-sea-removebg-preview.png')?>"
                    alt=""></button>
        </div>
    </nav>

    <div class="container">
        <div class="row" style="display: block;">
            <div class="col-lg-12" style="margin: 30px 0px;">
                <div class="createform">
                    <form action="<?php echo base_url('User_controller/register'); ?>" method="post">
                      
                    <h2 style="text-align: center; font-weight: bold;">Create Account</h2>

                            <?php if (isset($error)) { ?>
                                <div style="color: red; margin-bottom: 15px;">
                                    <?php echo $error; ?>
                                </div>
                            <?php } ?>

                    <div class="form-group">
                        <label for="password">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="name"/>
                        <small><?php echo form_error('name'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="number"/>
                        <small><?php echo form_error('number'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="email2">Email Address</label>
                        <input type="email" class="form-control" id="email2" name="email"/>
                        <small id="emailHelp2" class="form-text text-muted">We'll never share your email
                            with anyone
                            else.</small>
                            <small><?php echo form_error('email'); ?></small>
                    </div>

                    <div class="form-group">

                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"/>
                        <small><?php echo form_error('password'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="cpassword"/>
                        <small><?php echo form_error('cpassword'); ?></small>
                    </div>
                    
                    <div class="" style="display: flex; justify-content: center;">
                        <p style="margin: 0px 7px;">You have an account</p>
                        <a href="#" style="margin-top: 3px;font-size: 15px;">log in</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer bg-body-tertiary fixed-bottom">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="color: white;">
                <h4>Created by <a href="https://codepen.io/MFM-347" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@MFM-347</a></h4>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column"style="color: white;" >
                <h5>Powered By</h5>
                <ul class="mt-2 list-unstyled">
                    <li><a href="https://github.com/twbs/bootstrap" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">BootStrap</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
<script>const toggle = () => {
        const nav = document.getElementById("topnav");
        nav.className === "topnav" ? nav.className += " responsive" : nav.className = "topnav";
    };</script>

</html>