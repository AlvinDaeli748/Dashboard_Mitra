<!-- Scroll To Top -->
<div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="<?= base_url('assets/libs/@popperjs/core/umd/popper.min.js') ?>"></script>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Defaultmenu JS -->
    <script src="<?= base_url('assets/js/defaultmenu.min.js') ?>"></script>

    <!-- Node Waves JS-->
    <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>

    <!-- Sticky JS -->
    <script src="<?= base_url('assets/js/sticky.js') ?>"></script>

    <!-- Simplebar JS -->
    <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/simplebar.js') ?>"></script>

    <!-- Color Picker JS -->
    <script src="<?= base_url('assets/libs/@simonwep/pickr/pickr.es5.min.js') ?>"></script>



    <!-- JSVector Maps JS -->
    <script src="<?= base_url('assets/libs/jsvectormap/js/jsvectormap.min.js') ?>"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="<?= base_url('assets/libs/jsvectormap/maps/world-merc.js') ?>"></script>

    <!-- Apex Charts JS -->
    <script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?>"></script>

    <!-- Chartjs Chart JS -->
    <script src="<?= base_url('assets/libs/chart.js/chart.min.js') ?>"></script>

    <!-- index -->
    <script src="<?= base_url('assets/js/index.js') ?>"></script>

    
    <!-- Custom-Switcher JS -->
    <script src="<?= base_url('assets/js/custom-switcher.min.js') ?>"></script>

    <!-- Echarts JS -->
    <!-- <script src="<?= base_url('assets/libs/echarts/echarts.min.js') ?>"></script> -->

    <!-- Internal Echarts JS -->
    <!-- <script src="<?= base_url('assets/js/echarts.js') ?>"></script> -->

    <!-- Custom JS -->
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>

<!-- jQuery (should be loaded first) -->
<script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Moment.js (for date manipulation) -->
<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>

<!-- DataTables JS -->
<script language="JavaScript" type="text/javascript" src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script language="JavaScript" type="text/javascript" src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"></script>

<!-- Popper.js (for Bootstrap tooltips/popovers) -->
<script language="JavaScript" type="text/javascript" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script language="JavaScript" type="text/javascript" src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Alerts JS -->
<script src="<?= base_url('assets/js/alerts.js') ?>"></script>

<!-- Import table to Excel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- Export to image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script type="text/javascript">
    //script Alert
    document.addEventListener('DOMContentLoaded', function () {
        var loginAlert = document.getElementById('fadeAlert');

        if (loginAlert) {
            setTimeout(function () {
                var alert = new bootstrap.Alert(loginAlert);
                alert.close();
            }, 300000);
        }
    });
    
    //script DataTable KPI
    $(document).ready(function() {
        $('#EstimasiKPI_Table').DataTable({
            order: [],
            lengthMenu: [10, 25, 50, { label: 'All', value: -1 }]
        });
    });

    // export excel
    document.getElementById('exportKPI_excel').addEventListener('click', function() {
        var table = document.getElementById('EstimasiKPI_Table');
        var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
        XLSX.writeFile(wb, 'Excel_Summary_KPI.xlsx');
    });

    //export gambar
    document.getElementById('exportKPI_gambar').addEventListener('click', function () {
        var dataTableWrapper = document.querySelector('#EstimasiKPI_Table');
        
        var clonedTable = dataTableWrapper.cloneNode(true);
        clonedTable.style.height = 'auto';
        clonedTable.style.overflow = 'visible';
        
        document.body.appendChild(clonedTable);  

        html2canvas(clonedTable).then(function (canvas) {
            var link = document.createElement('a');
            link.download = 'kpi.png';
            link.href = canvas.toDataURL('image/png');
            link.click();

            document.body.removeChild(clonedTable);
        });
    });

    // Ach Parameter
    $(document).ready(function() {
        $('#Ach_Parameter_Table').DataTable({
            order: [],
            scrollX: true,
            lengthMenu: [10, 25, 50, { label: 'All', value: -1 }]
        });
    });

    // export excel
    document.getElementById('exportAchParam_excel').addEventListener('click', function() {
        var table = document.getElementById('Ach_Parameter_Table');
        var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
        XLSX.writeFile(wb, 'Excel_Ach_Parameter_KPI.xlsx');
    });

    //export gambar
    document.getElementById('exportAchParam_gambar').addEventListener('click', function () {
        var dataTableWrapper = document.querySelector('#Ach_Parameter_Table');
        
        var clonedTable = dataTableWrapper.cloneNode(true);
        clonedTable.style.height = 'auto';
        clonedTable.style.overflow = 'visible';
        
        document.body.appendChild(clonedTable);  

        html2canvas(clonedTable).then(function (canvas) {
            var link = document.createElement('a');
            link.download = 'ach_parameter_kpi.png';
            link.href = canvas.toDataURL('image/png');
            link.click();

            document.body.removeChild(clonedTable);
        });
    });

    


    

</script>