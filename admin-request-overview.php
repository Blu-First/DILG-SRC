<?php
require_once('connector.php');

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION["emp_id"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SGLGB Portal</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

        <link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />

    </head>

    <body>

        <?php include('admin-header.php'); ?>

        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <!-- Breadcrumb Navigation -->
                <div class="row pb-10">
                    <div class="col-12 mb-20">
                        <div class="card-box d-flex px-3 py-2 mx-3">
                            <div class="align-items-center">
                                <nav class="align-items-center" style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                    <ol class="breadcrumb pl-4">
                                        <li class="breadcrumb-item" aria-current="page"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active"><a href="#"></a>Deadline Requests</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb Navigation END-->

                <!-- MOVs Overview -->
                <div class="row pb-10 mb-20">
                    <div class="col-12 mb-20">
                        <div class="card-box  py-4 px-3 mx-3">
                            <div class="d-flex align-items-center px-4 my-5">
                                <div class="flex-shrink-0 ">
                                    <h2 class="weight-600">Pending Requests</h2>
                                </div>
                                <div class="accent-h-line ml-4"></div>
                            </div>


                            <!-- Table -->
                            <!-- <div class="row"> -->
                            <!-- <div class="col-sm-12 px-4"> -->
                            <form action="admin-request-tbl-action.php" method="post">
                                <table id="reqOverviewTbl" class="data-table table hover nowrap text-center mb-4">
                                    <thead>
                                        <tr>
                                            <th class="d-none reqOverviewOperation mx-5 px-4" title="Select All">
                                                <input class="" id="reqOverviewSelectAll" type="checkbox" />
                                            </th>

                                            <th><img class="pr-1" src="vendors/images/icon-letter-format.svg" alt="">Barangays</th>

                                            <th><img class=" pr-1" src="vendors/images/icon-link.svg" alt="">Request</th>

                                            <th class="justify-content-center">
                                                <img class="pr-1 pb-1" src="vendors/images/icon-status.svg" alt="">Status
                                            </th>

                                            <th class=""><img class="mb-1 pr-1" src="vendors/images/icon-date.svg" alt="">Date Requested
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['search-reqOvwTbl']) && !empty(trim($_POST['search-reqOvwTbl']))) {
                                            $search = mysqli_real_escape_string($db, $_POST['search-reqOvwTbl']);
                                            $sql = "SELECT * FROM dl_request WHERE (barangay LIKE '%$search%' OR govareas LIKE '%$search%' OR date_requested LIKE '%$search%') AND status = 'Pending'";
                                            $_POST['search-reqOvwTbl'] = '';
                                        } else if (isset($_SESSION['reqOvwSelectQueries']) && !empty(trim($_SESSION['reqOvwSelectQueries']))) {
                                            $sql = $_SESSION['reqOvwSelectQueries'] ?? [];
                                            unset($_SESSION['reqOvwSelectQueries']);
                                        } else {
                                            $sql = "SELECT * FROM dl_request WHERE status = 'Pending'";
                                        }

                                        $result_reqOvwTbl = mysqli_query($db, $sql);
                                        while ($row = mysqli_fetch_assoc($result_reqOvwTbl)) :
                                        ?>
                                            <tr>
                                                <td class=" d-none unverifiedReqCheckboxTd" style="display:none">
                                                    <input class="unverifiedReqCheckbox" type="checkbox" name="reqOvw[]" value="<?php echo $row['req_code']; ?>" />
                                                </td>


                                                <td class="td-text-truncate-250">
                                                    <?php
                                                    $namebarangay = $row['barangay'];
                                                    $name = mysqli_query($db, "SELECT * FROM users WHERE username = '$namebarangay'");
                                                    $fetchname = mysqli_fetch_assoc($name);
                                                    echo $fetchname['name']; ?>
                                                </td>

                                                <td>

                                                    <a class="weight-700" rel="nofollow noopener noreferrer" href="admin-view-request.php?req_code=<?php echo $row['req_code']; ?>">
                                                        <u><?php echo $row['govareas']; ?></u></a>
                                                </td>

                                                <td class="d-flex justify-content-center">
                                                    <?php
                                                    $status = $row['status'];
                                                    $badgeColor = ($status == 'Pending') ? '#BFD1E0' : (($status == 'Approved') ? '#34C041' : (($status == 'Rejected') ? '#FF0335' : 'default_color'));
                                                    ?>
                                                    <span class="badge badge-pill" style="background-color: <?php echo $badgeColor; ?>" data-color="#000">
                                                        <?php echo $status; ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <?php
                                                    $dateRequested = date_create($row['date_requested']);
                                                    echo date_format($dateRequested, 'm/d/Y');
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                        <div class="modal fade" id="delreqOverviewModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center" role="document">
                                                <div class="card-box d-flex flex-column align-items-center px-4 py-4">
                                                    <div class="d-flex justify-content-center align-items-center mt-3 mb-4" style="background-color:  rgba(255, 0, 51, 0.10); width: 80px; height: 80px; border-radius: 80px;">
                                                        <img src="vendors/images/icon-danger.svg" alt="" srcset="">
                                                    </div>
                                                    <h1 class="mb-3">Delete Files</h1>
                                                    <p class="m-0 mx-2">This action will delete all of the
                                                        selected files.</p>
                                                    <p class="mb-3">Are you sure?</p>
                                                    <div class="mb-3">
                                                        <button class="btn-sm px-4 btn-secondary" data-dismiss="modal" aria-label="Close" id="cancelreqOverviewModal">Cancel</button>
                                                        <button type="submit" name="reqOverviewDelete" id="reqOverviewDelete" class="btn-sm px-4 btn-danger weight-500">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </form>
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                        <!-- Table END -->
                    </div>
                </div>
                <!-- TABLE 2 -->
                <div class="row pb-10 mb-20">
                    <div class="col-12 mb-20">
                        <div class="card-box  py-4 px-3 mx-3">
                            <div class="d-flex align-items-center px-4 my-5">
                                <div class="flex-shrink-0 ">
                                    <h2 class="weight-600">Verified Requests</h2>
                                </div>
                                <div class="accent-h-line ml-4"></div>
                            </div>

                            <form action="admin-request-tbl-action.php" method="post">
                                <table id="reqVerifiedTbl" class="data-table table hover nowrap text-center mb-4">
                                    <thead>
                                        <tr>
                                            <th class="d-none reqVerifiedOperation mx-5 px-4" title="Select All">
                                                <input class="" id="reqVerifiedSelectAll" type="checkbox" />
                                            </th>

                                            <th><img class="pr-1" src="vendors/images/icon-letter-format.svg" alt="">Barangays</th>

                                            <th><img class=" pr-1" src="vendors/images/icon-link.svg" alt="">Request</th>

                                            <th class="justify-content-center">
                                                <img class="pr-1 pb-1" src="vendors/images/icon-status.svg" alt="">Status
                                            </th>

                                            <th class=""><img class="mb-1 pr-1" src="vendors/images/icon-date.svg" alt="">Date Requested
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['search-reqVerifiedTbl']) && !empty(trim($_POST['search-reqVerifiedTbl']))) {
                                            $search = mysqli_real_escape_string($db, $_POST['search-reqVerifiedTbl']);
                                            $sql = "SELECT * FROM dl_request WHERE (barangay LIKE '%$search%' OR govareas LIKE '%$search%' OR date_requested LIKE '%$search%') AND status = 'Approved'";
                                            $_POST['search-reqVerifiedTbl'] = '';
                                        } else if (isset($_SESSION['reqVerifiedSelectQueries']) && !empty(trim($_SESSION['reqVerifiedSelectQueries']))) {
                                            $sql = $_SESSION['reqVerifiedSelectQueries'] ?? [];
                                            unset($_SESSION['reqVerifiedSelectQueries']);
                                        } else {
                                            $sql = "SELECT * FROM dl_request WHERE status = 'Approved'";
                                        }

                                        $result_reqOvwTbl = mysqli_query($db, $sql);
                                        while ($row = mysqli_fetch_assoc($result_reqOvwTbl)) :
                                        ?>
                                            <tr>
                                                <td class=" d-none verifiedReqCheckboxTd" style="display:none">
                                                    <input class="verifiedReqCheckbox" type="checkbox" name="reqVerified[]" value="<?php echo $row['req_code']; ?>" />
                                                </td>


                                                <td class="td-text-truncate-250">
                                                    <?php
                                                    $namebarangay = $row['barangay'];
                                                    $name = mysqli_query($db, "SELECT * FROM users WHERE username = '$namebarangay'");
                                                    $fetchname = mysqli_fetch_assoc($name);
                                                    echo $fetchname['name']; ?>
                                                </td>

                                                <td>

                                                    <a class="weight-700" rel="nofollow noopener noreferrer" href="admin-view-request.php?req_code=<?php echo $row['req_code']; ?>">
                                                        <u><?php echo $row['govareas']; ?></u></a>
                                                </td>

                                                <td class="d-flex justify-content-center">
                                                    <?php
                                                    $status = $row['status'];
                                                    $badgeColor = ($status == 'Pending') ? '#BFD1E0' : (($status == 'Approved') ? '#34C041' : (($status == 'Rejected') ? '#FF0335' : 'default_color'));
                                                    ?>
                                                    <span class="badge badge-pill" style="background-color: <?php echo $badgeColor; ?>" data-color="#000">
                                                        <?php echo $status; ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <?php
                                                    $dateRequested = date_create($row['date_requested']);
                                                    echo date_format($dateRequested, 'm/d/Y');
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                        <div class="modal fade" id="delreqVerifiedModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center" role="document">
                                                <div class="card-box d-flex flex-column align-items-center px-4 py-4">
                                                    <div class="d-flex justify-content-center align-items-center mt-3 mb-4" style="background-color:  rgba(255, 0, 51, 0.10); width: 80px; height: 80px; border-radius: 80px;">
                                                        <img src="vendors/images/icon-danger.svg" alt="" srcset="">
                                                    </div>
                                                    <h1 class="mb-3">Delete Files</h1>
                                                    <p class="m-0 mx-2">This action will delete all of the
                                                        selected files.</p>
                                                    <p class="mb-3">Are you sure?</p>
                                                    <div class="mb-3">
                                                        <button class="btn-sm px-4 btn-secondary" data-dismiss="modal" aria-label="Close" id="cancelreqVerifiedModal">Cancel</button>
                                                        <button type="submit" name="reqVerifiedDelete" id="reqVerifiedDelete" class="btn-sm px-4 btn-danger weight-500">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- MODALS for View Reminder -->
                <?php include('modals-multiView-reminder.php'); ?>

            </div>
        </div>
        <!-- MOVs END -->





        <!-- Footer -->
        <div class="footer-wrap pd-10 px-5">
            © Copyright <span class="font-weight-bold">Department of Interior and Local Government Santa Rosa City.</span>
            All Rights Reserved.
        </div>

        <!-- js -->
        <script src="vendors/scripts/core.js"></script>
        <script src="vendors/scripts/script.js"></script>
        <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
        <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <script src="vendors\scripts\data-table-init.js"></script>
        <!-- <script src="vendors\styles\test.js"></script> -->

        <!-- <script src="vendors/scripts/process.js"></script> -->
        <!-- <script src="vendors/scripts/layout-settings.js"></script> -->
        <!-- <script src="vendors\scripts\script.js"></script>
    <script src="src\plugins\bootstrap\bootstrap.js"></script> -->
        <!-- <script src="vendors/scripts/options-select.js"></script> -->


        <?php
        if (isset($_SESSION['view']) && is_array($_SESSION['view']) && !empty($_SESSION['view'])) {
            $doc_count = count($_SESSION['view']);
            echo "
        <script>
            var flag = confirm('This will open $doc_count tab(s). Do you want to proceed?');
            if (flag) {
    ";
            foreach ($_SESSION['view'] as $value) {
                echo "window.open('admin-view-request.php?req_code=$value', '_blank');";
            }
            echo "
            }
        </script>
    ";

            // Unset the 'view' session variable after using it
            unset($_SESSION['view']);
        }
        ?>



    </body>

    </html>
<?php } else {
    echo "<script>alert('Access denied.');</script>";
} ?>