<?php
require_once('connector.php');

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Assuming 'req_codes' is passed in the URL like 'delete_script.php?req_codes=code1,code2,code3'
$reqCodes = $_GET['req_codes'] ?? '';
$reqCodesArray = explode(',', $reqCodes);
$reqCodesArray = array_map('trim', $reqCodesArray);

if (!empty($reqCodesArray)) {
    // Delete rows based on req_codes
    $reqCodesString = implode("','", $reqCodesArray);
    $sql = "DELETE FROM dl_request WHERE req_code IN ('$reqCodesString')";
    mysqli_query($db, $sql);
    // You can add additional error handling if needed

    // Redirect back to the page
    header('Location: admin-request-overview.php');
    exit();
} else {
    // Handle case where req_codes is empty or not provided
    echo "Invalid or empty request codes";
}
?>