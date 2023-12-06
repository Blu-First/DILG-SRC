<?php
require_once('connector.php');

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION["emp_id"])) {
    ?>
    <?php
    if (isset($_GET['view'])) {
        $doc_id = $_GET['view'];

        // Prepare the statement
        $stmt = mysqli_prepare($db, "SELECT govarea, remarks, status, doc_name FROM mov WHERE doc_id = ?");

        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "s", $doc_id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Store the result set
        mysqli_stmt_store_result($stmt);

        // Check the number of rows
        $num_rows = mysqli_stmt_num_rows($stmt);

        if ($num_rows == 1) {
            // Fetch the results
            mysqli_stmt_bind_result($stmt, $govarea, $remarks, $status, $doc_name);
            mysqli_stmt_fetch($stmt); ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Review MOV</title>

                <!-- CSS -->
                <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
                <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
                <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                <link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />

                <style>
                    @media screen and (max-width: 768px) {

                        .mov-document,
                        .mov-details {
                            width: 100% !important;
                        }

                        .mov-document {
                            overflow-x: auto;
                        }
                    }
                </style>

            </head>

            <body>
                <?php include('admin-header.php'); ?>

                <div class="main-container">
                    <div class="xs-pd-20-10 pd-ltr-20">

                        <!--Submissions Completed breadcrumb-->
                        <div class="row pb-10">
                            <div class="col-12 mb-20">
                                <div class="card-box px-3 mx-3 py-2">
                                    <div class="d-inline-block px-4">
                                        <nav class="align-items-center" aria-label="breadcrumb"
                                            style="--bs-breadcrumb-divider: '';">
                                            <ol class="breadcrumb" style="padding: 1em 0em 0em 0em">
                                                <li class="breadcrumb-item"><a href="admin-mov-overview.php">MOVs
                                                        Overview</a></li>
                                                <li class="breadcrumb-item active"><a href="#"></a>Review MOV</a></li>
                                            </ol>
                                    </div>
                                    <div class="d-flex align-items-center px-4 pt-1 pb-3">
                                        <div class="flex-shrink-0">
                                            <h2 class="weight-600">MOV Review</h2>
                                        </div>
                                        <div class="accent-h-line ml-4">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row px-3">

                            <!-- First Column -->
                            <div class="col-md-8 flex-column mov-document">
                                <div class="card-box p-4 height-100-p">
                                    <div class="row">

                                        <!-- Header -->
                                        <div class="col-12 row align-items-center subhead">
                                            <div class="col-auto">
                                                <h5>
                                                    <?php echo $govarea; ?>
                                                </h5>
                                                <ul class="attached-file pt-10">
                                                    <li>
                                                        <i class="bx bx-paperclip"></i>
                                                        <?php echo $doc_name; ?>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col document-tools justify-content-end">
                                                <div class="search-document">
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search document" aria-controls="DataTables_Table_0">
                                                    <i class="bx bx-search"></i>
                                                </div>
                                                <div class="fullscreen-icon">
                                                    <i class="bx bx-fullscreen pointer"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Header -->
                                        <?php
                                        $directoryPath = "vendors/documents/MOVs/";
                                        $full_path = $directoryPath . $doc_name;
                                        if (file_exists($full_path)) {

                                            ?>


                                            <div class="col-12 mb-5 px-4">
                                                <div class="col-auto poppins text-center" style="max-width: 75rem; ">
                                                    <div class="col-auto card justify-content-center mt-5 fs-2">
                                                        <iframe src="<?php echo $full_path; ?>" class="mov" width="100%"
                                                            height="700px"></iframe>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 my-3 px-4 text-right">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Second Column -->
                                <div class="col-md-4 flex-column mov-details">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-4 height-100-p d-flex justify-content-center align-items-center">
                                                <button class="btn btn-primary btn-lg save-file">
                                                    <span class="d-flex align-items-center">
                                                        <li class="bx bx-save pr-10"></li>Save File
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SECTION: will show either the section for need pa ng verification + mga verified/invalid na -->
                                    <?php if ($status == 'Pending' or $status == 'pending'): ?>

                                        <!-- If still need to be reviewed -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box p-4 height-100-p ">
                                                    <h4>Status<span class="asterisk">*</span></h4>
                                                    <form id="updateStatus" class="movVerify" method="post" action="update_status.php">
                                                        <div class="row align-items-center pt-10 pl-10 pr-20">
                                                            <input type="hidden" name="doc_id" value="<?php echo $doc_id ?>">
                                                            <select name="status_select" id="statusSelect"
                                                                class="bootstrap-select selectpicker input-center ml-2 w-100 status-mov"
                                                                data-size="4" size="1" title="Select Status" required>
                                                                <option value="Verified">Verified</option>
                                                                <option value="Invalid">Invalid</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                    <script>
                                                        document.addEventListener('change', function (event) {
                                                            if (event.target.classList.contains('status-mov')) {
                                                                event.target.form.submit();
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- If verified -->

                                    <?php elseif ($status == 'Verified' or $status == 'verified'): ?>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box p-4 height-100-p">
                                                <h4 class="text-center">Status:
                                                        <span class="color-green">
                                                            <?php echo $status; ?>
                                                            <i class="ion-ios-checkmark" data-color="#00AA1E"></i>
                                                        </span>
                                                    </h4>
                                                    <form id="updateStatus" class="movVerify" method="post" action="update_status.php">
                                                        <div class="row align-items-center pt-10 pl-10 pr-20">
                                                            <input type="hidden" name="doc_id" value="<?php echo $doc_id ?>">
                                                            <select name="status_select" id="statusSelect"
                                                                class="bootstrap-select selectpicker input-center ml-2 w-100 status-mov"
                                                                data-size="4" size="1" title="Change Status" required>
                                                                <option value="Verified">Verified</option>
                                                                <option value="Invalid">Invalid</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                    <script>
                                                        document.addEventListener('change', function (event) {
                                                            if (event.target.classList.contains('status-mov')) {
                                                                event.target.form.submit();
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Remarks Section for VERIFIED -->
                                        <div class="row mt-30">
                                            <div class="col-12">
                                                <div class="card-box p-4 height-100-p">
                                                    <h4>Remarks</h4>
                                                    <?php if ($remarks == NULL) { ?>
                                                        <form id="updateRemarks" class="movVerify" method="post" action="update_remarks.php">
                                                            <div class="pt-10">
                                                                <input type="hidden" name="doc_id" value="<?php echo $doc_id ?>">
                                                                <textarea id="remarks" name="remarks" rows="4" cols="50" class="form-control"
                                                                    maxlength="500" required></textarea>

                                                                <!-- // Text if characters reached the max -->
                                                                <small class="pt-2 text-muted text-left" style="display: none;">Maximum 200
                                                                    characters</small>
                                                            </div>
                                                            <div class="col-md-12 my-3 px-4 text-right">
                                                                <button id="submitRemarks" class="btn btn-primary btn-sm"
                                                                    type="button">Submit</button>
                                                            </div>
                                                        </form>
                                                        <script>
                                                            document.getElementById('submitRemarks').addEventListener('click', function () {
                                                                var remarksValue = document.getElementById('remarks').value.trim();

                                                                if (remarksValue === "") {
                                                                    Swal.fire({
                                                                        icon: 'error',
                                                                        text: 'Please enter remarks before submitting.',
                                                                    });
                                                                } else {
                                                                    document.getElementById('updateRemarks').submit();
                                                                }
                                                            });
                                                            </script>
                                                        </script>
                                                    <?php } else { ?>
                                                        <div class="pt-10">
                                                            <p id="remarksText" class="justify-content px-4" style="word-wrap: break-word;">
                                                                <?php echo $remarks; ?>
                                                            </p>


                                                            <!-- Editing remarks -->
                                                            <div class="text-right">
                                                                <button id="editRemarkButton" class="btn-sm color-blue" name="edit_remark">
                                                                    <u>Edit Remark</u>
                                                                </button>
                                                            </div>

                                                            <form id="updateRemarksForm" class="movVerify" method="post"
                                                                action="update_remarks.php" style="display: none;">
                                                                <div class="pt-10">
                                                                    <input type="hidden" name="doc_id" value="<?php echo $doc_id ?>">
                                                                    <textarea id="remarksTextArea" name="remarks" rows="4" cols="50"
                                                                        class="form-control" maxlength="500" required></textarea>

                                                                    <!-- Text if characters reached the max -->
                                                                    <small class="pt-2 text-muted text-left" style="display: none;">Maximum 200
                                                                        characters</small>
                                                                </div>
                                                                <div class="col-md-12 my-3 px-4 text-right">
                                                                    <button id="submitRemarks" class="btn btn-primary btn-sm"
                                                                        type="button">Submit</button>
                                                                </div>
                                                            </form>

                                                            <script>
                                                                document.getElementById('editRemarkButton').addEventListener('click', function () {
                                                                    // Toggle visibility of elements
                                                                    document.getElementById('remarksText').style.display = 'none';
                                                                    document.getElementById('editRemarkButton').style.display = 'none';
                                                                    document.getElementById('updateRemarksForm').style.display = 'block';

                                                                    // Set initial value for the textarea
                                                                    document.getElementById('remarksTextArea').value = '<?php echo $remarks; ?>';
                                                                });

                                                                document.getElementById('submitRemarks').addEventListener('click', function () {
                                                                    // Check if textarea is empty
                                                                    var remarksValue = document.getElementById('remarksTextArea').value.trim();

                                                                    if (remarksValue === "") {
                                                                        // Show SweetAlert for empty textarea
                                                                        Swal.fire({
                                                                            icon: 'error',
                                                                            text: 'Please enter remarks before submitting.',
                                                                        });
                                                                    } else {
                                                                        // If not empty, submit the form
                                                                        document.getElementById('updateRemarksForm').submit();
                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- If invalid -->

                                    <?php elseif ($status == 'Invalid' or $status == 'invalid'):
                                        ?>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box p-4 height-100-p">
                                                    <h4 class="text-center">Status:
                                                        <span class="color-red">
                                                            <?php echo $status; ?>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Required Remarks for INVALID -->
                                        <div class="row mt-30">
                                            <div class="col-12">
                                                <div class="card-box p-4 height-100-p" style="overflow: auto;">
                                                    <h4>Remarks<span class="asterisk">*</span></h4>
                                                    <?php if ($remarks == NULL) { ?>
                                                        <form id="updateRemarks" class="movVerify" method="post" action="update_remarks.php">
                                                            <div class="pt-10">
                                                                <input type="hidden" name="doc_id" value="<?php echo $doc_id ?>">
                                                                <textarea id="remarks" name="remarks" rows="4" cols="50" class="form-control"
                                                                    maxlength="500" required></textarea>

                                                                <!-- // Text if characters reached the max -->
                                                                <small class="pt-2 text-muted text-left" style="display: none;">Maximum 200
                                                                    characters</small>
                                                            </div>
                                                            <div class="col-md-12 my-3 px-4 text-right">
                                                                <button id="submitRemarks" class="btn btn-primary btn-sm"
                                                                    type="button">Submit</button>
                                                            </div>
                                                        </form>
                                                        <script>
                                                            document.getElementById('submitRemarks').addEventListener('click', function () {
                                                                var remarksValue = document.getElementById('remarks').value.trim();

                                                                if (remarksValue === "") {
                                                                    Swal.fire({
                                                                        icon: 'error',
                                                                        text: 'Please enter remarks before submitting.',
                                                                    });
                                                                } else {
                                                                    document.getElementById('updateRemarks').submit();
                                                                }
                                                            });
                                                        </script>

                                                    <?php } else { ?>

                                                        <div class="pt-10">
                                                            <p id="remarksText" class="justify-content px-4" style="word-wrap: break-word;">
                                                                <?php echo $remarks; ?>
                                                            </p>


                                                            <!-- Editing remarks -->
                                                            <div class="text-right">
                                                                <button id="editRemarkButton" class="btn-sm color-blue" name="edit_remark">
                                                                    <u>Edit Remark</u>
                                                                </button>
                                                            </div>

                                                            <form id="updateRemarksForm" class="movVerify" method="post"
                                                                action="update_remarks.php" style="display: none;">
                                                                <div class="pt-10">
                                                                    <input type="hidden" name="doc_id" value="<?php echo $doc_id ?>">
                                                                    <textarea id="remarksTextArea" name="remarks" rows="4" cols="50"
                                                                        class="form-control" maxlength="500" required></textarea>

                                                                    <!-- Text if characters reached the max -->
                                                                    <small class="pt-2 text-muted text-left" style="display: none;">Maximum 200
                                                                        characters</small>
                                                                </div>
                                                                <div class="col-md-12 my-3 px-4 text-right">
                                                                    <button id="submitRemarks" class="btn btn-primary btn-sm"
                                                                        type="button">Submit</button>
                                                                </div>
                                                            </form>

                                                            <script>
                                                                document.getElementById('editRemarkButton').addEventListener('click', function () {
                                                                    // Toggle visibility of elements
                                                                    document.getElementById('remarksText').style.display = 'none';
                                                                    document.getElementById('editRemarkButton').style.display = 'none';
                                                                    document.getElementById('updateRemarksForm').style.display = 'block';

                                                                    // Set initial value for the textarea
                                                                    document.getElementById('remarksTextArea').value = '<?php echo $remarks; ?>';
                                                                });

                                                                document.getElementById('submitRemarks').addEventListener('click', function () {
                                                                    // Check if textarea is empty
                                                                    var remarksValue = document.getElementById('remarksTextArea').value.trim();

                                                                    if (remarksValue === "") {
                                                                        // Show SweetAlert for empty textarea
                                                                        Swal.fire({
                                                                            icon: 'error',
                                                                            text: 'Please enter remarks before submitting.',
                                                                        });
                                                                    } else {
                                                                        // If not empty, submit the form
                                                                        document.getElementById('updateRemarksForm').submit();
                                                                    }
                                                                });
                                                            </script>
                                                        </div>



                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Ending the IF Else nest -->

                                <?php endif; ?>

                            </div>

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
                    <!-- <script src="vendors\scripts\script.js"></script>
    <script src="src\plugins\bootstrap\bootstrap.js"></script> -->


                    <script>
                        document.addEventListener("DOMContentLoaded", function () {



                            // FULL SCREEN
                            const fullscreenIcon = document.querySelector(".fullscreen-icon");
                            const pdfContainer = document.querySelector(".mov");

                            fullscreenIcon.addEventListener("click", function () {
                                if (!document.fullscreenElement &&
                                    !document.mozFullScreenElement &&
                                    !document.webkitFullscreenElement &&
                                    !document.msFullscreenElement) {
                                    if (pdfContainer.requestFullscreen) {
                                        pdfContainer.requestFullscreen();
                                    } else if (pdfContainer.mozRequestFullScreen) {
                                        pdfContainer.mozRequestFullScreen();
                                    } else if (pdfContainer.webkitRequestFullscreen) {
                                        pdfContainer.webkitRequestFullscreen();
                                    } else if (pdfContainer.msRequestFullscreen) {
                                        pdfContainer.msRequestFullscreen();
                                    }
                                } else {
                                    if (document.exitFullscreen) {
                                        document.exitFullscreen();
                                    } else if (document.mozCancelFullScreen) {
                                        document.mozCancelFullScreen();
                                    } else if (document.webkitExitFullscreen) {
                                        document.webkitExitFullscreen();
                                    } else if (document.msExitFullscreen) {
                                        document.msExitFullscreen();
                                    }
                                }

                                if (document.fullscreenElement) {
                                    pdfContainer.style.height = "100vh";
                                } else {
                                    pdfContainer.style.height = "700px";
                                }
                            });


                            // MAX CHARACTER

                            const textarea = document.querySelector('textarea[name="remarks"]');
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

                            // SAVE FILE
                            const downloadButton = document.querySelector(".save-file");
                            const iframe = document.querySelector(".mov");
                            var f_FileName = <?php echo json_encode($doc_name); ?>.replace(/ /g, '_');


                            downloadButton.addEventListener("click", async function () {
                                try {
                                    const response = await fetch(iframe.src);
                                    const blob = await response.blob();

                                    const downloadLink = document.createElement("a");
                                    downloadLink.href = URL.createObjectURL(blob);
                                    downloadLink.download = f_FileName; // Eto ung magiging downloaded file name.
                                    downloadLink.click();
                                } catch (error) {
                                    console.error("Error fetching or downloading the PDF:", error);
                                }
                            });

                            // 

                            document.getElementById('statusSelect').addEventListener('change', function () {
                                submitSelect('updateStatus');
                            });
                            document.getElementById('submitRemarks').addEventListener('click', function () {
                                submitSelect('updateRemarks');
                            });
                            class FormSubmitter {
                                constructor(formId) {
                                    this.formId = formId;
                                }

                                submitForm() {
                                    var formData = new FormData(document.getElementById(this.formId));
                                    var doc_id = <?php echo json_encode($doc_id); ?>;

                                    formData.append('doc_id', doc_id);

                                    fetch('admin-mov-update.php', {
                                        method: 'POST',
                                        body: formData
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            // Handle the response data here
                                            console.log(data);
                                        })
                                        .catch(error => {
                                            // Handle errors here
                                            console.error('Error:', error);
                                        });
                                }
                            }

                            function submitSelect(formId) {
                                var formSubmitter = new FormSubmitter(formId);
                                formSubmitter.submitForm();
                            }

                            function submitRemarks(formId) {
                                var formSubmitter = new FormSubmitter(formId);
                                formSubmitter.submitForm();
                            }
                        });
                    </script>
                    


                </body>

                </html>

                <?php

                                        } else {
                                            // File doesn't exist, handle accordingly
                                            echo "<script>alert('File not found.');</script>";
                                        }
        } else {
            // No rows found
            echo "<script>alert('No matching records found.');</script>";
            header(404);
        }
        // Close the statement
        mysqli_stmt_close($stmt);
    }
} else {
    echo "<script>alert('Access denied.');</script>";
    http_response_code(403);
}
?>