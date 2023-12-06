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

                <div class="row pb-10">
                    <div class="col-md-8  mb-20">
                        <!-- <div class="col-md-8 col-lg-7 mb-20"> -->
                        <div class="card-box  p-5">
                            <div class="d-flex flex-column pb-0 pb-md-3">

                                <!-- Content -->
                                <div class="mb-3">
                                    <div class="h5"><span class="color-darkpink poppins">Santa Rosa City</span>
                                    </div>
                                    <div class="barangay-name display-3 weight-600 poppins">
                                        DILG Office
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap ">
                                    <div class="col-md-9 col-xl-7 px-0">
                                        <div class="col-12 px-0 pb-4 ">
                                            <svg class="col-9 px-0" xmlns="http://www.w3.org/2000/svg" width="85%"
                                                height="6" viewBox="0 0 364 6" fill="none">
                                                <path d="M0 6H364V0H0V6Z" fill="var(--darkpink)" />
                                            </svg>
                                        </div>
                                        <div class="row col-12 pt-4">
                                            <div class="h5"><span>For the</span>
                                                <span class="color-darkpink"> Seal of Good Local Governance
                                                </span>
                                                for Barangay (SGLGB)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                                        <img src="vendors/images/logo-seal-src.png" alt="" width="122px" height="122px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2 RIGHT CARDBOX -->
                    <div class="col-md-4 mb-20">
                        <!-- Second Cardbox To REVIEW -->
                        <div class="card-box">
                            <div class="d-flex flex-column ">
                                <div class=" d-flex w-100 mt-4 px-5">
                                    <h4 class="weight-600 mb-3 mr-2 color-darkpink">Barangays</h4>
                                </div>

                                <div class=" flex-wrap px-3 pb-4">

                                    <div class=" " style="overflow-y: auto; height: 248px;">
                                        <table class="data-table table table-hover nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th><img class="pr-1" src="vendors/images/icon-letter-format.svg"
                                                            alt="">Barangay</th>
                                                    <th><img class="pr-1" src="vendors/images/icon-link.svg"
                                                            alt="">Attachments</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_brgy = "SELECT user_id, name FROM users";
                                                $result_brgy = mysqli_query($db, $sql_brgy);

                                                while ($row_brgy = mysqli_fetch_assoc($result_brgy)) {
                                                    $barangay = $row_brgy['name'];
                                                    $user_id = $row_brgy['user_id'];

                                                    $sql_mov = "SELECT COUNT(govarea) AS govarea_count FROM mov WHERE user_id = $user_id";
                                                    $result_mov = mysqli_query($db, $sql_mov);
                                                    $row_mov = mysqli_fetch_assoc($result_mov);
                                                    $govarea_count = $row_mov['govarea_count'];
                                                    ?>
                                                    <tr class='clickable-row' data-href='#'>
                                                        <td>
                                                            <?php echo $barangay; ?>
                                                        </td>
                                                        <td align='center'><a href='admin-barangay-profile.php  ?barangay=<?php echo $user_id; ?>'><u>
                                                                    <?php echo $govarea_count; ?>
                                                                </u></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="text-right"><a href="admin-mov-overview.php"><button class="mt-3 btn btn-sm btn-primary">View All</button></a>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>


                <div class="title pb-20">
                    <h2 class="h3 mb-0">Document Quick Links</h2>
                </div>

                <div class="row pb-10 ">

                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <a href="admin-mov-overview.php">
                            <div class="card-box d-board-sec-2 height-100-p p-3">
                                <div class="d-flex flex-wrap text-center py-3">
                                    <div class="col-md-12">
                                        <img src="vendors/icons/mov-overview.png" alt="" width="86px" height="74px">
                                    </div>
                                    <div class="col-md-12 py-2 pt-4">
                                        <div class="h5 weight-600">MOVs Overview</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <a href="#">
                            <div class="card-box d-board-sec-2 height-100-p p-3">
                                <div class="d-flex flex-wrap text-center py-3">
                                    <div class="col-md-12">
                                        <img src="vendors/images/dcf.png" alt="" width="86px" height="74px">
                                    </div>
                                    <div class="col-md-12 py-2 pt-4">
                                        <div class="h5 weight-600">Data Capture Form</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <a href="#">
                            <div class="card-box height-100-p p-3">
                                <div class="d-flex flex-wrap text-center py-3">
                                    <div class="col-md-12">
                                        <img src="vendors/icons/summary.png" alt="" width="86px" height="74px">
                                    </div>
                                    <div class="col-md-12 py-2 pt-4">
                                        <div class="h5 weight-600">Consolidated Assessments</div>
                                    </div>
                                </div>
                            </div>
                        </a>
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
        <!-- <script src="vendors/scripts/process.js"></script> -->
        <!-- <script src="vendors/scripts/layout-settings.js"></script> -->
        <!-- <script src="vendors\scripts\script.js"></script>
    <script src="src\plugins\bootstrap\bootstrap.js"></script> -->

        <script>
            jQuery(document).ready(function ($) {
                $(".clickable-row").click(function () {
                    window.location = $(this).data("href");
                });
            })
        </script>



    </body>

    </html>
<?php } else {
    echo "<script>alert('Access denied.');</script>";
} ?>