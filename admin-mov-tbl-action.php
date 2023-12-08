<?php
require_once('connector.php');

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

echo '<script>';
echo 'alert(' . json_encode(json_encode($_POST)) . ');';  // Double encode to make sure it's treated as a string
echo 'alert(JSON.parse(' . json_encode($_POST) . '));';  // Parse the JSON string to a JavaScript object
echo '</script>';

// Mov Overview Dropdown Handler
$movOvwsearchConditions = [];

if (
    (isset($_POST['brgySelectMOVOvw']) && !empty($_POST['brgySelectMOVOvw'])) ||
    (isset($_POST['criteriaSelectMOVOvw']) && !empty($_POST['criteriaSelectMOVOvw'])) ||
    (isset($_POST['docStatusSelectMOVOvw']) && !empty($_POST['docStatusSelectMOVOvw']))
) {
    // Loop through each select value to build corresponding conditions
    foreach ($_POST as $key => $value) {
        if (!empty($value)) {
            switch ($key) {
                case 'brgySelectMOVOvw':
                    // Add condition for brgySelectMOVOvw
                    $escapedValue = mysqli_real_escape_string($db, $value);
                    $movOvwsearchConditions[] = "users.Name LIKE '%$escapedValue%'";
                    break;

                case 'criteriaSelectMOVOvw':
                    // Escape each value in the array
                    $escapedValues = array_map([$db, 'real_escape_string'], $value);
                    $criteriaValues = implode("','", $escapedValues);
                    $movOvwsearchConditions[] = "mov.govarea IN ('$criteriaValues')";
                    break;

                case 'docStatusSelectMOVOvw':
                    if ($value !== 'all') {
                        // Add condition for docStatusSelectMOVOvw
                        $escapedValue = mysqli_real_escape_string($db, $value);
                        $movOvwsearchConditions[] = "mov.status LIKE '%$escapedValue%'";
                    }
                    break;
            }
        }
    }

    $combinedConditions = implode(' AND ', $movOvwsearchConditions);

    if($_POST['docStatusSelectMOVOvw'] == 'all' && empty($combinedConditions)){
        $sql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, mov.status, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date 
                FROM mov 
                INNER JOIN users ON mov.user_id = users.user_id";
        $_SESSION['movOvwSelectQueries'] = $sql;

    }else if($_POST['docStatusSelectMOVOvw'] == 'all' && !empty($combinedConditions)){
        $sql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, mov.status, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date 
                FROM mov 
                INNER JOIN users ON mov.user_id = users.user_id
                WHERE $combinedConditions";
        $_SESSION['movOvwSelectQueries'] = $sql;

    } else if ($_POST['docStatusSelectMOVOvw'] == 'Verified') {
        $sql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, mov.status, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date 
                FROM mov 
                INNER JOIN users ON mov.user_id = users.user_id 
                WHERE $combinedConditions AND mov.status = 'Verified'";
        $_SESSION['movOvwSelectQueries'] = $sql;

    } else if ( !empty($combinedConditions)) {
        $sql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, mov.status, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date 
                FROM mov 
                INNER JOIN users ON mov.user_id=users.user_id 
                WHERE $combinedConditions AND mov.status <> 'Verified'";
        $_SESSION['movOvwSelectQueries'] = $sql;

    }
    

}else{
    unset($_SESSION['movOvwSelectQueries']);
}
// echo $_SESSION['movOvwSelectQueries'];

// Mov Verified Dropdown Handler
$movVerifiedsearchConditions = [];

if (
    (isset($_POST['brgySelectMOVVerified']) && !empty($_POST['brgySelectMOVVerified'])) ||
    (isset($_POST['criteriaSelectMOVVerified']) && !empty($_POST['criteriaSelectMOVVerified']))
) {
    // Loop through each select value to build corresponding conditions
    foreach ($_POST as $key => $value) {
        if (!empty($value)) {
            switch ($key) {
                case 'brgySelectMOVVerified':
                    $escapedValue = mysqli_real_escape_string($db, $value);
                    $movVerifiedsearchConditions[] = "users.Name LIKE '%$escapedValue%'";
                    break;

                case 'criteriaSelectMOVVerified':
                    // Check if $value is an array
                    if (is_array($value)) {
                        // Escape each value in the array
                        $escapedValues = array_map([$db, 'real_escape_string'], $value);
                        $criteriaValues = implode("','", $escapedValues);
                        $movVerifiedsearchConditions[] = "mov.govarea IN ('$criteriaValues')";
                    } else {
                        // Escape the single value
                        $escapedValue = mysqli_real_escape_string($db, $value);
                        $movVerifiedsearchConditions[] = "mov.govarea LIKE '%$escapedValue%'";
                    }
                    break;
            }
        }
    }

    $combinedConditions = implode(' AND ', $movVerifiedsearchConditions);

    if (!empty($combinedConditions)) {
        $sql = "SELECT mov.doc_id, users.Name, mov.doc_name, mov.govarea, DATE_FORMAT(mov.time_submitted, '%m/%d/%Y') AS f_date 
                FROM mov 
                INNER JOIN users ON mov.user_id=users.user_id 
                WHERE $combinedConditions AND mov.status = 'Verified'";
        // echo '<script>';
        // echo 'alert(' . json_encode(json_encode($sql)) . ');';  // Double encode to make sure it's treated as a string
        // echo 'alert(JSON.parse(' . json_encode($sql) . '));';  // Parse the JSON string to a JavaScript object
        // echo '</script>';

        $_SESSION['movVerifiedSelectQueries'] = $sql;
    }

}else{
    unset($_SESSION['movVerifiedSelectQueries']);
}



