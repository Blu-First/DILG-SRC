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
        <title>SGLGB Portal</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

        <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css" />

        <link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />

    </head>

    <body>
        <?php include('header.php'); ?>

        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <!-- Breadcrumb Navigation -->
                <div class="row pb-10">
                    <div class="col-12 mb-20">

                        <div class="d-flex px-3 py-2 mx-3 mb-1">
                            <h2> Activity Log </h2>
                        </div>

                        <div class="px-3 py-2 mx-3 mb-3">

                            <ul class="nav ml-2 mb-3" id="doc-tab-list" role="tablist">
                                <li class="nav-item third-nav" role="navigation">
                                    <a class="nav-link active" id="submission-tab" data-toggle="tab" href="#submission" role="tab" aria-controls="Submission" aria-selected="true">Submissions</a>
                                </li>
                                <li class="nav-item third-nav" role="navigation">
                                    <a class="nav-link third-nav" id="request-tab" data-toggle="tab" href="#request" role="tab" aria-controls="Completed" aria-selected="false">Request</a>
                                </li>
                                <li class="nav-item third-nav" role="navigation">
                                    <a class="nav-link third-nav" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="Completed" aria-selected="false">Information</a>
                                </li>
                            </ul>



                            <div class="tab-content" id="doc-tab-content">
                                <!-- Submissions Tab -->
                                <div class="tab-pane fade show active" id="submission" role="tabpanel" aria-labelledby="submission-tab">

                                    <div class="px-3 py-2 mb-15">
                                        <div class="position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Financial Administration and Sustainability
                                                </p>
                                                <?php
                                                if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                    $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                    $_POST['search-submittedTbl'] = '';
                                                } else {
                                                    $user = $_SESSION["user_id"];
                                                    $sql = "SELECT doc_name, govarea, status, time_submitted FROM mov WHERE user_id = $user AND govarea = 'Financial Administration and Sustainability'";
                                                }
                                                $result_submittedTbl = mysqli_query($db, $sql);

                                                if (mysqli_num_rows($result_submittedTbl) > 0) { ?>
                                                    <table id="financialSubmissionTbl" class="activityLog data-table table hover nowrap mb-5">
                                                        <thead class="d-none"> <!-- nag eerror pag walng heading -->
                                                            <tr>
                                                                <th>Activity</th>
                                                                <th>Date and Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                            ?>
                                                                <tr>
                                                                    <td class="td-text-truncate-250">
                                                                        Uploaded
                                                                        <b><a href="#"><b>
                                                                                    <?php echo $row['doc_name']; ?>
                                                                            </a></b>
                                                                    </td>

                                                                    <td class="text-right color-darkgrey">
                                                                        <?php
                                                                        $dateRequested = date_create($row['time_submitted']);
                                                                        echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                        echo date_format($dateRequested, 'g:i A'); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                    echo '<p class="color-darkgrey pl-30">No activity logs in <b>Financial Administration and Sustainability</b> documents.</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-3 py-2 mb-15">
                                        <div class="ml-3 position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Disaster Preparedness
                                                </p>
                                                <?php
                                                if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                    $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                    $_POST['search-submittedTbl'] = '';
                                                } else {
                                                    $user = $_SESSION["user_id"];
                                                    $sql = "SELECT doc_name, govarea, status, time_submitted FROM mov WHERE user_id = $user AND govarea = 'Disaster Preparedness'";
                                                }
                                                $result_submittedTbl = mysqli_query($db, $sql);

                                                if (mysqli_num_rows($result_submittedTbl) > 0) {
                                                ?>

                                                    <table id="disasterSubmissionTbl" class="activityLog data-table datatable-nosort table hover nowrap mb-5">
                                                        <thead class="d-none">
                                                            <tr>
                                                                <th>Activity</th>
                                                                <th>Date and Time</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                            ?>
                                                                <tr>
                                                                    <td class="td-text-truncate-250">
                                                                        Uploaded
                                                                        <b><a href="#"><b>
                                                                                    <?php echo $row['doc_name']; ?>
                                                                            </a></b>
                                                                    </td>

                                                                    <td class="text-right color-darkgrey">
                                                                        <?php
                                                                        $dateRequested = date_create($row['time_submitted']);
                                                                        echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                        echo date_format($dateRequested, 'g:i A'); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                    echo '<p class="color-darkgrey pl-30">No activity logs in <b>Disaster Preparedness</b> documents.</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-3 py-2 mb-15">
                                        <div class="position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Safety, Peace and Order
                                                </p>
                                                <?php
                                                if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                    $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                    $_POST['search-submittedTbl'] = '';
                                                } else {
                                                    $user = $_SESSION["user_id"];
                                                    $sql = "SELECT doc_name, govarea, status, time_submitted FROM mov WHERE user_id = $user AND govarea = 'Safety, Peace and Order'";
                                                }
                                                $result_submittedTbl = mysqli_query($db, $sql);

                                                if (mysqli_num_rows($result_submittedTbl) > 0) {
                                                ?>

                                                    <table id="SafePOSubmissionTbl" class="activityLog data-table table hover nowrap mb-5">
                                                        <thead class="d-none"> <!-- nag eerror pag walng heading -->
                                                            <tr>
                                                                <th>Activity</th>
                                                                <th>Date and Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                            ?>
                                                                <tr>
                                                                    <td class="td-text-truncate-250">
                                                                        Uploaded
                                                                        <b><a href="#"><b>
                                                                                    <?php echo $row['doc_name']; ?>
                                                                            </a></b>
                                                                    </td>

                                                                    <td class="text-right color-darkgrey">
                                                                        <?php
                                                                        $dateRequested = date_create($row['time_submitted']);
                                                                        echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                        echo date_format($dateRequested, 'g:i A'); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>

                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                    echo '<p class="color-darkgrey pl-30">No activity logs in <b>Safety, Peace and Order</b> documents.</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Essential START -->

                                    <div class="px-3 py-2 mb-15">
                                        <div class="position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Social Protection and Sensitivity
                                                </p>
                                                <?php
                                                if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                    $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                    $_POST['search-submittedTbl'] = '';
                                                } else {
                                                    $user = $_SESSION["user_id"];
                                                    $sql = "SELECT doc_name, govarea, status, time_submitted FROM mov WHERE user_id = $user AND govarea = 'Social Protection and Sensitivity'";
                                                }
                                                $result_submittedTbl = mysqli_query($db, $sql);

                                                if (mysqli_num_rows($result_submittedTbl) > 0) {
                                                ?>

                                                    <table id="SocPSSubmissionTbl" class="activityLog data-table table hover nowrap mb-5">
                                                        <thead class="d-none"> <!-- nag eerror pag walng heading -->
                                                            <tr>
                                                                <th>Activity</th>
                                                                <th>Date and Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                            ?>
                                                                <tr>
                                                                    <td class="td-text-truncate-250">
                                                                        Uploaded
                                                                        <b><a href="#"><b>
                                                                                    <?php echo $row['doc_name']; ?>
                                                                            </a></b>
                                                                    </td>

                                                                    <td class="text-right color-darkgrey">
                                                                        <?php
                                                                        $dateRequested = date_create($row['time_submitted']);
                                                                        echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                        echo date_format($dateRequested, 'g:i A'); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>

                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                    echo '<p class="color-darkgrey pl-30">No activity logs in <b>Social Protection and Sensitivity</b> documents.</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-3 py-2 mb-15">
                                        <div class="position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Business-Friendliness and Competitiveness
                                                </p>
                                                <?php
                                                if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                    $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                    $_POST['search-submittedTbl'] = '';
                                                } else {
                                                    $user = $_SESSION["user_id"];
                                                    $sql = "SELECT doc_name, govarea, status, time_submitted FROM mov WHERE user_id = $user AND govarea = 'Business-Friendliness and Competitiveness'";
                                                }
                                                $result_submittedTbl = mysqli_query($db, $sql);

                                                if (mysqli_num_rows($result_submittedTbl) > 0) {
                                                ?>

                                                    <table id="BusnFCSubmissionTbl" class="activityLog data-table table hover nowrap mb-5">
                                                        <thead class="d-none"> <!-- nag eerror pag walng heading -->
                                                            <tr>
                                                                <th>Activity</th>
                                                                <th>Date and Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                            ?>
                                                                <tr>
                                                                    <td class="td-text-truncate-250">
                                                                        Uploaded
                                                                        <b><a href="#"><b>
                                                                                    <?php echo $row['doc_name']; ?>
                                                                            </a></b>
                                                                    </td>

                                                                    <td class="text-right color-darkgrey">
                                                                        <?php
                                                                        $dateRequested = date_create($row['time_submitted']);
                                                                        echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                        echo date_format($dateRequested, 'g:i A'); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>

                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                    echo '<p class="color-darkgrey pl-30">No activity logs in <b>Business-Friendliness and Competitiveness</b> documents.</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-3 py-2 mb-15">
                                        <div class="position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Environmental Management
                                                </p>
                                                <?php
                                                if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                    $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                    $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                    $_POST['search-submittedTbl'] = '';
                                                } else {
                                                    $user = $_SESSION["user_id"];
                                                    $sql = "SELECT doc_name, govarea, status, time_submitted FROM mov WHERE user_id = $user AND govarea = 'Environmental Management'";
                                                }
                                                $result_submittedTbl = mysqli_query($db, $sql);

                                                if (mysqli_num_rows($result_submittedTbl) > 0) {
                                                ?>

                                                    <table id="EnvMSubmissionTbl" class="activityLog data-table table hover nowrap mb-5">
                                                        <thead class="d-none"> <!-- nag eerror pag walng heading -->
                                                            <tr>
                                                                <th>Activity</th>
                                                                <th>Date and Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                            ?>
                                                                <tr>
                                                                    <td class="td-text-truncate-250">
                                                                        Uploaded
                                                                        <b><a href="#"><b>
                                                                                    <?php echo $row['doc_name']; ?>
                                                                            </a></b>
                                                                    </td>

                                                                    <td class="text-right color-darkgrey">
                                                                        <?php
                                                                        $dateRequested = date_create($row['time_submitted']);
                                                                        echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                        echo date_format($dateRequested, 'g:i A'); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>

                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                    echo '<p class="color-darkgrey pl-30">No activity logs in <b>Environmental Management</b> documents.</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Request Activity Log -->
                                <div class="tab-pane fade" id="request" role="tabpanel" role="tabpanel" aria-labelledby="request-tab">
                                    <div class="px-3 py-2 mb-15">
                                        <div class="position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Request Activity Log
                                                </p>
                                                <?php
                                                $user = $_SESSION["user_id"];
                                                $query = "SELECT username FROM users WHERE user_id = $user";
                                                $result = mysqli_query($db, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $username = $row['username'];

                                                $sql = "SELECT req_code, govareas, date_requested FROM dl_request WHERE barangay = '$username'";
                                                $result_request = mysqli_query($db, $sql);

                                                if ($result_request) {
                                                    if (mysqli_num_rows($result_request) > 0) { ?>

                                                        <table id="request_table" class="data-table table hover nowrap mb-5">
                                                            <tbody>

                                                                <?php
                                                                while ($row = mysqli_fetch_assoc($result_request)) :
                                                                ?>
                                                                    <tr>
                                                                        <td class="td-text-truncate-250">
                                                                            Uploaded
                                                                            <b><a href="#"><b>
                                                                                        <?php echo $row['govareas']; ?></a></b>
                                                                        </td>
                                                                        <td class="text-right color-darkgrey">
                                                                            <?php
                                                                            $dateRequested = date_create($row['date_requested']);
                                                                            echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                            echo date_format($dateRequested, 'g:i A');
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                endwhile; ?>


                                                            </tbody>

                                                        </table>

                                                <?php
                                                    } else {
                                                        echo '<p class="color-darkgrey pl-30">No activity logs in <b>Request</b> extensions.</p>';
                                                    }
                                                } else {
                                                    echo "Error executing query: " . mysqli_error($db);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- Information Activity Log -->
                                <div class="tab-pane fade" id="info" role="tabpanel" role="tabpanel" aria-labelledby="info-tab">
                                    <div class="px-3 py-2 mb-15">
                                        <div class="position-relative col-md-12">
                                            <div class="vertical-line"></div>
                                            <div class="card-box mx-3 px-4 pl-30 pt-25 pb-15">
                                                <p class="font-weight-bold font-24" id="#financial-ad-sus">
                                                    Request Activity Log
                                                </p>

                                                <table id="" class="data-table table hover nowrap mb-5">
                                                    <tbody>
                                                        <?php
                                                        if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
                                                            $search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
                                                            $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
                                                            $_POST['search-submittedTbl'] = '';
                                                        } else {
                                                            $user = $_SESSION["user_id"];
                                                            $sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE user_id = $user AND govarea = 'Financial Administration and Sustainability'";
                                                        }
                                                        $result_submittedTbl = mysqli_query($db, $sql);

                                                        if (mysqli_num_rows($result_submittedTbl) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result_submittedTbl)) :
                                                        ?>
                                                                <tr>
                                                                    <td class="td-text-truncate-250">
                                                                        Uploaded
                                                                        <b><a href="#"><b>
                                                                                    <?php echo $row['doc_name']; ?>
                                                                            </a></b>
                                                                    </td>

                                                                    <td class="text-right color-darkgrey">
                                                                        <?php
                                                                        $dateRequested = date_create($row['f_date']);
                                                                        echo date_format($dateRequested, 'm/d/Y') . '<br>';
                                                                        echo date_format($dateRequested, 'g:i A'); ?>
                                                                    </td>
                                                                </tr>
                                                        <?php endwhile;
                                                        } else {
                                                            echo '<p class="color-darkgrey pl-30">No activity logs in <b>Disaster Preparedness</b> documents.</p>';
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Breadcrumb Navigation END-->
                </div>
            </div>


            <!-- Footer -->
            <div class="footer-wrap pd-10 px-5">
                © Copyright <span class="font-weight-bold">Department of Interior and Local Government Santa Rosa
                    City.</span>
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

    </body>

    </html>

<?php } else {
    echo "<script>alert('Access denied.');</script>";
} ?>