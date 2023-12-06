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

        <link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />

    </head>

    <body>

        <?php include('header.php'); ?>

        <div class="main-container">

            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="pl-3">


                    <div class="row justify-content-center">

                        <div class="col-md-11">
                            <p class="font-12 directory">
                                <a href="barangay-profile.php?tab=completed">
                                    <span class="ion ion-arrow-left-c pr-1"></span>Files & Folders
                                </a>
                            </p>
                        </div>

                        <div class="card-box col-md-11">
                            <div class="mx-3 px-4">

                                <div class="pt-25 pb-20">
                                    <div class="row align-items-center">
                                        <div class="col-md-auto">
                                            <img src="vendors/images/open-folder.png" height="50px" width="50px">
                                        </div>
                                        <div class="col">
                                            <div class="p font-24 weight-600">
                                                Business-Friendliness and Competitiveness
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                    <div class="row pb-4">

                                        <table class="table hover nowrap mb-0">
                                            <tbody>
                                                <?php
                                                $barangay = $_SESSION["user_id"];
                                                $query = mysqli_query($db, "SELECT doc_id, doc_name from mov WHERE user_id = $barangay AND govarea = 'Business-Friendliness and Competitiveness'");

                                                if (mysqli_num_rows($query) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query)): ?>
                                                        <tr>
                                                            <td>
                                                                <div class="pl-30">
                                                                    <img src="vendors/images/pdf.png" height="30px" width="30px">
                                                                    <a href="vendors/documents/MOVs/<?php echo $row['doc_name']; ?>"
                                                                        class="pl-10" target="_blank">
                                                                        <?php echo $row['doc_name']; ?>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile;
                                                } else {
                                                    // Alternative HTML when there are no rows
                                                    echo '<div class="container">
                                                    <div class="row justify-content-center text-center">
                                                        <div class="col-md-12">
                                                            <p>No files here yet.</p>
                                                        </div>
                                                    </div>
                                                  </div>';
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

    </body>

    </html>
<?php } else {
    echo "<script>alert('Access denied.');</script>";
} ?>