// Mov Delete Handler
class MovDeleter
{
    private $db;
    private $buttonName;
    private $checkboxArray;

    public function __construct($db, $buttonName, $checkboxArray)
    {
        $this->db = $db;
        $this->buttonName = $buttonName;
        $this->checkboxArray = $checkboxArray;
        // echo '<script>';
        // echo 'alert(' . json_encode(json_encode($db)) . ');';  // Double encode to make sure it's treated as a string
        // echo 'alert(JSON.parse(' . json_encode($db) . '));';  // Parse the JSON string to a JavaScript object
        // echo '</script>';

        // echo '<script>';
        // echo 'alert(' . json_encode(json_encode($buttonName)) . ');';  // Double encode to make sure it's treated as a string
        // echo 'alert(JSON.parse(' . json_encode($buttonName) . '));';  // Parse the JSON string to a JavaScript object
        // echo '</script>';

        // echo '<script>';
        // echo 'alert(' . json_encode(json_encode($checkboxArray)) . ');';  // Double encode to make sure it's treated as a string
        // echo 'alert(JSON.parse(' . json_encode($checkboxArray) . '));';  // Parse the JSON string to a JavaScript object
        // echo '</script>';
    }

    public function handleDelete()
    {
        if (isset($_POST[$this->buttonName])) {
            if (isset($this->checkboxArray) && is_array($this->checkboxArray)) {
                $selections = $this->checkboxArray;

                // Create placeholders for parameters
                $placeholders = implode(',', array_fill(0, count($selections), '?'));

                $delQuery = "DELETE FROM mov WHERE doc_id IN ($placeholders)";

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

    private function bindParametersDynamically($stmt, $types, ...$params)
    {
        $bindParams = [$stmt, $types];
        foreach ($params as &$param) {
            $bindParams[] = &$param;
        }
        call_user_func_array('mysqli_stmt_bind_param', $bindParams);
    }

    private function redirectToOverview()
    {
        echo '<script>';
        echo 'alert("Files have been deleted.");';
        echo 'window.location.href = "admin-mov-overview.php";';
        echo '</script>';
    }
}

// Example usage
if (isset($_POST['movOvw_delete'])) {
    $movOvwDeleter = new MovDeleter($db, 'movOvw_delete', $_POST['movsOvw']);
    $movOvwDeleter->handleDelete();
}
if (isset($_POST['movVerified_delete'])) {
    $movVerfiedDeleter = new MovDeleter($db, 'movVerified_delete', $_POST['movVerified']);
    $movVerfiedDeleter->handleDelete();
}

// View all
if (isset($_POST['view'])) {
    if (isset($_POST['movVerified']) && is_array($_POST['movVerified']) && !empty($_POST['movVerified'])) {
            // Initialize an empty array in the session if it doesn't exist
            if (!isset($_SESSION['view'])) {
                $_SESSION['view'] = array();
            }

            // Loop through each value in the "movVerified" array and store in the session
            foreach ($_POST['movVerified'] as $value) {
                $_SESSION['view'][] = $value;
            }
    }
    if (isset($_POST['movsOvw']) && is_array($_POST['movsOvw']) && !empty($_POST['movsOvw'])) {
        if (!isset($_SESSION['view'])) {
            $_SESSION['view'] = array();
        }

        // Loop through each value in the "movVerified" array and store in the session
        foreach ($_POST['movsOvw'] as $value) {
            $_SESSION['view'][] = $value;
        }
    }
    echo '<script>';
    echo 'window.location.href = "admin-mov-overview.php";';
    echo '</script>';
}


if (isset($_POST['download'])) {
    $directoryPath = "vendors/documents/MOVs/";

    if (isset($_POST['movsOvw']) && is_array($_POST['movsOvw']) && !empty($_POST['movsOvw'])) {

        $file_container_path = 'vendors/documents/tmp/';
        $currentDateTime = date('Y-m-d H:i:s');
        $f_currentDateTime = str_replace([':', ' '], ['-', '_'], $currentDateTime) . '.zip';
        $file_container =  realpath($file_container_path) . DIRECTORY_SEPARATOR . $f_currentDateTime;
        touch($file_container);

        if (!file_exists($file_container_path) || !is_dir($file_container_path)) {
            // Create the directory
            if (mkdir($file_container_path, 0777, true)) {
                echo 'Directory created: ' . $file_container_path;
            } else {
                echo 'Failed to create directory: ' . $file_container_path;
            }
        }

        // Touch the file within the directory
        // touch($file_container);
        $zip = new ZipArchive;
        $this_zip = $zip->open($file_container);
        if ($this_zip) {
            $download_folder = opendir($directoryPath);
            if ($download_folder) {
                // block to add file to a directory
                foreach ($_POST['movsOvw'] as $value) {
                    $stmt = $db->prepare("SELECT doc_name FROM mov WHERE doc_id = ?");
                    $stmt->bind_param("s", $value);
                    $stmt->execute();
                    $stmt->bind_result($file_name);
                    $stmt->fetch();
                    $stmt->close();

                    $full_path = $directoryPath . $file_name;
                    // $full_path = realpath($full_path);

                    // echo '<script>';
                    // echo 'alert(' . json_encode(json_encode($full_path)) . ');';  // Double encode to make sure it's treated as a string
                    // echo 'alert(JSON.parse(' . json_encode($full_path) . '));';  // Parse the JSON string to a JavaScript object
                    // echo '</script>';

                    if (file_exists($full_path) && is_readable($full_path)) {
                        // Add the file to the Zip archive
                        
                        $full_path = realpath($directoryPath) . DIRECTORY_SEPARATOR . $file_name;
                        $zip->addFile($full_path, $file_name);

                    } else {
                        // Handle the case where the file doesn't exist or is not readable
                        echo 'File not found or inaccessible: ' . $full_path;
                    }
                }
            }
            closedir($download_folder);
                    echo '<script>';
                    echo 'alert(' . json_encode(json_encode($file_container)) . ');';  // Double encode to make sure it's treated as a string
                    echo 'alert(JSON.parse(' . json_encode($file_container) . '));';  // Parse the JSON string to a JavaScript object
                    echo '</script>';
                    $zip->close();

                    ob_end_clean();

                    // Set headers
                    header('Content-Type: application/zip');
                    header('Content-Disposition: attachment; filename="' . $f_currentDateTime . '"');
                    header('Content-Length: ' . filesize($file_container));
                    
                    // Output the ZIP file
                    readfile($file_container);
                    
                    // Exit to prevent further output
                    exit;
                } else {
                    // Handle the case where the Zip archive couldn't be opened
                    echo 'Failed to open Zip archive';
                }
        
    }
    if (isset($_POST['movVerified']) && is_array($_POST['movVerified']) && !empty($_POST['movVerified'])) {

        $file_container_path = 'vendors/documents/tmp/';
        $currentDateTime = date('Y-m-d H:i:s');
        $f_currentDateTime = str_replace([':', ' '], ['-', '_'], $currentDateTime) . '.zip';
        $file_container =  realpath($file_container_path) . DIRECTORY_SEPARATOR . $f_currentDateTime;
        touch($file_container);

        if (!file_exists($file_container_path) || !is_dir($file_container_path)) {
            // Create the directory
            if (mkdir($file_container_path, 0777, true)) {
                echo 'Directory created: ' . $file_container_path;
            } else {
                echo 'Failed to create directory: ' . $file_container_path;
            }
        }

        // Touch the file within the directory
        // touch($file_container);
        $zip = new ZipArchive;
        $this_zip = $zip->open($file_container);
        if ($this_zip) {
            $download_folder = opendir($directoryPath);
            if ($download_folder) {
                // block to add file to a directory
                foreach ($_POST['movVerified'] as $value) {
                    $stmt = $db->prepare("SELECT doc_name FROM mov WHERE doc_id = ?");
                    $stmt->bind_param("s", $value);
                    $stmt->execute();
                    $stmt->bind_result($file_name);
                    $stmt->fetch();
                    $stmt->close();

                    $full_path = $directoryPath . $file_name;
                    // $full_path = realpath($full_path);

                    // echo '<script>';
                    // echo 'alert(' . json_encode(json_encode($full_path)) . ');';  // Double encode to make sure it's treated as a string
                    // echo 'alert(JSON.parse(' . json_encode($full_path) . '));';  // Parse the JSON string to a JavaScript object
                    // echo '</script>';

                    if (file_exists($full_path) && is_readable($full_path)) {
                        // Add the file to the Zip archive
                        
                        $full_path = realpath($directoryPath) . DIRECTORY_SEPARATOR . $file_name;
                        $zip->addFile($full_path, $file_name);

                    } else {
                        // Handle the case where the file doesn't exist or is not readable
                        echo 'File not found or inaccessible: ' . $full_path;
                    }
                }
            }
            closedir($download_folder);
                    echo '<script>';
                    echo 'alert(' . json_encode(json_encode($file_container)) . ');';  // Double encode to make sure it's treated as a string
                    echo 'alert(JSON.parse(' . json_encode($file_container) . '));';  // Parse the JSON string to a JavaScript object
                    echo '</script>';
                    $zip->close();

                    ob_end_clean();

                    // Set headers
                    header('Content-Type: application/zip');
                    header('Content-Disposition: attachment; filename="' . $f_currentDateTime . '"');
                    header('Content-Length: ' . filesize($file_container));
                    
                    // Output the ZIP file
                    readfile($file_container);
                    
                    // Exit to prevent further output
                    exit;
                } else {
                    // Handle the case where the Zip archive couldn't be opened
                    echo 'Failed to open Zip archive';
                }
        
    }
}

header("Location: admin-mov-overview.php");
