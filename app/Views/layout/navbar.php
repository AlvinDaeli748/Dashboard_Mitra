<style>
    /* Override Fomantic-UI font-family with Roboto */
    body {
        font-family: 'Roboto', sans-serif;
    }

    .ui.header, .ui.button, .ui.text {
        font-family: 'Roboto', sans-serif !important;
    }

    h1, h2, h3, h4, h5 {
        font-family: 'Roboto', sans-serif !important;
    }
    /* The Modal (background) */
    #loadingModal {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7); /* Black with transparency */
        display: none;
    }

    /* Modal Content */
    #loadingModalContent {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
    }

    /* Simple spinner */
    #spinner {
        border: 4px solid #f3f3f3; /* Light gray */
        border-top: 4px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
        margin: 20px auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<!-- Modal for Loading -->
<div id="loadingModal" style="display: none;">
    <div id="loadingModalContent">
        <h3>Loading files...</h3>
        <div id="spinner"></div>
        <p>Please wait while we prepare your download.</p>
        <p id="elapsedTime">Elapsed Time: unknown</p> <!-- This is where elapsed time will be displayed -->
    </div>
</div>
<!-- app-header -->
<header class="app-header" style="background: #FF0000;">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="<?= base_url('ch_dashboard') ?>" class="header-logo">
                        <img src="<?= base_url('assets/images/brand-logos/desktop-logo.png') ?>" alt="logo" class="desktop-logo">
                        <img src="<?= base_url('assets/images/brand-logos/toggle-logo.png') ?>" alt="logo" class="toggle-logo">
                        <img src="<?= base_url('assets/images/brand-logos/desktop-dark.png') ?>" alt="logo" class="desktop-dark">
                        <img src="<?= base_url('assets/images/brand-logos/toggle-dark.png') ?>" alt="logo" class="toggle-dark">
                        <img src="<?= base_url('assets/images/brand-logos/desktop-white.png') ?>" alt="logo" class="desktop-white">
                        <img src="<?= base_url('assets/images/brand-logos/toggle-white.png') ?>" alt="logo" class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);" style="color:white !important;"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-middle -->
            <div class="header-element">
                <div class="d-flex align-items-center">
                    <h3 style="color:white; text-align:center;">Dashboard Monitoring Partnership Mobile Performances<br>Area Sumatera</h3>
                </div>
            </div>
        <!-- End::header-content-middle -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="d-flex align-items-center">
                    <p class="header-logo">
                        <img src="<?= base_url('/img/logo-telkomsel-white.png') ?>" height="45px" alt="logo" class="desktop-logo">
                    </p>
                </div>
            </div>
            <!-- End::header-element -->


            <!-- Start::header-element -->
            <div class="header-element main-profile-user">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-xxl-2 me-0">
                            <img src="<?= base_url('/img/Telkomsel_2021_icon.svg') ?>" alt="img" width="32" height="32" class="rounded-circle">
                        </div>
                        <div class="d-xxl-block d-none my-auto">
                            <h6 class="fw-semibold mb-0 lh-1 fs-14" style="color:white;"><?= session()->get('name') ?></h6>
                            <span class="op-7 fw-normal d-block fs-11" style="color:white;"><?= session()->get('role') ?></span>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                    <li class="drop-heading d-xxl-none d-block">
                        <div class="text-center">
                            <h5 class="text-dark mb-0 fs-14 fw-semibold"><?= session()->get('name') ?></h5>
                            <small class="text-muted"><?= session()->get('role') ?></small>
                        </div>
                    </li>
                    <!-- <li class="dropdown-item"><a class="d-flex w-100" href="profile.html"><i class="fe fe-user fs-18 me-2 text-primary"></i>Profile</a></li> -->
                    <!-- <li class="dropdown-item"><a class="d-flex w-100" href="mail.html"><i class="fe fe-mail fs-18 me-2 text-primary"></i>Inbox <span class="badge bg-danger ms-auto">25</span></a></li> -->
                    <!-- <li class="dropdown-item"><a class="d-flex w-100" href="mail-settings.html"><i class="fe fe-settings fs-18 me-2 text-primary"></i>Settings</a></li> -->
                    <!-- <li class="dropdown-item"><a class="d-flex w-100" href="chat.html"><i class="fe fe-headphones fs-18 me-2 text-primary"></i>Support</a></li> -->
                    <!-- <li class="dropdown-item"><a class="d-flex w-100" href="lockscreen.html"><i class="fe fe-lock fs-18 me-2 text-primary"></i>Lockscreen</a></li> -->
                    <li class="dropdown-item"><a class="d-flex w-100" href="<?= base_url('/logout') ?>"><i class="fe fe-info fs-18 me-2 text-primary"></i>Log Out</a></li>
                </ul>
            </div>
            <!-- End::header-element -->


        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>
<!-- /app-header -->

