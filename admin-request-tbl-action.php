<?php
require_once('connector.php');

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// echo '<script>';
// echo 'alert(' . json_encode(json_encode($_POST)) . ');';  // Double encode to make sure it's treated as a string
// echo 'alert(JSON.parse(' . json_encode($_POST) . '));';  // Parse the JSON string to a JavaScript object
// echo '</script>';

if (
    (isset($_POST['brgySelectreqOvw']) && !empty($_POST['brgySelectreqOvw'])  && $_POST['brgySelectreqOvw'] !== 'all') 
) {
    $search = mysqli_real_escape_string($db, $_POST['brgySelectreqOvw']);
    $sql = "SELECT * FROM dl_request WHERE barangay LIKE '%$search%' AND status = 'Pending'";
    $_SESSION['reqOvwSelectQueries'] = $sql;
    
    header("Location: admin-request-overview.php");
    exit();
}

if (
    (isset($_POST['brgySelectreqVerified']) && !empty($_POST['brgySelectreqVerified'])  && $_POST['brgySelectreqOvw'] !== 'all') 
) {
    $search = mysqli_real_escape_string($db, $_POST['brgySelectreqVerified']);
    $sql = "SELECT * FROM dl_request WHERE barangay LIKE '%$search%' AND status = 'Approved'";
    $_SESSION['reqVerifiedSelectQueries'] = $sql;
    
    header("Location: admin-request-overview.php");
    exit();
}


class MovDeleter {
    private $db;
    private $buttonName;
    private $checkboxArray;

    public function __construct($db, $buttonName, $checkboxArray) {
        $this->db = $db;
        $this->buttonName = $buttonName;
        $this->checkboxArray = $checkboxArray;
    }

    public function handleDelete() {
        if (isset($_POST[$this->buttonName])) {
            if (isset($this->checkboxArray) && is_array($this->checkboxArray)) {
                $selections = $this->checkboxArray;

                // Create placeholders for parameters
                $placeholders = implode(',', array_fill(0, count($selections), '?'));

                $delQuery = "DELETE FROM dl_request WHERE req_code IN ($placeholders)";

                $stmt = mysqli_prepare($this->db, $delQuery);

                if ($stmt) {
                    // Bind parameters using a dynamic call_user_func_array
                    $types = str_repeat('i', count($selections));

                    // Dynamically bind parameters
                    $stmtParams = array_merge([$stmt, $types], $selections);
                    $this->bindParametersDynamically(...$stmtParams);

                    mysqli_stmt_execute($stmt);

                    if (mysqli_stmt_error($stmt)) {
                        echo "Error executing DELETE query: " . mysqli_stmt_error($stmt);
                    } else {
                        $this->redirectToOverview();
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error preparing DELETE query: " . mysqli_error($this->db);
                }
            } else {
                echo "Invalid or missing input data";
            }
        }
    }

    private function bindParametersDynamically($stmt, $types, ...$params) {
        $bindParams = [$stmt, $types];
        foreach ($params as &$param) {
            $bindParams[] = &$param;
        }
        call_user_func_array('mysqli_stmt_bind_param', $bindParams);
    }

    private function redirectToOverview() {
        echo '<script>';
        echo 'alert("Files have been deleted.");';
        echo 'window.location.href = "admin-request-overview.php";';
        echo '</script>';
    }
}

// Example usage
if(isset($_POST['reqOverviewDelete'])){
    $movOvwDeleter = new MovDeleter($db, 'reqOverviewDelete', $_POST['reqOvw']);
    $movOvwDeleter->handleDelete();
}

if(isset($_POST['reqVerifiedDelete'])){
    $movOvwDeleter = new MovDeleter($db, 'reqVerifiedDelete', $_POST['reqVerified']);
    $movOvwDeleter->handleDelete();
}

if(isset($_POST['view']) ){
    if (isset($_POST['reqOvw']) && is_array($_POST['reqOvw']) && !empty($_POST['reqOvw'])) {
        // Loop through each value in the "reqOvw" array
        foreach ($_POST['reqOvw'] as $value) {         
            echo "<script>window.open('admin-view-request.php?req_code=$value', '_blank');</script>";
        }

    }
    if (isset($_POST['reqVerified']) && is_array($_POST['reqVerified']) && !empty($_POST['reqVerified'])) {
        // Loop through each value in the "reqOvw" array
        foreach ($_POST['reqVerified'] as $value) {         
            echo "<script>window.open('admin-view-request.php?req_code=$value', '_blank');</script>";
        }

    }
        echo '<script>';
        echo 'window.location.href = "admin-request-overview.php";';
        echo '</script>';

}



?>