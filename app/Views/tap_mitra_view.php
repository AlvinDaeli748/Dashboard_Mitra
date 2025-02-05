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
                <div class="alert-header">
                    <strong>Error!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <div class="alert-body">
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
                </div>
            </div>
        </div>
    <?php elseif (session()->getFlashdata('success')): ?>
        <div class="alert-container">
            <div id="fadeAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?= esc(session()->getFlashdata('success')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
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
                  <h1 class="page-title my-auto">TAP Mitra</h1>
                  <div>
                    <h3>Update: <?= $newDate ?></h3>
                  </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Input Section - Mitra -->
         
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
                                    <option value="" disabled> - </option>
                                </select>

                                <label for="cluster" class="form-label mt-3">Cluster <span style="color:red">*</span></label>
                                <select class="form-control" id="cluster" name="cluster" required style="width: 100%;">
                                    <option value="" disabled> - </option>
                                </select>

                                <label for="city" class="form-label mt-3">City <span style="color:red">*</span></label>
                                <select class="form-control" id="city" name="city" required style="width: 100%;">
                                    <option value="" disabled> - </option>
                                </select>

                                <label for="mitra" class="form-label mt-3">Mitra <span style="color:red">*</span></label>
                                <select class="form-control" id="mitra" name="mitra" required style="width: 100%;">
                                    <option value="" disabled> - </option>
                                </select>

                                <label for="nama_tap" class="form-label mt-3">Nama TAP <span style="color:red">*</span></label>
                                <select class="form-control" id="nama_tap" name="nama_tap" required style="width: 100%;">
                                    <option value="" disabled> - </option>
                                </select>

                                <label for="alamat" class="form-label mt-3">Alamat <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="alamat" name="alamat" 
                                    placeholder="Contoh: Jl. Balai Kota, No.2, Sumatera Utara" 
                                    required 
                                    oninput="validateAlamat(this)">

                                <small id="alamatError" style="color: red; display: none;">Hanya boleh huruf, angka, spasi, titik (.), koma (,), garis miring (/), tanda hubung (-), dan kurung ().</small>
                            </div>

                            <!-- Right Column for File Uploads -->
                            <div class="col-md-6">
                                <label for="foto_1" class="form-label">Fascade Depan <span style="color:red">* Max: 2 MB</span></label>
                                <input class="form-control" type="file" id="foto_1" name="foto_1" accept="image/*" required>

                                <label for="foto_2" class="form-label mt-3">Ruang Receptionist <span style="color:red">* Max: 2 MB</span></label>
                                <input class="form-control" type="file" id="foto_2" name="foto_2" accept="image/*" required>

                                <label for="foto_3" class="form-label mt-3">WH <span style="color:red">* Max: 2 MB</span></label>
                                <input class="form-control" type="file" id="foto_3" name="foto_3" accept="image/*" required>

                                <label for="foto_4" class="form-label mt-3">Meeting Room <span style="color:red">* Max: 2 MB</span></label>
                                <input class="form-control" type="file" id="foto_4" name="foto_4" accept="image/*" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-info mt-3">Submit</button>
                    </form>
                </div>

                <!-- Input Section - Mitra END -->

                <!-- View Section - Mitra -->
                <br><br>
                <h3>Data TAP Mitra</h3>
                <table id="TAP_Mitra_Table" class="ui celled table table-striped table-hover" style="white-space:nowrap !important;" data-page-length='-1'>
                    <thead style="white-space:nowrap; text-align:center !important;">
                        <tr>
                            <th style="background-color:#156082; color:white;">Region</th>
                            <th style="background-color:#156082; color:white;">Branch</th>
                            <th style="background-color:#156082; color:white;">Cluster</th>
                            <th style="background-color:#156082; color:white;">City</th>
                            <th style="background-color:#156082; color:white;">Mitra</th>
                            <th style="background-color:#156082; color:white;">Nama TAP</th>
                            <th style="background-color:#156082; color:white;">Alamat</th>

                            <th style="background-color:#C00000; color:white;">Foto 1</th>
                            <th style="background-color:#C00000; color:white;">Foto 2</th>
                            <th style="background-color:#C00000; color:white;">Foto 3</th>
                            <th style="background-color:#C00000; color:white;">Foto 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dataTAPMitra)): ?>
                            <?php foreach ($dataTAPMitra as $row): ?>
                              <tr>
                                <td><?= esc($row->region) ?></td>
                                <td><?= esc($row->branch) ?></td>
                                <td><?= esc($row->cluster) ?></td>
                                <td><?= esc($row->city) ?></td>
                                <td><?= esc($row->mitra) ?></td>
                                <td><?= esc($row->nama_tap) ?></td>
                                <td><?= esc($row->alamat) ?></td>
                                
                                <td>
                                    <a href="javascript:void(0);" onclick="openImageModal('<?= base_url('uploads/mitra/' . esc($row->foto_1)) ?>')">
                                        Fascade<br>Depan
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="openImageModal('<?= base_url('uploads/mitra/' . esc($row->foto_2)) ?>')">
                                        Ruang<br>Receptionist
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="openImageModal('<?= base_url('uploads/mitra/' . esc($row->foto_3)) ?>')">
                                        WH
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="openImageModal('<?= base_url('uploads/mitra/' . esc($row->foto_4)) ?>')">
                                        Meeting<br>Room
                                    </a>
                                </td>

                                
                              </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                          
                        <?php endif; ?>
                    </tbody>
                </table>
                <!-- View Section - Mitra END -->


            </div>
        </div>
        <!-- End::app-content -->

        <!-- Image Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" class="img-fluid" alt="Preview">
                    </div>
                </div>
            </div>
        </div>
        <!-- Image Modal END -->




        <!-- Footer Start -->
        <?= require('layout/footer_copyright.php') ?>
        <!-- Footer End -->

    </div>

    
    <?= require('layout/footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openImageModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
            myModal.show();
        }

        function validateAlamat(input) {
            const regex = /^[a-zA-Z0-9\s.,\/\-\()]*$/;
            const errorText = document.getElementById("alamatError");

            if (!regex.test(input.value)) {
                errorText.style.display = "block"; // Show error message
                input.value = input.value.replace(/[^a-zA-Z0-9\s.,\/\-\()]/g, ''); // Remove invalid characters
            } else {
                errorText.style.display = "none"; // Hide error message
            }
        }

        document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function () {
            const file = this.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB in bytes

            if (file) {
                if (!file.type.startsWith('image/')) { // Check MIME type
                    alert('Hanya file gambar yang diperbolehkan.');
                    this.value = ''; // Reset input field
                    return;
                }
                
                if (file.size > maxSize) { // Check file size
                    alert('Ukuran file harus 2MB atau lebih kecil.');
                    this.value = ''; // Reset input field
                    return;
                }
            }
        });
    });

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
                        $("#cluster").html('<option value="" disabled> - </option>');
                        $("#city").html('<option value="" disabled> - </option>');
                        $("#mitra").html('<option value="" disabled> - </option>');
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
                        $("#city").html('<option value="" disabled> - </option>');
                        $("#mitra").html('<option value="" disabled> - </option>');
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
                        $("#mitra").html('<option value="" disabled> - </option>');
                    }
                });
            });

            // Load Mitras when City is selected
            $("#city").change(function () {
                var city = $(this).val();

                if (city) {
                    $.ajax({
                        url: "<?= base_url('tap_mitra/getMitras') ?>",
                        type: "POST",
                        data: { city: city },
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                // Populate Mitra dropdown
                                $("#mitra").html(response.mitraOptions);
                                $("#nama_tap").val(''); // Clear TAP field

                                // Auto-select first Mitra if available
                                if (response.autoSelectMitra) {
                                    $("#mitra").val(response.autoSelectMitra).trigger('change');
                                }
                            }
                        }
                    });
                }
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

            // Reset dropdowns when a higher-level selection changes
            $("#region").change(function () {
                $("#branch").html('<option value="">Pilih Branch</option>');
                $("#cluster").html('<option value="" disabled> - </option>');
                $("#city").html('<option value="" disabled> - </option>');
                $("#mitra").html('<option value="" disabled> - </option>');
                $("#nama_tap").html('<option value="" disabled> - </option>');
            });

            $("#branch").change(function () {
                $("#cluster").html('<option value="">Pilih Cluster</option>');
                $("#city").html('<option value="" disabled> - </option>');
                $("#mitra").html('<option value="" disabled> - </option>');
                $("#nama_tap").html('<option value="" disabled> - </option>');
            });

            $("#cluster").change(function () {
                $("#city").html('<option value="">Pilih City</option>');
                $("#mitra").html('<option value="" disabled> - </option>');
                $("#nama_tap").html('<option value="" disabled> - </option>');
            });


            $('#TAP_Mitra_Table').DataTable({
              ordering: false,
              scrollX: true,
              lengthMenu: [10, 25, 50, { label: 'All', value: -1 }],
              createdRow: function(row, data, dataIndex) {
                    // Loop through each cell in the row
                    $('td', row).each(function(index) {
                        var cellValue = $(this).text(); // Get the cell text value

                        // Additional condition for values less than 0 or "0%" and style them with a different color
                        if (cellValue === "0%" || parseFloat(cellValue) <= 0 || cellValue === "0") {
                            $(this).css({ 'background-color': 'RGBA(255,0,0,0.1)' }); // Set background to red if value is 0 or less
                        }
                    });
                }
          });

          $('#TAP_MitraFilter').on('change', function() {
              $('#TAP_Mitra_Table').DataTable().ajax.reload(); // Use the correct reference to the DataTable
          });

        });


      // export excel
      document.getElementById('exportTAP_Mitra_excel').addEventListener('click', function() {
          var table = document.getElementById('TAP_Mitra_Table');
          var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
          XLSX.writeFile(wb, 'Excel_TAP_Mitra.xlsx');
      });

      //export gambar
      document.getElementById('exportTAP_Mitra_gambar').addEventListener('click', function () {
          var dataTableWrapper = document.querySelector('#TAP_Mitra_Table');
          
          var clonedTable = dataTableWrapper.cloneNode(true);
          clonedTable.style.height = 'auto';
          clonedTable.style.overflow = 'visible';
          
          document.body.appendChild(clonedTable);  

          html2canvas(clonedTable).then(function (canvas) {
              var link = document.createElement('a');
              link.download = 'TAP_Mitra.png';
              link.href = canvas.toDataURL('image/png');
              link.click();

              document.body.removeChild(clonedTable);
          });
      });
    </script>
</body>

</html>