<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar" style="background: #002060 !important;">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header" style="background: #002060 !important;">
        <a href="<?= base_url('home') ?>" class="header-logo">
            <img src="<?= base_url('/img/logo_captain.png') ?>" alt="logo" class="desktop-logo" height="60px">
             <!-- <p>CAPTAIN</p><br> -->
             <!-- <p>Channel Partnership<br>Maintain Infra</p> -->
            <img src="<?= base_url('/img/Telkomsel_2021_icon.svg') ?>" alt="logo" class="toggle-logo" width="60px" height="60px">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <!-- <li class="slide__category"><span class="category-name" style="color:white;">Menu</span></li> -->
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <!-- <li class="slide active">
                    <a href="<?= base_url('/'); ?>" class="side-menu__item">
                        <i class="fe fe-home side-menu__icon" style="color:white !important;"></i>
                        <span class="side-menu__label" style="color:white;">Home</span>
                    </a>
                </li> -->
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <!-- <li class="slide__category"><span class="category-name" style="color:white; font">Partnership</span></li> -->
                <!-- End::slide__category -->

                <!-- Start::slide -->
                 <?php if((current_url() == site_url('/#')) ): ?>
                <!-- <li class="slide has-sub active open"> -->
                 <?php else: ?>
                <!-- <li class="slide has-sub"> -->
                 <?php endif; ?>
                <li class="slide has-sub active open">
                    <p class="side-menu__item">
                        <i class="fe fe-file-text side-menu__icon" style="color:white !important; "></i>
                        <span class="side-menu__label" style="color:white;">Data Infrastruktur</span>
                        <!-- <i class="fe fe-chevron-right side-menu__angle" style="color:white !important;"></i> -->
                    </p>

                    <ul class="slide-menu child1" style="color:white !important;">
                        <li class="slide active open">
                            <a href="<?= base_url('#') ?>" class="side-menu__item <?= (current_url() == site_url('/#')) ? 'active' : ''; ?>" style="color:white !important;">Data TAP Mitra</a>
                        </li>
                    </ul>
           
                
                
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script>
    var baseURL = "<?= base_url(); ?>";

    // Global variables for timer
    let startTime, timerInterval;

    function startLoading() {
        // Show the loading modal
        document.getElementById('loadingModal').style.display = 'block';

        // Set the start time when the loading begins
        startTime = Date.now();

        // Start the timer to update elapsed time every second
        timerInterval = setInterval(updateElapsedTime, 1000);
    }

    function updateElapsedTime() {
        // Calculate elapsed time in seconds
        const elapsed = Math.floor((Date.now() - startTime) / 1000);

        // Convert seconds into minutes, and hours if needed
        let timeDisplay = '';

        if (elapsed >= 3600) {
            // If elapsed time is more than 3600 seconds (1 hour), show hours:minutes:seconds
            const hours = Math.floor(elapsed / 3600);
            const minutes = Math.floor((elapsed % 3600) / 60);
            const seconds = elapsed % 60;
            timeDisplay = `${hours}h ${minutes}m ${seconds}s`;
        } else if (elapsed >= 60) {
            // If elapsed time is more than 60 seconds, show minutes:seconds
            const minutes = Math.floor(elapsed / 60);
            const seconds = elapsed % 60;
            timeDisplay = `${minutes}m ${seconds}s`;
        } else {
            // If less than 60 seconds, show seconds only
            timeDisplay = `${elapsed}s`;
        }

        // Update the displayed elapsed time in the modal
        document.getElementById('elapsedTime').textContent = `Elapsed Time: ${timeDisplay}`;
    }

    function stopLoading() {
        // Stop the timer when loading is complete
        clearInterval(timerInterval);

        // Hide the loading modal
        document.getElementById('loadingModal').style.display = 'none';
    }

    // Utility function for limiting concurrent fetches
    async function fetchWithConcurrency(urls, concurrency, callback) {
        const results = [];
        const executing = [];

        for (const url of urls) {
            const fetchPromise = callback(url).then(result => results.push(result));
            executing.push(fetchPromise);

            // Limit the number of concurrent fetches
            if (executing.length >= concurrency) {
                await Promise.race(executing);
                executing.splice(executing.findIndex(p => p === fetchPromise), 1);
            }
        }

        // Wait for remaining fetches
        await Promise.all(executing);
        return results;
    }

    // Function to download multiple files as a zip
    async function downloadFiles(folderName) {
        startLoading(); // Show loading modal

        try {
            // Fetch file list from the server
            const fileResponse = await fetch(`${baseURL}/ch_dashboard/download/getFiles?data=${folderName}`);
            const files = await fileResponse.json();

            const zip = new JSZip();
            const concurrencyLimit = 5; // Adjust this based on system/network capabilities

            // Fetch files with concurrency control
            await fetchWithConcurrency(
                files.map(file => `${baseURL}/ch_dashboard/download/serve/${folderName}/${file}`),
                concurrencyLimit,
                async (url) => {
                    try {
                        const response = await fetch(url);
                        const blob = await response.blob();
                        const fileName = url.split('/').pop(); // Extract file name from URL
                        zip.file(fileName, blob, { compression: "DEFLATE", compressionLevel: 3 });
                    } catch (error) {
                        console.error(`Failed to fetch ${url}:`, error);
                    }
                }
            );

            // Generate the zip file
            const zipContent = await zip.generateAsync({ type: 'blob' });

            stopLoading(); // Hide loading modal
            saveAs(zipContent, `${folderName}.zip`); // Trigger the download
        } catch (error) {
            console.error('Error downloading files:', error);
            stopLoading(); // Ensure loading modal hides on error
        }
    }
</script>