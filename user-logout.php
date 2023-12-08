<?php
session_start();
$old_session_id = session_id();
unset($_SESSION['user_id']);
session_regenerate_id(true);
$_SESSION['message'] = "You are now logged out";
header("location: login.php");
?>