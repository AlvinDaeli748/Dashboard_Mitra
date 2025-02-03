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

<!-- Import table to Excel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- Export to image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


<!-- Alert -->
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