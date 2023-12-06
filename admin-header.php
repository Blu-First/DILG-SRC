<?php

$namecode = mysqli_query($db, "SELECT * FROM dilg_emp WHERE emp_id = '{$_SESSION['emp_id']}'");
$namesql = mysqli_fetch_assoc($namecode);

?>

<div class="dilg-header px-5">

<div class="dilg-header-left col-2 col-sm-3" onclick="location.href='admin-dashboard.php';"
    style=" cursor:pointer">
    <img class="logo" src="vendors/images/logo-dilg.png" alt="DILG Logo Small">
    <span class="logo-title pl-1" class="">SGLGB <span class="title-portal"> Portal</span></span>
</div>

<div class="dilg-header-right">

    <!-- Notifications Button -->

    <div class="user-notification">
        <div class="dropdown">
            <a class="nav-icon mx-3 d-none d-sm-inline dropdown-toggle no-arrow" href="#" role="button"
                data-toggle="dropdown">
                <li class="ion ion-android-notifications color-white"></li>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <!-- WITH NO NOTIFICATIONS -->
                <!-- <div class="no-notifs-list mx-h-350">

                    <div class="notifs-title">
                        <h2> Notifications</h2>
                    </div>

                    <div class="no-notifs-notice">
                        <img class="no-notifs-img" src="vendors/images/icon-no-notifs-lg.png" >
                        <p class="font-12 weight-100 color-blackfade">Notifications are currently empty.</p>
                    </div>
                </div> -->

                <!-- WITH NOTIFICATIONS -->
                <div class="notification-list mx-h-350 customscroll">

                    <div class="notifs-title">
                        <h2> Notifications</h2>
                    </div>

                    <div class="notifs">
                        <ul>
                            <li>
                                <a href="#">
                                    <p>
                                        • Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>
                                        • Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">

                                    <p>
                                        • Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>
                                        • Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>
                                        • Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>
                                        • Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Menu Button -->
    <div class="menu-toggle">
        <div class="dropdown">
            <a class="nav-icon mx-3 d-none d-sm-inline dropdown-toggle no-arrow" href="#" role="button"
                data-toggle="dropdown">
                <li class="bx bx-grid-alt color-white"></li>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="menu-list mx-h-350 scroll">
                    <div class="notifs-title mb-10">
                        <h2>Menu</h2>
                    </div>

                    <!-- General -->
                    <div class="row">
                        <ul class="menu-links">
                            <li>
                                <a href="admin-dashboard.php">
                                    <img src="vendors/icons/home.png">
                                    <p>Home</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/icons/inbox.png">
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li>
                                <a href="admin-barangays.php">
                                    <img src="vendors/icons/barangays.png">
                                    <p>Barangays</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Documents -->
                    <div class="row">
                        <ul class="menu-links">
                            <li>
                                <a href="admin-request-overview.php">
                                    <img src="vendors/icons/request.png">
                                    <p>Requests</p>
                                </a>
                            </li>
                            <li>
                                <a href="admin-mov-overview.php">
                                    <img src="vendors/icons/mov-overview.png">
                                    <p>MOVs Overview</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/icons/summary.png">
                                    <p>Consolidated Assessment</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <hr class="my-2">

                    <!-- External Links -->
                    <div class="row">
                        <ul class="menu-links">
                            <li>
                                <a href="#">
                                    <img src="vendors/icons/googlesheet.png">
                                    <p>SGLGB Google Sheet</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/icons/googledrive.png">
                                    <p>SGLGB Google Drive</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- User Icon -->
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="nav-icon dropdown-toggle mx-3 d-none d-sm-inline" href="#" role="button"
                data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item disabled pointer-events-none" style="color: #fff; background-color: #BC2649" href="#"><i class="dw dw-user1"></i><?php echo $namesql["personnel_name"]; ?></a>
                <a class="dropdown-item" href="#"><i class="dw dw-time-management"></i> Activity Log</a>
                <a class="dropdown-item" href="admin-logout.php"><i class="dw dw-logout"></i> Log Out</a>
            </div>
        </div>
    </div>

    <a id="nav-menu" class="mx-3 d-none" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-list"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </a>
</div>
</div>