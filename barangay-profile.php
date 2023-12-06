<?php
require_once('connector.php');

$barangay = $_SESSION["user_id"];
$query = mysqli_query($db, "SELECT * from users WHERE user_id = $barangay");
$row = mysqli_fetch_assoc($query);


if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION["user_id"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

        <link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />

    </head>

    <body>

        <?php include('header.php'); ?>

        <div class="main-container">

            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="pl-3">
                    <div class="card-box pd-30 height-100-p mb-30">
                        <div class="row align-items-center custom-row mr-5 ml-5">

                            <!-- Barangay Picture -->
                            <div class="col-md-2">
                                <img src="vendors/images/barangay-logos/<?php echo $row['logo']; ?>" alt="" />
                            </div>

                            <!-- Name & Message -->
                            <div class="col-md-6 pl-20">
                                <h4 class="weight-600 font-30 text-capitalize">
                                    Barangay <span class="color-darkpink">
                                        <?php echo $row['name']; ?>
                                    </span>
                                </h4>

                                <!-- TO ADD: Edit Profile -->
                                <!-- <div class="mt-2">
                                    <a class="dilg-button" href="#" hreflang="en" type="text/html">Edit Profile</a>
                                </div> -->
                                </p>
                            </div>


                            <!-- Information -->
                            <div class="col-md-4">
                                <div class="brgy-info-container">
                                    <ul>
                                        <li>
                                            <i class="bx bx-phone pr-1"></i>
                                            <?php echo $row['phone_no']; ?>
                                        </li>
                                        <li>
                                            <i class="bx bx-envelope pr-1"></i>
                                            <?php echo $row['email']; ?>
                                        </li>
                                        <li>
                                            <i class="bx bx-map-pin pr-1"></i>
                                            <?php echo $row['address']; ?>
                                            Location
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                $tab = isset($_GET['tab']) ? $_GET['tab'] : 'default';
                $navLink = '';
                $tabContentOne = '';
                $tabContentTwo = '';

                switch ($tab) {
                    case 'submission':
                        $navLink = '<li class="nav-item secondary-nav" role="navigation">
                                        <a class="nav-link active px-0 pb-0 ml-4 mb-10" id="submission-tab" data-toggle="tab" href="#submission" data-target="submission" role="tab" aria-controls="Submission" aria-selected="true">Submissions</a>
                                    </li>
                                    <li class="nav-item secondary-nav" role="navigation">
                                        <a class="nav-link secondary-nav px-0 pb-0 ml-4 mb-10" id="completed-tab" data-toggle="tab" href="#completed"  data-target="completed" role="tab" aria-controls="Completed" aria-selected="false">All Files</a>
                                    </li>';
                        $tabContentOne = '<div class="tab-pane fade show active" id="submission" role="tabpanel" aria-labelledby="submission-tab">';
                        $tabContentTwo = '<div class="tab-pane fade" id="completed" role="tabpanel" role="tabpanel" aria-labelledby="completed-tab">';
                        break;

                    case 'completed':
                        $navLink = '<li class="nav-item secondary-nav" role="navigation">
                                        <a class="nav-link  px-0 pb-0 ml-4 mb-10" id="submission-tab" data-toggle="tab" href="#submission" data-target="submission" role="tab" aria-controls="Submission" aria-selected="true">Submissions</a>
                                    </li>
                                    <li class="nav-item secondary-nav" role="navigation">
                                        <a class="nav-link active secondary-nav px-0 pb-0 ml-4 mb-10" id="completed-tab" data-toggle="tab" href="#completed"  data-target="completed" role="tab" aria-controls="Completed" aria-selected="false">All Files</a>
                                    </li>';
                        $tabContentOne = '<div class="tab-pane fade " id="submission" role="tabpanel" aria-labelledby="submission-tab">';
                        $tabContentTwo = '<div class="tab-pane fade show active" id="completed" role="tabpanel" role="tabpanel" aria-labelledby="completed-tab">';
                        break;

                        // Add more cases for additional tabs as needed

                    default:
                        $navLink = '<li class="nav-item secondary-nav" role="navigation">
                                        <a class="nav-link active px-0 pb-0 ml-4 mb-10" id="submission-tab" data-toggle="tab" href="#submission" data-target="submission" role="tab" aria-controls="Submission" aria-selected="true">Submissions</a>
                                    </li>
                                    <li class="nav-item secondary-nav" role="navigation">
                                        <a class="nav-link secondary-nav px-0 pb-0 ml-4 mb-10" id="completed-tab" data-toggle="tab" href="#completed"  data-target="completed" role="tab" aria-controls="Completed" aria-selected="false">All Files</a>
                                    </li>';
                        $tabContentOne = '<div class="tab-pane fade show active" id="submission" role="tabpanel" aria-labelledby="submission-tab">';
                        $tabContentTwo = '<div class="tab-pane fade" id="completed" role="tabpanel" role="tabpanel" aria-labelledby="completed-tab">';
                }
                ?>

                <!-- Second Section -->


                <!--Submissions Completed breadcrumb-->

                <div class="pl-3">
                    <ul class="nav ml-2" id="doc-tab-list" role="tablist">
                        <?php echo $navLink; ?>
                    </ul>


                    <div class="tab-content" id="doc-tab-content">
                        <!-- Submissions Tab -->
                        <?php echo $tabContentOne; ?>

                            <!---Documents Submissions-->
                            <div class="container-fluid">
                                <div class="">
                                    <div class="">

                                        <!-- Filters -->

                                        <!-- Table Content -->

                                        <table id="submittedTbl" class="data-table table hover nowrap mb-5">
                                            <thead>
                                                <tr>
                                                    <th><img class="pr-1" src="vendors/images/icon-letter-format.svg" alt="">Document</th>
                                                    <th><img class="mb-1 pr-1" src="vendors/images/icon-governance.svg" alt="">Governance
                                                        Area</th>
                                                    <th class="d-flex justify-content-center">

                                                        <img class="pr-1" src="vendors/images/icon-status.svg" alt="">Status

                                                    </th>
                                                    <th class=""><img class="mb-1 pr-1" src="vendors/images/icon-date.svg" alt="">Date
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                    $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                    $_POST['search-submittedTbl'] = '';
                                                } else {
                                                    $user = $_SESSION["user_id"];
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE user_id = $user";
                                                }
                                                $result_submittedTbl = mysqli_query($db, $sql);
                                                while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                ?>
                                                    <tr>
                                                        <td class="td-text-truncate-250">
                                                            <a href="#"><u>
                                                                    <?php echo $row['doc_name']; ?>
                                                                </u></a>
                                                        </td>

                                                        <td>
                                                            <?php echo $row['govarea']; ?>
                                                        </td>

                                                        <td class="d-flex justify-content-center">

                                                            <div class="d-inline-block doc-status text-capitalize small px-3 py-1">

                                                                <?php echo $row['status']; ?>
                                                            </div>

                                                        </td>

                                                        <td>
                                                            <?php echo $row['f_date']; ?>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                        <div>
                                        </div>

                                        <div class="modal fade" id="invalidModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="card-box w-100 p-3">
                                                    <div class="modal-header ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="34" viewBox="0 0 36 34" fill="none">
                                                            <path d="M19.5919 0.879658C18.9691 -0.293219 17.0324 -0.293219 16.4097 0.879658L0.210473 31.3673C0.0646505 31.6406 -0.00764193 31.9468 0.00063931 32.2562C0.00892055 32.5655 0.097493 32.8675 0.257727 33.1326C0.41796 33.3978 0.64439 33.617 0.914953 33.769C1.18552 33.921 1.49098 34.0006 1.80159 34H34.2C34.5104 34.0006 34.8156 33.9211 35.086 33.7692C35.3564 33.6173 35.5826 33.3982 35.7427 33.1332C35.9028 32.8682 35.9912 32.5664 35.9994 32.2573C36.0075 31.9481 35.9352 31.6421 35.7893 31.3691L19.5919 0.879658ZM19.8007 28.6198H16.2009V25.033H19.8007V28.6198ZM16.2009 21.4463V12.4793H19.8007L19.8025 21.4463H16.2009Z" fill="var(--red)" />
                                                        </svg>
                                                        <h2 class="poppins d-inline-block weight-600 ml-2" id="exampleModalLabel">Invalid
                                                            Document</h2>
                                                        <button class="ml-auto" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <img src="vendors/images/icon-close.svg" alt="close button" srcset="">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="" src="" alt="Invalid Document Sample" srcset="">
                                                        <p></p>
                                                        <p>Please <a href="" onclick="location.href='#submission'" data-dismiss="modal" style="text-decoration: underline blue; color: blue;">resubmit</a>
                                                            the
                                                            document with the necessary changes.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Table End -->
                                        <!-- Table Footer -->
                                        <!-- Table Footer END -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- All Files Tab -->
                        <?php echo $tabContentTwo; ?>
                            <!-- Page Title -->
                            <div class="container-fluid my-3">
                                <div class="card-box">
                                    <div class="mx-3 py-4 px-2">

                                        <!-- Filters -->
                                        <div class="row align-items-center mx-3 px-4">
                                            <div class="mb-4">
                                                <h3>Folders & Files</h2>
                                            </div>

                                        </div>

                                        <!-- Table Content -->
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                            <div class="row pb-4">
                                                <div class="col-sm-12">
                                                    <table class="table hover nowrap mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="pl-30">
                                                                        <img src="vendors/images/icon-folder.png">
                                                                        <a href="financial-ad-sustain.php" class="pl-10">Financial Administration and Sustainability</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="pl-30">
                                                                        <img src="vendors/images/icon-folder.png">
                                                                        <a href="disaster-prep.php" class="pl-10">Disaster Preparedness</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="pl-30">
                                                                        <img src="vendors/images/icon-folder.png">
                                                                        <a href="safety-peace-order.php" class="pl-10">Safety, Peace and Order</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="pl-30">
                                                                        <img src="vendors/images/icon-folder.png">
                                                                        <a href="social-protect-sensitivity.php" class="pl-10">Social Protection and Sensitivity</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="pl-30">
                                                                        <img src="vendors/images/icon-folder.png">
                                                                        <a href="business.php" class="pl-10">Business-Friendliness and Competitiveness</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="pl-30">
                                                                        <img src="vendors/images/icon-folder.png">
                                                                        <a href="environmental-manage.php" class="pl-10">Environmental Management</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Table End -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-wrap pd-10 px-5">
            © Copyright <span class="font-weight-bold">Department of Interior and Local Government Santa Rosa City.</span>
            All Rights Reserved.
        </div>

        <!-- js -->
        <script src="vendors/scripts/core.js"></script>
        <script src="vendors/scripts/script.js"></script>
        <script src="vendors/scripts/process.js"></script>
        <script src="vendors/scripts/layout-settings.js"></script>
        <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
        <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <script src="vendors/scripts/data-table-profile.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var tabLinks = document.querySelectorAll('.nav-link');

                function handleTabClick(event) {
                    event.preventDefault();

                    var clickedTab = event.target;
                    var tabId = clickedTab.getAttribute('data-target');

                    history.pushState(null, null, 'barangay-profile.php?tab=' + tabId);

                    // Update the active class for styling
                    tabLinks.forEach(function(link) {
                        link.classList.remove('active');
                    });

                    clickedTab.classList.add('active');

                    // Show/hide tab content based on the clicked tab
                    var tabContents = document.querySelectorAll('.tab-pane');
                    tabContents.forEach(function(tabContent) {
                        tabContent.classList.remove('show', 'active');
                    });

                    var selectedTabContent = document.getElementById(tabId);
                    selectedTabContent.classList.add('show', 'active');
                }

                // Attach click event to the parent element (event delegation)
                document.getElementById('doc-tab-list').addEventListener('click', function(event) {
                    if (event.target.classList.contains('nav-link')) {
                        handleTabClick(event);
                    }
                });

                // Trigger the click event for the initial tab
                var initialTab = document.querySelector('.nav-link.active');
                if (initialTab) {
                    handleTabClick({
                        target: initialTab
                    });
                }


            });
        </script>

    </body>

    </html>
<?php } else {
    echo "<script>alert('Access denied.');</script>";
} ?>