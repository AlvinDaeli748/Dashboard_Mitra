<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Home </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin dashboard,dashboard design htmlbootstrap admin template,html admin panel,admin dashboard html,admin panel html template,bootstrap dashboard,html admin template,html dashboard,html admin dashboard template,bootstrap dashboard template,dashboard html template,bootstrap admin panel,dashboard admin bootstrap,bootstrap admin dashboard">

    <?= require('layout/header.php') ?>

    <style>
        .temp{
            max-width:100%;
            height:auto;
        }
    </style>

</head>

<body>

    <!-- Start Switcher -->
    <?= require('layout/switcher.php') ?>
    <!-- End Switcher -->


    <!-- Loader -->
    <div id="loader" >
        <img src="<?= base_url('assets/images/media/loader.svg') ?>" alt="">
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-container">
            <div id="fadeAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        <?= require('layout/navbar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    Welcome to Dashboard Channel Partnership Maintain Infra
                <!-- <img src="<?= base_url('/img/home_temp.png') ?>" class='temp'> -->
                <br>
                <!-- <img src="<?= base_url('/img/home_temp1.png') ?>" class='temp'> -->
                <br>
                <!-- <img src="<?= base_url('/img/home_temp2.png') ?>" class='temp'> -->
                <br>
                <!-- <img src="<?= base_url('/img/home_temp3.png') ?>" class='temp'> -->
                <!-- <h1 class="page-title my-auto">Selamat Datang!</h1> -->
                  <div>
                    <!-- <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                    </ol> -->
                  </div>
                </div>
                <!-- PAGE-HEADER END -->



                
                
            </div>
        </div>
        <!-- End::app-content -->



        <!-- Footer Start -->
        <?= require('layout/footer_copyright.php') ?>
        <!-- Footer End -->

    </div>

    
    <?= require('layout/footer.php') ?>

</body>

</html>