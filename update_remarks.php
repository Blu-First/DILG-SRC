<?php
// update_status.php

require_once('connector.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mov_id = mysqli_real_escape_string($db, $_POST['doc_id']);
    $mov_remark = mysqli_real_escape_string($db, $_POST['remarks']);

    $sql = "UPDATE mov SET remarks = '$mov_remark' WHERE doc_id = '$mov_id'";
    mysqli_query($db, $sql);
}

header("Location: admin-mov-doc.php?view=" . $mov_id);
exit();
?>