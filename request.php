<?php
require_once('connector.php');

$barangay = $_SESSION["user_id"];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['request_btn'])) {
    $govareas = isset($_POST['request_govarea']) ? $_POST['request_govarea'] : array();
    $content = isset($_POST['request_content']) ? mysqli_real_escape_string($db, $_POST['request_content']) : '';
    $status = 'Pending';

    // Fetch the username from the database based on user_id
    $query = "SELECT username FROM users WHERE user_id = $barangay";
    $result = mysqli_query($db, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];

        $govareas_str = implode(', ', $govareas);

        $sql = "INSERT INTO dl_request(barangay, govareas, req_content, status, date_requested, status_timestamp)
        VALUES('$username', '$govareas_str', '$content', '$status', current_timestamp(), current_timestamp())";

        $query = mysqli_query($db, $sql);

    }
}


if (isset($_SESSION["user_id"])) {

    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8" />
        <title>Request Deadline Extension</title>


        <!-- Site favicon -->
        <link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />


        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
        <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

    </head>

    <body>
        <?php include('header.php'); ?>

        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">

                <!-- If No Request Yet -->
                <?php
                $query = "SELECT username FROM users WHERE user_id = $barangay";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                $request_query = mysqli_query($db, "SELECT * FROM `dl_request` WHERE barangay = '$username'") or die('query failed');
                if (mysqli_num_rows($request_query) == 0) {
                    ?>
                    <div class="no-request">
                        <div class="container-fluid my-3">
                            <div class="row justify-content-center">
                                <div class="card-box col-md-8">
                                    <div class="row mx-3 px-4 justify-content-center">
                                        <div class="h2 my-4">Request for <span class="color-darkpink">Deadline Extension</span>
                                        </div>
                                    </div>
                                    <form method="POST" action="request.php">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 col-sm-12">

                                                <div class="no-request">
                                                    <div class="form-group text-center">

                                                        <label>Governance Area(s)</label>

                                                        <div class="col-md-6 mx-auto">
                                                            <select
                                                                class="bootstrap-select selectpicker border-select input-center ml-2 w-100"
                                                                data-size="4" size="1" title="Select Area(s)"
                                                                name="request_govarea[]" multiple required>
                                                                <option value="Financial Administration and
                                                                    Sustainability">Financial Administration &
                                                                    Sustainability
                                                                </option>
                                                                <option value="Disaster Preparedness">Disaster Preparedness</option>
                                                                <option value="Safety, Peace and Order">Safety, Peace and Order
                                                                </option>
                                                                <option value="Social Protection and Sensitivity">Social Protection and
                                                                    Sensitivity
                                                                </option>
                                                                <option value="Busines Friendliness and
                                                                    Competitiveness">Busines Friendliness and
                                                                    Competitiveness
                                                                </option>
                                                                <option value="Environmental Management">Environmental Management</option>
                                                            </select>
                                                        </div>

                                                        <div class="text-left">
                                                            <label class="mt-3">State the reason:</label>
                                                        </div>

                                                        <textarea name="request_content" class="request-textarea form-control"
                                                            maxlength="500"></textarea>
                                                        <small class="text-muted text-left" style="display: none;">Maximum 200
                                                            characters</small>

                                                        <div class="col-md-12 my-3 text-right">
                                                            <button class="btn btn-primary btn-sm" type="submit"
                                                                name="request_btn">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php } else {
                    include('submitted-request.php');
                }
                ?>
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
        <!-- <script src="vendors/scripts/process.js"></script> -->
        <!-- <script src="vendors/scripts/layout-settings.js"></script> -->
        <!-- <script src="vendors/scripts/script.js"></script>
    <script src="src/plugins/bootstrap/bootstrap.js"></script> -->
        <script src="src/plugins/dropzone/src/dropzone.js"></script>


        <script>

            // For maxed length sa textarea - reasons

            const textarea = document.querySelector('textarea[name="request_content"]');
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
<?php } else {
    echo "<script>alert('Access denied.');</script>";
} ?>