<?php
session_start();
$old_session_id = session_id();
unset($_SESSION);
unset($POST);
    echo '<script>';
    echo 'localStorage.clear();';
    echo '</script>';
session_regenerate_id(true);
$_SESSION['message'] = "You are now logged out";
header("location: login.php");
?>