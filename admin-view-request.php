<?php
require_once('connector.php');

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

$request_id = $_GET['req_code'];
$sql = "SELECT * from dl_request WHERE req_code=$request_id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$barangay = $row['barangay'];

$queryname = mysqli_query($db, "SELECT * from users WHERE username = '$barangay'");
$fetchname = mysqli_fetch_assoc($queryname);


$approved = 'Approved';
$rejected = 'Rejected';

if (isset($_POST['approved_btn'])) {
    $sql = "UPDATE dl_request SET status = '$approved' WHERE req_code = $request_id";
    mysqli_query($db, $sql);
}

if (isset($_POST['reject_btn'])) {
    $sql = "UPDATE dl_request SET status = '$rejected' WHERE req_code = $request_id";
    mysqli_query($db, $sql);
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
                <!--Submissions & Completed Tab Slider-->

                <?php

                $status_query = mysqli_query($db, "SELECT status FROM `dl_request` WHERE req_code = $request_id");
                if ($status_query) {
                    $status_row = mysqli_fetch_assoc($status_query);
                    $status = $status_row['status'];

                    if ($status == 'Pending') {
                        // Your code here
                        ?>
                        <div class="container-fluid my-3">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <p class="font-12 directory">
                                        <a href="request-overview.html">
                                            <span class="ion ion-arrow-left-c pr-1"></span>Requests Overview
                                        </a>
                                    </p>
                                </div>

                                <div class="card-box col-md-8">
                                    <div class="row mx-3 px-4 justify-content-center">
                                        <div class="h2 my-4">Request for Deadline Extension
                                        </div>
                                    </div>
                                </div>

                                <div class="card-box col-md-8 mt-15 mx-3 px-4">
                                    <div class="row justify-content-center pt-30 pb-20">
                                        <div class="col-md-10 col-sm-12">
                                            <div class="request-content">
                                                <div class="recipient">
                                                    <h4>Barangay: <span class="color-darkpink">
                                                            <?php echo $fetchname['name']; ?>
                                                        </span></h4>
                                                    <p class="font-16">For Governance Area(s) MOVs: Disaster Preparedness,
                                                        Social Security and Sensitivity
                                                    </p>
                                                </div>

                                                <div class="request-details mt-2">
                                                    <p class="font-14">
                                                        <?php echo $row['req_content']; ?>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Approve or Reject Buttons -->
                                <div class="col-md-8 mt-15 mx-3 px-4">
                                    <form method="POST">
                                        <div class="col-md-6 my-3 px-2">
                                            <!-- Approve -->
                                            <button
                                                class="btn no-border btn-lg btn-primary bg-green color-white justify-content-center align-items-center"
                                                type="submit" stye="border:none !important" style="border: none;"
                                                name="approved_btn">
                                                <i class="ion ion-checkmark-circled pr-1" data-color="#fff"></i>Approve
                                            </button>

                                            <!-- Reject -->
                                            <button
                                                class="btn no-border btn-outline-none btn-primary btn-lg bg-red justify-content-center align-items-center"
                                                type="submit" name="reject_btn" style="border: none;">
                                                <i class="ion ion-close pr-1" data-color="#fff"></i>Reject
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                    } else if ($status == 'Approved') {
                        include('approved-request.php');
                    } else if ($status == 'Rejected') {
                        include('rejected-request.php');
                    }
                    ?>

            <!-- If already reviewed -->
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
            <!-- <script src="vendors/scripts/script.js"></script>
    <script src="src/plugins/bootstrap/bootstrap.js"></script> -->
            <script src="src/plugins/dropzone/src/dropzone.js"></script>


            <script>

                // For maxed length sa textarea - reasons

                const textarea = document.querySelector('textarea[name="request_reason"]');
                const maxLength = parseInt(textarea.getAttribute('maxlength'));
                const feedbackElement = document.querySelector('.text-muted');

                textarea.addEventListener('input', function () {
                    const currentLength = this.value.length;

                    if (currentLength > maxLength) {
                        this.value = this.value.substring(0, maxLength);
                    }

                    if (currentLength >= maxLength) {
                        feedbackElement.style.display = 'block';
                    } else {
                        feedbackElement.style.display = 'none';
                    }

                    feedbackElement.textContent = `Character limit reached.`;
                });
            </script>

        </body>

        </html>
    <?php }
} else {
    echo "<script>alert('Access denied.');</script>";
} ?>