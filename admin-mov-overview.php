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
        <title>MOVs Overview</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />


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
                                        <li class="breadcrumb-item" aria-current="page"><a href="admin-dashboard.php">Home</a></li>
                                        <li class="breadcrumb-item active"><a href="#"></a>MOVs Overview</a></li>
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
                                    <h2 class="weight-600">MOVs Overview</h2>
                                </div>
                                <div class="accent-h-line ml-4"></div>
                            </div>
                            <div class="pb-20">
                                <!-- Table -->
                                <div class="row">
                                    <div class="col-sm-12 px-4">
                                        <form action="admin-mov-tbl-action.php" method="post" id="unverifiedMOVTable">
                                            <table id="movsOverviewTbl" class="data-table table hover nowrap text-center mb-4">
                                                <thead>
                                                    <tr>
                                                        <th class="d-none unverifiedMOVS-operation  mx-5 px-4" title="Select All"><input class="" type="checkbox" id="unverifiedMOVS-checkAll" name="" />
                                                        </th>
                                                        <th><img class="pr-1" src="vendors/images/icon-letter-format.svg" alt="">Barangays</th>
                                                        <th><img class=" pr-1" src="vendors/images/icon-link.svg" alt="">Attachment</th>
                                                        <th class="text-left"><img class="mb-1 pr-1" src="vendors/images/icon-governance.svg" alt="">Governance
                                                            Area</th>
                                                        <th class="d-flex justify-content-center">

                                                            <img class="pr-1" src="vendors/images/icon-status.svg" alt="">Status

                                                        </th>
                                                        <th class=""><img class="mb-1 pr-1" src="vendors/images/icon-date.svg" alt="">Date
                                                        </th>
                                                    </tr>
                                                </thead>


                                                <tbody style="border-bottom: 1px solid #e5e5e5">
                                                    <?php
                                                    if (isset($_POST['search-movOvwTbl']) && !empty(trim($_POST['search-movOvwTbl']))) {
                                                        $search = mysqli_real_escape_string($db, $_POST['search-movOvwTbl']);
                                                        $movsOvwSql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, mov.status, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date FROM mov INNER JOIN users ON mov.user_id=users.user_id WHERE (users.Name LIKE '%$search%' OR mov.doc_name LIKE '%$search%' OR mov.govarea LIKE '%$search%' OR mov.status LIKE '%$search%' OR DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') LIKE '%$search%')AND mov.status <> 'Verified' ";
                                                        $_POST['search-movOvwTbl'] = '';
                                                    } else if (isset($_SESSION['movOvwSelectQueries']) && !empty(trim($_SESSION['movOvwSelectQueries']))) {
                                                        $movsOvwSql = $_SESSION['movOvwSelectQueries'] ?? [];
                                                        // unset($_SESSION['movOvwSelectQueries']);
                                                    } else {
                                                        $movsOvwSql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, mov.status, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date FROM mov INNER JOIN users ON mov.user_id=users.user_id WHERE mov.status <> 'Verified';";
                                                    }

                                                    ?>

                                                    <?php
                                                    $result_movOvwTbl = mysqli_query($db, $movsOvwSql);
                                                    while ($row = mysqli_fetch_assoc($result_movOvwTbl)) :
                                                    ?>
                                                        <tr>
                                                            <td class="d-none unverifiedMOVsCheckboxtd"><input type="checkbox" name="movsOvw[]" class="unverifiedMOVsCheckbox" id="<?php echo $row['doc_id']; ?>" value="<?php echo $row['doc_id']; ?>" />
                                                            </td>
                                                            <td>
                                                                <?php echo $row['Name']; ?>
                                                            </td>
                                                            <td class="text-left td-text-truncate-50">
                                                                <a class="weight-700" rel="nofollow noopener noreferrer" href="admin-mov-doc.php?view=<?php echo $row['doc_id']; ?>"><u><?php echo $row['doc_name']; ?></u></a>
                                                            </td>

                                                            <td class="text-left td-text-truncate-50">
                                                                <?php echo $row['govarea']; ?>
                                                            </td>

                                                            <td class="d-flex justify-content-center">
                                                                <div class="d-inline-block mov-status  small px-3 py-1">
                                                                    <?php echo $row['status']; ?>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <?php echo $row['f_date']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>

                                                    <!-- MODALs -->
                                                    <div class="modal fade" id="delUnverifiedMOVModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
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
                                                                    <button type="button" id="cancelSel-unverifiedMOV" class="btn-sm px-4 btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                                    <button type="submit" name="movOvw_delete" id="delSel-unverifiedMOV" class="btn-sm px-4 btn-danger weight-500">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </tbody>

                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <!-- Table END -->


                            </div>

                        </div>
                    </div>
                </div>
                <!-- MOVs END -->

                <!-- Verified Table -->
                <div class="row pb-10">
                    <div class="col-12 mb-20">
                        <div class="card-box  py-4 px-3 mx-3">
                            <div class="d-flex align-items-center px-4 my-5">
                                <div class=" d-flex flex-shrink-0  align-items-center">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                        <path d="M14.6169 0C6.55716 0 0 6.50843 0 14.5083C0 22.5082 6.55716 29.0166 14.6169 29.0166C22.6767 29.0166 29.2339 22.5082 29.2339 14.5083C29.2339 6.50843 22.6767 0 14.6169 0ZM11.695 20.9109L6.26774 15.5355L8.33165 13.4811L11.6921 16.8108L19.4303 9.13009L21.4971 11.1816L11.695 20.9109Z" fill="#00AA1E" />
                                    </svg>
                                    <h2 class="weight-600">Verified Documents</h2>
                                </div>
                                <div class="accent-h-line ml-4"></div>
                            </div>
                            <div class="pb-20">
                                <!-- Table -->
                                <div class="row">
                                    <div class="col-sm-12 px-4">
                                        <form action="admin-mov-tbl-action.php" method="post" id="verifiedMOVTable">
                                            <table id="movsVerifiedTbl" class="data-table table hover nowrap text-center mb-4">
                                                <thead>
                                                    <tr>
                                                        <th class="d-none verifiedMOVS-operation  mx-5 px-4" title="Select All"><input class="" type="checkbox" id="verifiedMOVS-checkAll" name="" />
                                                        </th>
                                                        <th><img class="pr-1" src="vendors/images/icon-letter-format.svg" alt="">Barangays</th>
                                                        <th><img class=" pr-1" src="vendors/images/icon-link.svg" alt="">Attachment</th>
                                                        <th class="text-left"><img class="mb-1 pr-1" src="vendors/images/icon-governance.svg" alt="">Governance
                                                            Area</th>
                                                        <th class=""><img class="mb-1 pr-1" src="vendors/images/icon-date.svg" alt="">Date
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border-bottom: 1px solid #e5e5e5">
                                                    <?php
                                                    if (isset($_POST['search-movVerifiedTbl']) && !empty(trim($_POST['search-movVerifiedTbl']))) {
                                                        $search = mysqli_real_escape_string($db, $_POST['search-movVerifiedTbl']);
                                                        echo '<script>';
                                                        echo 'alert(' . json_encode(json_encode($search)) . ');';  // Double encode to make sure it's treated as a string
                                                        echo 'alert(JSON.parse(' . json_encode($search) . '));';  // Parse the JSON string to a JavaScript object
                                                        echo '</script>';
                                                        $verifiedTblSql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date FROM mov INNER JOIN users ON mov.user_id = users.user_id WHERE (users.Name LIKE '%$search%' OR mov.doc_name LIKE '%$search%' OR mov.govarea LIKE '%$search%' OR DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') LIKE '%$search%') AND mov.status = 'Verified'";
                                                        echo '<script>';
                                                        echo 'alert(' . json_encode(json_encode($verifiedTblSql)) . ');';  // Double encode to make sure it's treated as a string
                                                        echo 'alert(JSON.parse(' . json_encode($verifiedTblSql) . '));';  // Parse the JSON string to a JavaScript object
                                                        echo '</script>';
                                                        $_POST['search-movVerifiedTbl'] = '';
                                                    } else if (isset($_SESSION['movVerifiedSelectQueries']) && !empty(trim($_SESSION['movVerifiedSelectQueries']))) {
                                                        $verifiedTblSql = $_SESSION['movVerifiedSelectQueries'] ?? [];
                                                        // unset($_SESSION['movVerifiedSelectQueries']);
                                                    } else {
                                                        $verifiedTblSql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date
                                                                FROM mov
                                                                INNER JOIN users ON mov.user_id = users.user_id
                                                                WHERE mov.status = 'Verified'";
                                                    }


                                                    $result_movVerifiedTbl = mysqli_query($db, $verifiedTblSql);
                                                    while ($row = mysqli_fetch_assoc($result_movVerifiedTbl)) :
                                                    ?>

                                                        <tr>
                                                            <td class="d-none verifiedMOVsCheckboxtd"><input type="checkbox" class="verifiedMOVsCheckbox" id="<?php echo $row['doc_id']; ?>" name="movVerified[]" value="<?php echo $row['doc_id']; ?>" /></td>
                                                            <td>
                                                                <?php echo $row['Name']; ?>
                                                            </td>
                                                            <td class="text-left td-text-truncate-250">
                                                                <a class="weight-700" rel="nofollow noopener noreferrer" href="admin-mov-doc.php?view=<?php echo $row['doc_id']; ?>"><u><?php echo $row['doc_name']; ?></u></a>
                                                            </td>

                                                            <td class="text-left td-text-truncate-50">
                                                                <?php echo $row['govarea']; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row['f_date']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    <!-- MODALs -->
                                                    <div class="modal fade" id="delVerifiedMOVModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
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
                                                                    <button class="btn-sm px-4 btn-secondary" data-dismiss="modal" aria-label="Close" id="cancelSel-verifiedMOV">Cancel</button>
                                                                    <button type="submit" name="movVerified_delete" id="delSel-verifiedMOV" class="btn-sm px-4 btn-danger weight-500">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <!-- Table END -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Verified Table END -->
                <!-- Verified Table END -->
                <!-- MODALS for View Reminder -->
                <?php include('modals-multiView-reminder.php'); ?>
            </div>
        </div>


        <!-- Footer -->
        <div class="footer-wrap pd-10 px-5">
            Â© Copyright <span class="font-weight-bold">Department of Interior and Local Government Santa Rosa City.</span>
            All Rights Reserved.
        </div>

        <!-- js -->
        <script src="vendors/scripts/core.js"></script>
        <script src="vendors/scripts/script.js"></script>
        <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
        <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <script src="vendors/scripts/data-table-init.js"></script>
        <!-- <script src="src\plugins\bootstrap-select\bootstrap-select.js"></script> -->
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
                echo "window.open('admin-mov-doc.php?view=$value', '_blank');";
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
    http_response_code(403);
} ?>