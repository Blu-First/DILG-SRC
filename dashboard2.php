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
            <!-- Page Title -->
            <div class="container-fluid mt-3 mb-5">
                <header>
                    <div class="card-box weight-600">
                        <div class="align-items-center mx-3 p-4">
                            <div class=" "><span class="text-uppercase color-darkpink">sglgb</span> Management System |
                                Admin</div>
                            <div>
                                <h1 class="display-3">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <!-- Page Title End -->

            <div class="container-fluid my-3">
                <div class="row pb-10" style="height: 800px;">
                    <!-- Left Cardbox -->
                    <div class="col-xl-7 col-lg-7 col-md-7  mb-20">
                        <div class="card-box px-5 py-3">
                            <div class="d-flex flex-wrap py-3">
                                <h4 class="weight-500">Submission Progress</h4>
                                <hr class="w-100 mt-3 mb-3">
                                <div class="table-util ml-auto ">
                                    <button class="px-2"><img class="" src="vendors/images/icon-timeline.svg"
                                            alt=""></button>
                                    <button class="px-2"><img class="" src="vendors/images/icon-filter.svg"
                                            alt=""></button>
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter d-inline-block pr-0">
                                        <div class="d-inline-block">
                                            <label class="d-none">Search:</label>
                                            <div class="input-container">
                                                <input type="search" class="form-control form-control-sm"
                                                    placeholder="Search" aria-controls="DataTables_Table_0">
                                                <i class="icon-right"><span class='icon-search '></span></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>Barangay</div>
                                <div class="d-flex my-4 ml-4 mr-2">
                                    <div class="container-progress">
                                        <div class="progress">
                                            <!-- calc(16.666667% * variable / 100) also change aria value-->
                                            <div class="progress-bar criteria-1" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-2" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-3" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-4" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-5" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-6" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        100%
                                    </div>
                                </div>
                                <hr class="w-100">

                                <div>Barangay 2</div>
                                <div class="d-flex my-4 ml-4 mr-2">
                                    <div class="container-progress">
                                        <div class="progress">
                                            <div class="progress-bar criteria-1" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-2" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-3" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-4" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-5" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-6" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        100%
                                    </div>
                                </div>
                                <hr class="w-100">

                                <div>Barangay 3</div>
                                <div class="d-flex my-4 ml-4 mr-2">
                                    <div class="container-progress">
                                        <div class="progress">
                                            <div class="progress-bar criteria-1" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-2" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-3" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-4" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-5" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-6" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        100%
                                    </div>
                                </div>
                                <hr class="w-100">

                                <div>Barangay 4</div>
                                <div class="d-flex my-4 ml-4 mr-2">
                                    <div class="container-progress">
                                        <div class="progress">
                                            <div class="progress-bar criteria-1" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-2" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-3" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-4" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-5" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-6" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        100%
                                    </div>
                                </div>
                                <hr class="w-100">

                                <div>Barangay 6</div>
                                <div class="d-flex my-4 ml-4 mr-2">
                                    <div class="container-progress">
                                        <div class="progress">
                                            <div class="progress-bar criteria-1" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-2" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-3" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-4" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-5" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar criteria-6" role="progressbar"
                                                style="width: calc(16.666667% * 100 / 100)" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        100%
                                    </div>
                                </div>
                                <hr class="w-100">
                                <div class="d-flex"><button class="btn btn-sm btn-primary ml-auto my-3"
                                        aria-label="View all Barangay" role="link">View All</button></div>
                            </div>
                        </div>
                    </div>
                    <!-- Left Cardbox END -->

                    <!-- Right Cardbox -->
                    <div class="col-xl-5 col-lg-5 col-md-5 mb-20">
                        <div class="d-flex flex-column" style="height: 800px;">
                            <!-- First CardBox LEGENDS -->
                            <div class="card-box px-5 py-3 mb-20">
                                <div class="d-flex flex-wrap py-3">
                                    <h4 class="weight-500 w-100 mb-3">Legends</h4>
                                    <div class="legend w-100 d-flex">
                                        <span class="criteria-1-icon flex-shrink-0 align-self-center mr-3 "></span>
                                        Financial Administration and Sustainability
                                    </div>
                                    <div class="legend w-100 d-flex">
                                        <span class="criteria-2-icon flex-shrink-0 align-self-center mr-3 "></span>
                                        Disaster Preparedness
                                    </div>
                                    <div class="legend w-100 d-flex">
                                        <span class="criteria-3-icon flex-shrink-0 align-self-center mr-3 "></span>
                                        Safety, Peace and Order
                                    </div>
                                    <div class="legend w-100 d-flex">
                                        <span class="criteria-4-icon flex-shrink-0 align-self-center mr-3 "></span>
                                        Social Protection and Sensitivity
                                    </div>
                                    <div class="legend w-100 d-flex">
                                        <span class="criteria-5-icon flex-shrink-0 align-self-center mr-3 "></span>
                                        Business-Friendliness and Competitiveness
                                    </div>
                                    <div class="legend w-100 d-flex">
                                        <span class="criteria-6-icon flex-shrink-0 align-self-center mr-3 "></span>
                                        Environmental Management
                                    </div>

                                </div>
                            </div>

                            <!-- Second Cardbox To REVIEW -->
                            <div class="card-box">
                                <div class="d-flex flex-column ">
                                    <div class=" d-flex w-100 mt-4 px-5">
                                        <h4 class="weight-500 mb-3 mr-2">To Review</h4>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 12C0 5.37257 5.3726 0 12 0C18.6275 0 24 5.37257 24 12C24 18.6273 18.6275 24 12 24C5.3726 24 0 18.6273 0 12ZM12 1.72131C6.32326 1.72131 1.72133 6.32323 1.72133 12C1.72133 17.6766 6.32326 22.2787 12 22.2787C17.6768 22.2787 22.2787 17.6766 22.2787 12C22.2787 6.32323 17.6768 1.72131 12 1.72131ZM13.359 17.4362C13.359 18.1867 12.7506 18.7951 12.0001 18.7951C11.2495 18.7951 10.6411 18.1867 10.6411 17.4362C10.6411 16.6857 11.2495 16.0773 12.0001 16.0773C12.7506 16.0773 13.359 16.6857 13.359 17.4362ZM9.37298 9.73558C9.37298 8.5073 10.4331 7.3348 12.0003 7.3348C13.5674 7.3348 14.6275 8.5073 14.6275 9.73558C14.6275 10.6255 14.1383 11.0802 13.2948 11.5927C13.2006 11.6499 13.092 11.7129 12.9759 11.7804C12.6439 11.9732 12.25 12.2019 11.954 12.4326C11.5149 12.7747 11.0037 13.3267 11.0037 14.1747C11.0037 14.7251 11.4499 15.1713 12.0003 15.1713C12.5481 15.1713 12.9927 14.7292 12.9968 14.1823L12.9978 14.1807C13.0135 14.1559 13.0601 14.0975 13.179 14.0048C13.3629 13.8615 13.5677 13.7428 13.8405 13.5847C13.9828 13.5023 14.1436 13.4091 14.3296 13.2961C15.298 12.7078 16.6206 11.7356 16.6206 9.73558C16.6206 7.34003 14.6005 5.3417 12.0003 5.3417C9.40003 5.3417 7.37986 7.34003 7.37986 9.73558C7.37986 10.286 7.82605 10.7321 8.37642 10.7321C8.92681 10.7321 9.37298 10.286 9.37298 9.73558Z"
                                                fill="#AB9301" />
                                        </svg>
                                    </div>

                                    <div class=" flex-wrap px-3 pb-4">

                                        <div class=" " style="overflow-y: auto; height: 282px;">
                                            <table class="data-table table table-hover nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th><img class="pr-1"
                                                                src="vendors/images/icon-letter-format.svg"
                                                                alt="">Barangay</th>
                                                        <th><img class=" pr-1" src="vendors/images/icon-link.svg"
                                                                alt="">Attachments</th>
                                                        <th><img class="mb-1 pr-1" src="vendors/images/icon-date.svg"
                                                                alt="">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class='clickable-row' data-href='#'>
                                                        <td>
                                                            Barangay
                                                        </td>

                                                        <td align="center">
                                                            <a href="#"><u>7</u></a>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Review</button>
                                                        </td>
                                                    </tr>

                                                    <tr class='clickable-row' data-href='#'>
                                                        <td>
                                                            Barangay
                                                        </td>

                                                        <td align="center">
                                                            <a href="#"><u>3</u></a>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Review</button>
                                                        </td>
                                                    </tr>

                                                    <tr class='clickable-row' data-href='#'>
                                                        <td>
                                                            Barangay
                                                        </td>

                                                        <td align="center">
                                                            <a href="#"><u>5</u></a>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Review</button>
                                                        </td>
                                                    </tr>

                                                    <tr class='clickable-row' data-href='#'>
                                                        <td>
                                                            Barangay
                                                        </td>

                                                        <td align="center">
                                                            <a href="#"><u>1</u></a>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Review</button>
                                                        </td>
                                                    </tr>

                                                    <tr class='clickable-row' data-href='#'>
                                                        <td>
                                                            Barangay
                                                        </td>

                                                        <td align="center">
                                                            <a href="#"><u>2</u></a>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Review</button>
                                                        </td>
                                                    </tr>

                                                    <tr class='clickable-row' data-href='#'>
                                                        <td>
                                                            Barangay
                                                        </td>

                                                        <td align="center">
                                                            <a href="#"><u>6</u></a>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Review</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div>
                                                <hr>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Right Cardbox END -->

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
<?php }
else {
	echo "<script>alert('Access denied.');</script>";
} ?>
