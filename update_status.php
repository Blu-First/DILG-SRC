<?php
// update_status.php

require_once('connector.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mov_id = mysqli_real_escape_string($db, $_POST['doc_id']);
    $mov_status = mysqli_real_escape_string($db, $_POST['status_select']);

    $sql = "UPDATE mov SET status = '$mov_status' WHERE doc_id = '$mov_id'";
    mysqli_query($db, $sql);
}

header("Location: admin-mov-doc.php?view=" . $mov_id);
exit();
?>