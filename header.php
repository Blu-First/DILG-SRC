<?php

$namecode = mysqli_query($db, "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'");
$namesql = mysqli_fetch_assoc($namecode);

?>

<div class="dilg-header px-5">

    <div class="dilg-header-left col-2 col-sm-3" onclick="location.href='index.php';" style=" cursor:pointer">
        <img class="logo" src="vendors/images/logo-dilg.png" alt="DILG Logo Small">
        <span class="logo-title pl-1" class="">SGLGB <span class="title-portal"> Portal</span></span>
    </div>

    <div class="dilg-header-right">

        <div class="sub-btn-container pr-30">
            <a id="user-sub-btn" class=" submission-btn" href="submission.php" hreflang="en" type="text/php">Submissions</a>
        </div>

        <!-- Notifications Button -->

        <div class="user-notification">
            <div class="dropdown">
                <a class="nav-icon mx-3 d-none d-sm-inline dropdown-toggle no-arrow" href="#" role="button"
                    data-toggle="dropdown">
                    <li class="ion ion-android-notifications color-white"></li>
                </a>

                <div class="dropdown-menu dropdown-menu-right">

                    <!-- WITH NO NOTIFICATIONS -->
                    <div class="no-notifs-list mx-h-350">

                        <div class="notifs-title">
                            <h2> Notifications</h2>
                        </div>

                        <div class="no-notifs-notice">
                            <img class="no-notifs-img" src="vendors/images/icon-no-notifs-lg.png" >
                            <p class="font-12 weight-100 color-blackfade">Notifications are currently empty.</p>
                        </div>
                    </div> 

                    <!-- WITH NOTIFICATIONS -->
                    <!-- <div class="notification-list mx-h-350 customscroll">

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
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Inbox Button -->
        <a class="nav-icon mx-3 d-none d-sm-inline" href="inbox.php" style="display: inline-block; line-height: 30px;">
            <li class="ion ion-chatbubbles color-white" style="display: inline-block; vertical-align: middle; font-size: 20px;"></li>
        </a>

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
                <div
                        class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                    >
                        <a class="dropdown-item" href="barangay-profile.php"
                            ><i class="dw dw-user1"></i> <?php echo $namesql["name"]; ?></a
                        >
                        <a class="dropdown-item" href="activity-log.php"
                        ><i class="dw dw-time-management"></i> Activity Log</a>

                        <a class="dropdown-item" href="user-logout.php"
                            ><i class="dw dw-logout"></i> Log Out</a
                        >
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