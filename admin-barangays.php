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

        <!-- Add this line to include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>

    <body>

        <?php include('admin-header.php'); ?>
        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <!-- Page Title -->
                <div class="container-fluid mt-3 mb-5">
                    <div class="card-box pt-3">
                        <div class="row align-items-center mx-3 px-4">
                            <div class=" ">
                                <h2 class="mb-0">Barangays</h2>
                                <nav class="" style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                    <ol class="breadcrumb pt-0">
                                        <li class="breadcrumb-item" aria-current="page"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active"><a href="admin-barangays.php">Barangays</a></li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="table-util ml-auto ">
                                <div id="" class="dataTables_filter d-inline-block pr-0">
                                    <div class="d-inline-block">
                                        <label class="d-none">Search:</label>
                                        <div class="input-container">
                                            <input type="search" id="searchInput" class="form-control form-control-sm" placeholder="Search"
                                                aria-controls="DataTables_Table_0">
                                            <i class="icon-right"><span class='icon-search'></span></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Title End -->

                <div id="searchResults" class="container-fluid">
                            <!-- Search results will be displayed here -->
                </div>
                        
                <?php
                $sql = "SELECT user_id, name, logo FROM users";
                $result = $db->query($sql);
                ?>

                <div class="container-fluid original-content">
                    <ul class="row">
                        <?php
                        $counter = 0;

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            if ($counter % 4 == 0) {
                                echo '</ul><ul class="row pb-10">';
                            }
                            ?>
                            <li class="col-xl-3 col-lg-3 col-md-6 mb-20">
                                <a href="admin-barangay-profile.php?barangay=<?php echo $row['user_id']; ?>">
                                    <div class="card-box height-100-p p-3">
                                        <div class="d-flex flex-wrap text-center py-3">
                                            <div class="col-md-12">
                                                <img src="vendors/images/barangay-logos/<?php echo $row['logo']; ?>" alt="" width="100px" height="100px">
                                            </div>
                                            <div class="col-md-12 py-2">
                                                <div class="h5 weight-600 pt-3">
                                                    <?php echo $row['name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php
                            $counter++;
                        }
                        ?>
                    </ul>
                </div>

                <?php
                $result->free_result();
                $db->close();
                ?>

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
        <script>
            $(document).ready(function () {
                $("#searchInput").on("input", function () {
                    var searchValue = $(this).val();

                    $(".original-content").hide();

                    $.ajax({
                        method: "POST",
                        url: "admin-search-barangay.php",
                        data: { search: searchValue },
                        success: function (response) {
                            $("#searchResults").html(response);
                        }
                    });
                });
            });
        </script>

    </body>

    </html>
<?php } else {
    echo "<script>alert('Access denied.');</script>";
} ?>
