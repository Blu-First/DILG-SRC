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
                                                        unset($_SESSION['movOvwSelectQueries']);
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
                                                        unset($_SESSION['movVerifiedSelectQueries']);
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
                <div class="modal fade" id="viewReminder" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="card-box w-100 p-3">
                            <div class="modal-header ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="34" viewBox="0 0 36 34" fill="none">
                                    <path d="M19.5919 0.879658C18.9691 -0.293219 17.0324 -0.293219 16.4097 0.879658L0.210473 31.3673C0.0646505 31.6406 -0.00764193 31.9468 0.00063931 32.2562C0.00892055 32.5655 0.097493 32.8675 0.257727 33.1326C0.41796 33.3978 0.64439 33.617 0.914953 33.769C1.18552 33.921 1.49098 34.0006 1.80159 34H34.2C34.5104 34.0006 34.8156 33.9211 35.086 33.7692C35.3564 33.6173 35.5826 33.3982 35.7427 33.1332C35.9028 32.8682 35.9912 32.5664 35.9994 32.2573C36.0075 31.9481 35.9352 31.6421 35.7893 31.3691L19.5919 0.879658ZM19.8007 28.6198H16.2009V25.033H19.8007V28.6198ZM16.2009 21.4463V12.4793H19.8007L19.8025 21.4463H16.2009Z" fill="var(--yellow)" />
                                </svg>
                                <h2 class="poppins d-inline-block weight-600 ml-2" id="">Enable Popups</h2>
                                <button class="ml-auto" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <img src="vendors/images/icon-close.svg" alt="close button" srcset="">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="multipleView" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#multipleView" data-slide-to="0" class="active"></li>
                                        <li data-target="#multipleView" data-slide-to="1"></li>
                                        <li data-target="#multipleView" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-interval="false">
                                            <picture>
                                                <source media="(min-width:650px)" srcset="vendors/images/logo-seal-src.png" class="d-block w-100">
                                                <source media="(min-width:465px)" srcset="vendors/images/logo-dilg.png" class="d-block w-100">
                                                <img src="vendors/images/background.png" class="d-block  w-100" alt="...">
                                            </picture>
                                        </div>
                                        <div class="carousel-item">
                                            <picture>
                                                <source media="(min-width:650px)" srcset="vendors/images/logo-seal-src.png" class="d-block w-100">
                                                <source media="(min-width:465px)" srcset="vendors/images/logo-dilg.png" class="d-block w-100">
                                                <img src="vendors/images/background.png" class="d-block w-100" alt="...">
                                            </picture>
                                        </div>
                                        <div class="carousel-item">
                                            <picture>
                                                <source media="(min-width:650px)" srcset="vendors/images/logo-seal-src.png" class="d-block w-100">
                                                <source media="(min-width:465px)" srcset="vendors/images/logo-dilg.png" class="d-block w-100">
                                                <img src="vendors/images/background.png" class="d-block w-100" alt="...">
                                            </picture>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-target="#multipleView" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-target="#multipleView" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </button>
                                </div>
                                <p></p>
                                <p>Please <a href="" onclick="location.href='#submission'" data-dismiss="modal" style="text-decoration: underline blue; color: blue;">resubmit</a> the
                                    document with the necessary changes.</p>
                            </div>
                        </div>
                    </div>
                </div>
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