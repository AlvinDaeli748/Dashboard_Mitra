<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> TAP Mitra </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin dashboard,dashboard design htmlbootstrap admin template,html admin panel,admin dashboard html,admin panel html template,bootstrap dashboard,html admin template,html dashboard,html admin dashboard template,bootstrap dashboard template,dashboard html template,bootstrap admin panel,dashboard admin bootstrap,bootstrap admin dashboard">

    <?= require('layout/header.php') ?>

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
                <strong>Error!</strong>
                <?php 
                    $errors = session()->getFlashdata('error');
                    if (is_array($errors)) {
                        echo '<ul>';
                        foreach ($errors as $error) {
                            echo '<li>' . esc($error) . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo esc($errors);
                    }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php elseif (session()->getFlashdata('success')): ?>
        <div class="alert-container">
            <div id="fadeAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?= esc(session()->getFlashdata('success')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        <?= require('layout/navbar.php') ?>
        <!-- End::app-sidebar -->
        <?php 
            $newDate = "?";
        ?>
        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                  <h1 class="page-title my-auto">Input TAP Mitra</h1>
                  <div>
                    <h3>Update: <?= $newDate ?></h3>
                  </div>
                </div>
                <!-- PAGE-HEADER END -->
         
                <div class="card-body">
                    <form action="<?= base_url('tap_mitra/save') ?>" method="post" enctype="multipart/form-data">
                        <div class="row gy-3">
                            <!-- Left Column for Select Inputs -->
                            <div class="col-md-6">
                                <label for="region" class="form-label">Region <span style="color:red">*</span></label>
                                <select class="form-control" id="region" name="region" required style="width: 100%;">
                                    <option value="">Pilih Region</option>
                                    <option value="SUMBAGUT">SUMBAGUT</option>
                                    <option value="SUMBAGTENG">SUMBAGTENG</option>
                                    <option value="SUMBAGSEL">SUMBAGSEL</option>
                                </select>

                                <label for="branch" class="form-label mt-3">Branch <span style="color:red">*</span></label>
                                <select class="form-control" id="branch" name="branch" required style="width: 100%;">
                                    <option value="">Pilih Branch</option>
                                </select>

                                <label for="cluster" class="form-label mt-3">Cluster <span style="color:red">*</span></label>
                                <select class="form-control" id="cluster" name="cluster" required style="width: 100%;">
                                    <option value="">Pilih Cluster</option>
                                </select>

                                <label for="city" class="form-label mt-3">City <span style="color:red">*</span></label>
                                <select class="form-control" id="city" name="city" required style="width: 100%;">
                                    <option value="">Pilih City</option>
                                </select>

                                <label for="mitra" class="form-label mt-3">Mitra <span style="color:red">*</span></label>
                                <select class="form-control" id="mitra" name="mitra" required style="width: 100%;">
                                    <option value="">Pilih Mitra</option>
                                </select>

                                <label for="nama_tap" class="form-label mt-3">Nama TAP <span style="color:red">*</span></label>
                                <select class="form-control" id="nama_tap" name="nama_tap" required style="width: 100%;">
                                    <option value="">Pilih TAP</option>
                                </select>

                                <label for="alamat" class="form-label mt-3">Alamat <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Contoh: Jl. Balai Kota, No.2, Sumatera Utara" required>
                            </div>

                            <!-- Right Column for File Uploads -->
                            <div class="col-md-6">
                                <label for="foto_1" class="form-label">Fascade Depan <span style="color:red">*</span></label>
                                <input class="form-control" type="file" id="foto_1" name="foto_1" required>

                                <label for="foto_2" class="form-label mt-3">Ruang Receptionist <span style="color:red">*</span></label>
                                <input class="form-control" type="file" id="foto_2" name="foto_2" required>

                                <label for="foto_3" class="form-label mt-3">WH <span style="color:red">*</span></label>
                                <input class="form-control" type="file" id="foto_3" name="foto_3" required>

                                <label for="foto_4" class="form-label mt-3">Meeting Room <span style="color:red">*</span></label>
                                <input class="form-control" type="file" id="foto_4" name="foto_4" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info mt-3">Submit</button>
                    </form>
                </div>



            </div>
        </div>
        <!-- End::app-content -->



        <!-- Footer Start -->
        <?= require('layout/footer_copyright.php') ?>
        <!-- Footer End -->

    </div>

    
    <?= require('layout/footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Load Branches when Region is selected
            $("#region").change(function () {
                var region = $(this).val();
                $.ajax({
                    url: "<?= base_url('tap_mitra/getBranches') ?>",
                    type: "POST",
                    data: { region: region },
                    success: function (data) {
                        $("#branch").html(data);
                        $("#cluster").html('<option value="">Pilih Cluster</option>');
                        $("#city").html('<option value="">Pilih City</option>');
                        $("#mitra").html('<option value="">Pilih Mitra</option>');
                    }
                });
            });

            // Load Clusters when Branch is selected
            $("#branch").change(function () {
                var branch = $(this).val();
                $.ajax({
                    url: "<?= base_url('tap_mitra/getClusters') ?>",
                    type: "POST",
                    data: { branch: branch },
                    success: function (data) {
                        $("#cluster").html(data);
                        $("#city").html('<option value="">Pilih City</option>');
                        $("#mitra").html('<option value="">Pilih Mitra</option>');
                    }
                });
            });

            // Load Cities when Cluster is selected
            $("#cluster").change(function () {
                var cluster = $(this).val();
                $.ajax({
                    url: "<?= base_url('tap_mitra/getCities') ?>",
                    type: "POST",
                    data: { cluster: cluster },
                    success: function (data) {
                        $("#city").html(data);
                        $("#mitra").html('<option value="">Pilih Mitra</option>');
                    }
                });
            });

            // Load Mitras when City is selected
            $("#city").change(function () {
                var city = $(this).val();
                $.ajax({
                    url: "<?= base_url('tap_mitra/getMitras') ?>",
                    type: "POST",
                    data: { city: city },
                    success: function (data) {
                        $("#mitra").html(data);
                    }
                });
            });

            // Reset dropdowns when a higher-level selection changes
            $("#region").change(function () {
                $("#branch").html('<option value="">Pilih Branch</option>');
                $("#cluster").html('<option value="">Pilih Cluster</option>');
                $("#city").html('<option value="">Pilih City</option>');
                $("#mitra").html('<option value="">Pilih Mitra</option>');
                $("#nama_tap").html('<option value="">Pilih TAP</option>');
            });

            $("#branch").change(function () {
                $("#cluster").html('<option value="">Pilih Cluster</option>');
                $("#city").html('<option value="">Pilih City</option>');
                $("#mitra").html('<option value="">Pilih Mitra</option>');
                $("#nama_tap").html('<option value="">Pilih TAP</option>');
            });

            $("#cluster").change(function () {
                $("#city").html('<option value="">Pilih City</option>');
                $("#mitra").html('<option value="">Pilih Mitra</option>');
                $("#nama_tap").html('<option value="">Pilih TAP</option>');
            });

            $("#city").change(function () {
                $("#mitra").html('<option value="">Pilih Mitra</option>');
                $("#nama_tap").html('<option value="">Pilih TAP</option>');
            });

            // Load TAP when Mitra is selected
            $("#mitra").change(function () {
                var region = $("#region").val();
                var branch = $("#branch").val();
                var cluster = $("#cluster").val();
                var city = $("#city").val();
                var mitra = $(this).val();

                $.ajax({
                    url: "<?= base_url('tap_mitra/getNamaTAP') ?>",
                    type: "POST",
                    data: { region: region, branch: branch, cluster: cluster, city: city, mitra: mitra },
                    success: function (data) {
                        var response = JSON.parse(data);
                        $("#nama_tap").html(response.options);

                        if (response.autoFill) {
                            $("#nama_tap").val(response.autoFill);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>