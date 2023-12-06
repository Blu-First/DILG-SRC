<?php

// Fetching the REQUESTS table
$sql = "SELECT * FROM dl_request WHERE barangay = '$username'";
$result_name = mysqli_query($db, $sql);
$fetchrow = mysqli_fetch_assoc($result_name);

?>

<div class="with-request">
    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <div class="ml-5 col-md-7 mb-10">

                <?php

                // Fetching data from USERS table
                $query = "SELECT * FROM users WHERE user_id = $barangay";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                $name = $row['name'];

                $request_query = mysqli_query($db, "SELECT * FROM `dl_request` WHERE barangay = '$username'") or die('query failed');

       
                if ($row = mysqli_fetch_assoc($request_query)) {
                    $status = $row['status'];
                
                    if ($status == 'Pending') {
                        echo '<p class="pending-approval color-white">
                                <i class="ion ion-clock pr-2" data-color="#fff"></i>Pending For Approval
                                </p> </div>';
                    } elseif ($status == 'Approved') {
                        echo '<div class="d-flex">';
                        echo '<p class="status-approved-request color-white align-self-start">
                            <i class="ion-checkmark-circled pr-1 pr-2" data-color="#fff"></i>Approved
                        </p>
                
                        <div class="d-flex flex-column ml-3">
                        <p>Date allocated: </br>';

                        $dateAllocated = date_create($row['date_allocated']);
                        echo date_format($dateAllocated, 'm/d/Y') . ', ';
                        echo date_format($dateAllocated, 'g:i A');
                
                        echo '</p></div></div></div>';
                        
                    } elseif ($status == 'Rejected') {
                        echo '<p class="status-rejected-request color-white">
                            <i class="ion ion-close pr-1" data-color="#fff"></i>Rejected
                        </p> </div>';
                    }                   
                }
                ?>
                <div class="card-box col-md-7">
                    <div class="row mx-3 px-4 justify-content-center">
                        <div class="h1 my-4">Request for Deadline Extension</div>
                    </div>
                </div>
                

                <div class="card-box col-md-7 mt-15 mx-3 px-4">
                    <div class="row justify-content-center pt-30 pb-20">
                        <div class="col-md-10 col-sm-12">
                            <div class="request-content">
                                <div class="recipient">
                                    <h2>Barangay: <span class="color-darkpink">
                                            <?php echo $name; ?>
                                        </span></h4>
                                        <p class="font-16">For Governance Area(s) MOVs:
                                            <?php echo $fetchrow['govareas']; ?>
                                        </p>
                                </div>

                                <div class="request-details mt-2">
                                    <p class="font-14 text-justify">
                                        <?php echo $fetchrow['req_content']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ml-5 col-md-7 mb-10 text-right  mt-15 mx-3 px-4">
                    <p class="font-12" style="color: gray"><i>Requested at
                            <?php
                            $dateRequested = date_create($fetchrow['date_requested']);
                            echo date_format($dateRequested, 'm/d/Y') . '<br>';
                            echo date_format($dateRequested, 'g:i A');
                            ?>
                        </i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>