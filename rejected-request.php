<?php
require_once('connector.php');

$request_id = $_GET['req_code'];

if (isset($_POST['date_alloc_btn'])) {
    // Get the date value from the form
    $date_from_picker = $_POST['date_allocated'];

    // Convert the date to the desired format
    $formatted_date = date('Y-m-d H:i:s', strtotime($date_from_picker));

    // Update the record in the database
    $sql = "UPDATE dl_request SET date_allocated = '$formatted_date' WHERE req_code = $request_id";
    mysqli_query($db, $sql);

    $result = mysqli_query($db, "SELECT * FROM dl_request WHERE req_code = $request_id");
    $getrow = mysqli_fetch_assoc($result);
}
?>

<div class="container-fluid my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center">
                <p class="font-12 directory">
                    <a href="admin-request-overview.php">
                        <span class="ion ion-arrow-left-c pr-1"></span>Requests Overview
                    </a>
                </p>

                <p class="status-rejected-request color-white">
                    <i class="ion ion-close pr-1" data-color="#fff"></i>Rejected
                </p>
            </div>
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


        <div class="col-md-8 mb-10 text-right  mt-15 mx-3 px-4">
            <p class="font-12" style="color: gray"><i>Reviewed at
                    <?php
                    $dateRequested = date_create($row['status_timestamp']);
                    echo date_format($dateRequested, 'm/d/Y') . '<br>';
                    echo date_format($dateRequested, 'g:i A');
                    ?>
                </i>
            </p>
        </div>

        <!-- Approve or Reject Buttons -->
    </div>
</div>
</div>

</div>

<!-- Footer -->