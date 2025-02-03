<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashboard Captain - Login </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin dashboard,dashboard design htmlbootstrap admin template,html admin panel,admin dashboard html,admin panel html template,bootstrap dashboard,html admin template,html dashboard,html admin dashboard template,bootstrap dashboard template,dashboard html template,bootstrap admin panel,dashboard admin bootstrap,bootstrap admin dashboard">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/images/brand-logos/favicon.ico') ?>" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="<?= base_url('assets/js/authentication-main.js') ?>"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" >

    <!-- Style Css -->
    <link href="<?= base_url('assets/css/styles.min.css') ?>" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" >

    <style>
        .alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }

        .alert {
            min-width: 250px;
        }
    </style>

</head>

<body>
    <div class="alert-container">
        <img src="<?= base_url('/img/logo-telkomsel-black.png') ?>" height="75px" alt="logo" class="desktop-logo">
        
        <?php if (session()->getFlashdata('error')): ?>
        <div id="fadeAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        
    </div>

    <!-- Loader -->
    <div id="loader" >
        <img src="<?= base_url('assets/images/media/loader.svg') ?>" alt="">
    </div>
    <!-- Loader -->

    <div class="autentication-bg">

        <div class="container-lg">
            <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="my-4 d-flex justify-content-center">
                        <a href="<?= base_url('ch_dashboard') ?>">
                            <!-- Disini Logo -->

                            <!-- <img src="<?= base_url('assets/images/brand-logos/desktop-white.png') ?>" alt="logo"> -->
                        </a>
                    </div>
                    <div class="card custom-card">
                        <div class="card-body p-5">
                            <p class="h5 fw-semibold mb-2 text-center">Dashboard CAPTAIN</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Selamat datang!</p>
                            <div class="row gy-3">
                                <form action="<?= base_url('/login/auth') ?>" method="post">
                                    <div class="col-xl-12">
                                        <label for="username" class="form-label text-default">Username Mitra</label>
                                        <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Contoh: 98765">
                                    </div>
                                    <br>
                                    <div class="col-xl-12 mb-2">
                                        <label for="signin-password" class="form-label text-default d-block">Password</label>
                                        <!-- <label for="password" class="form-label text-default">Password<a href="reset-password.html" class="float-end text-danger">Forget password ?</a></label> -->
                                        <div class="input-group">
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="password">
                                            <button class="btn btn-light" type="button" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                        </div>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                    Remember password ?
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 d-grid mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary" style="color: black !important">Log In</button>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="text-center">
                                <p class="text-muted mt-3">Dont have an account? <a href="sign-up.html" class="text-primary">Sign Up</a></p>
                            </div>
                            <div class="text-center my-3 authentication-barrier">
                                <span>OR</span>
                            </div>
                            <div class="btn-list text-center">
                                <button type="button" aria-label="button" class="btn btn-icon btn-primary-transparent">
                                    <i class="ri-facebook-fill"></i>
                                </button>
                                <button type="button" aria-label="button" class="btn btn-icon btn-primary-transparent">
                                    <i class="ri-google-fill"></i>
                                </button>
                                <button type="button" aria-label="button" class="btn btn-icon btn-primary-transparent">
                                    <i class="ri-twitter-fill"></i>
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Custom-Switcher JS -->
    <script src="<?= base_url('assets/js/custom-switcher.min.js') ?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Show Password JS -->
    <script src="<?= base_url('assets/js/show-password.js') ?>"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var loginAlert = document.getElementById('fadeAlert');

            if (loginAlert) {
                setTimeout(function () {
                    var alert = new bootstrap.Alert(loginAlert);
                    alert.close();
                }, 5000);
            }
        });
    </script>

</body>

</html>