<?php
require_once('connector.php');

// if (isset($_SESSION['user_id'])) {
//     header("Location: index.php");
//     exit();
// }

echo '<script>';
echo 'localStorage.clear();';
echo '</script>';

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($db, $_POST['userName']);
    $password = mysqli_real_escape_string($db, $_POST['userPwd']);

    // Query to select user from 'users' table
    $sqluser = "SELECT user_id, username, password, role FROM users WHERE username='$username'";
    $userresult = mysqli_query($db, $sqluser);

    $sqlemp = "SELECT emp_id, username, password, role FROM dilg_emp WHERE username='$username'";
    $empresult = mysqli_query($db, $sqlemp);

    if ($userresult) {
        if (mysqli_num_rows($userresult) == 1) {
            $row = mysqli_fetch_assoc($userresult);
            $hashedPassword = $row['password'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header("Location: index.php");
        }
    }

    if ($empresult) {
        if (mysqli_num_rows($empresult) == 1) {
            $row = mysqli_fetch_assoc($empresult);
            $hashedPassword = $row['password'];

            if ($password === $hashedPassword) {
               

                    $_SESSION['emp_id'] = $row['emp_id'];
                    header("Location: admin-dashboard.php");
            }
        }
    }

    $_SESSION['message'] = "Username and password combination incorrect.";
    echo '<script>alert("Username and password combination incorrect.");</script>';
}

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width">
    <title>SGLGB Portal</title>


    <!-- Site favicon -->
    <link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
        <!-- <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" /> -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
        <link rel="stylesheet" href="vendors/styles/user-login.css" />


</head>

<body class="d-flex flex-column align-items-center min-vh-100">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <section class="landing text-center mt-3">
            <div>
                <div class="py-2">
                    <img src="vendors/images/logo-dilg.png" alt="DILG Logo Small" width="50" height="50">
                </div>
                <div>
                    <h2 class="mb-0">SEAL OF GOOD LOCAL GOVERNANCE FOR BARANGAY</h2>
                </div>
                <div class="py-0">
                    <h1 class="mb-3">MANAGEMENT SYSTEM - SRC</h1>
                </div>
            </div>
            <div class="mb-5">
                <div class="card-box px-5 pt-4 pb-4">
                    <!-- <div class="card-body "> -->
                        <form method="POST">
                            <!-- INPUT ID -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <label class="pb-1" for="user-id">User ID</label>
                                        <div class="input-container">
                                            <input class="form-control form-control-sm" id="userName" name="userName"
                                                type="text" placeholder="User" required>
                                            <i class="icon-left"><span class='icon-user'>
                                            </i>
                                        </div>
                                        <span id="userName-alert" class="form-text wrap-word-300 my-1">&nbsp;</span>
                                    </div>
                                </div>
                            </div>
                            <!-- INPUT PASSWORD -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <label class="pb-1" for="user-pwd">Password</label>
                                        <div class="input-container">
                                            <input class="form-control form-control-sm" id="userPwd" name="userPwd"
                                                type="password" placeholder="••••••••" required>
                                            <i class="icon-left"><span class='icon-lock'></span>
                                            </i>
                                        </div>
                                        <span id="userPwd-alert" class="form-text wrap-word-300 my-1">&nbsp;</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row"> -->
                                <!-- <div class="col-12"> -->
                                    <div class="w-100 pb-2">
                                        <!-- <div class="forgot-password pb-1">
                                            <a href="#" hreflang="en" type="text/html">Forgot Password?</a>
                                        </div> -->
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
                            <!-- <div class="row"> -->
                                <!-- <div class="col-12"> -->
                                    <div class="w-100 form-group mb-0 mb-3">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm btn-block w-100" value="login" name="login_btn">Submit</button>
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
                        </form>
                    <!-- </div> -->
                </div>
            </div>
        </section>
    </div>
    <div class="footer-wrap pd-0 px-5 py-2">
        © Copyright <span class="font-weight-bold">Department of Interior and Local Government Santa Rosa City.</span>
        All Rights Reserved.
    </div>

    <script src="vendors/scripts/core.js"></script>
    <!-- <script src="vendors/scripts/script.js"></script> -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
    	var jq360 = $.noConflict();
		</script>
    <script src="vendors/scripts/login.js"></script>
    <script>
        const  userPwdAlert_DOM = document.getElementById('userPwd-alert');
        var errorMessage = <?php echo isset($_SESSION['message']) ? json_encode($_SESSION['message']) : 'null'; ?>;
        if (errorMessage) {
            userPwdAlert_DOM.innerHTML = errorMessage;
            userPwdAlert_DOM.classList.add('has-danger', 'wrap-word-250');
            <?php unset($_SESSION['message']); ?>
        }
    </script>
</body>

</html>