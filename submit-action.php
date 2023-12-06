<?php
require_once('connector.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');
echo "File count: " . count($_FILES['file']['name']);

$financial_ad = 'Financial Administration and Sustainability';
$disaster_prep = 'Disaster Preparedness';
$safetypeaceorder = 'Safety, Peace and Order';
$socialprotection = 'Social Protection and Sensitivity';
$business = 'Business-Friendliness and Competitiveness';
$environmental = 'Environmental Management';
$user = $_SESSION["user_id"];
$status = 'pending';

// ------- CORE GOVERNANCE AREAS --------//

// Financial Administration //
if (isset($_POST['dropzoneID']) && $_POST['dropzoneID'] == 'finangov') {
    if (!empty($_FILES['file']['name'])) {
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowExtn = array('pdf');
    
            if (in_array($extension, $allowExtn) && $_POST['dropzoneID'] === 'finangov') {
                // Generate a unique name to avoid overwriting existing files
                $newName = $fileName;
                $uploadFilePath = "vendors/documents/MOVs/" . $newName;

                // Check if the file already exists, if yes, add a unique identifier
                $counter = 1;
                while (file_exists($uploadFilePath)) {
                    $newName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $counter . '.' . $extension;
                    $uploadFilePath = "vendors/documents/MOVs/" . $newName;
                    $counter++;
                }

                move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFilePath);
    
                // Insert file information in the database for each file
                $query = "INSERT INTO mov (doc_name, user_id, govarea, status, remarks, time_submitted)
                          VALUES ('$newName', '$user', '$financial_ad', '$status', NULL, NOW())";
    
                if ($db->query($query)) {
                    echo "File $newName inserted successfully.";
                } else {
                    echo "Error inserting file $newName: " . $db->error;
                }
            }
        }
    }
}


// Disaster Preparedness //
if (isset($_POST['dropzoneID']) && $_POST['dropzoneID'] == 'disastgov') {
    if (!empty($_FILES['file']['name'])) {

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowExtn = array('pdf');
    
            if (in_array($extension, $allowExtn) && $_POST['dropzoneID'] === 'disastgov') {
                // Use the original file name as is
                $newName = $fileName;
                $uploadFilePath = "vendors/documents/MOVs/" . $newName;

                $counter = 1;
                while (file_exists($uploadFilePath)) {
                    $newName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $counter . '.' . $extension;
                    $uploadFilePath = "vendors/documents/MOVs/" . $newName;
                    $counter++;
                }

                move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFilePath);
    
                // Insert file information in the database for each file
                $query = "INSERT INTO mov (doc_name, user_id, govarea, status, remarks, time_submitted)
                          VALUES ('$newName', '$user', '$disaster_prep', '$status', NULL, NOW())";
    
                if ($db->query($query)) {
                    echo "File $newName inserted successfully.";
                } else {
                    echo "Error inserting file $newName: " . $db->error;
                }
            }
        }
    }
}


// Safety, Peace and Order //
if (isset($_POST['dropzoneID']) && $_POST['dropzoneID'] == 'spogov') {
    if (!empty($_FILES['file']['name'])) {

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowExtn = array('pdf');
    
            if (in_array($extension, $allowExtn) && $_POST['dropzoneID'] === 'spogov') {
                // Use the original file name as is
                $newName = $fileName;
                $uploadFilePath = "vendors/documents/MOVs/" . $newName;

                $counter = 1;
                while (file_exists($uploadFilePath)) {
                    $newName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $counter . '.' . $extension;
                    $uploadFilePath = "vendors/documents/MOVs/" . $newName;
                    $counter++;
                }

                move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFilePath);
    
                // Insert file information in the database for each file
                $query = "INSERT INTO mov (doc_name, user_id, govarea, status, remarks, time_submitted)
                          VALUES ('$newName', '$user', '$safetypeaceorder', '$status', NULL, NOW())";
    
                if ($db->query($query)) {
                    echo "File $newName inserted successfully.";
                } else {
                    echo "Error inserting file $newName: " . $db->error;
                }
            }
        }
    }
}



// Social Protection & Sensitivity
if (isset($_POST['dropzoneID']) && $_POST['dropzoneID'] == 'spsgov') {
    if (!empty($_FILES['file']['name'])) {

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowExtn = array('pdf');
    
            if (in_array($extension, $allowExtn) && $_POST['dropzoneID'] === 'spsgov') {
                // Use the original file name as is
                $newName = $fileName;
                $uploadFilePath = "vendors/documents/MOVs/" . $newName;

                $counter = 1;
                while (file_exists($uploadFilePath)) {
                    $newName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $counter . '.' . $extension;
                    $uploadFilePath = "vendors/documents/MOVs/" . $newName;
                    $counter++;
                }

                move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFilePath);
    
                // Insert file information in the database for each file
                $query = "INSERT INTO mov (doc_name, user_id, govarea, status, remarks, time_submitted)
                          VALUES ('$newName', '$user', '$socialprotection', '$status', NULL, NOW())";
    
                if ($db->query($query)) {
                    echo "File $newName inserted successfully.";
                } else {
                    echo "Error inserting file $newName: " . $db->error;
                }
            }
        }
    }
}


// Business Friendliness and Sensitivty //
if (isset($_POST['dropzoneID']) && $_POST['dropzoneID'] == 'bfcgov') {
    if (!empty($_FILES['file']['name'])) {

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowExtn = array('pdf');
    
            if (in_array($extension, $allowExtn) && $_POST['dropzoneID'] === 'bfcgov') {
                // Use the original file name as is
                $newName = $fileName;
                $uploadFilePath = "vendors/documents/MOVs/" . $newName;

                $counter = 1;
                while (file_exists($uploadFilePath)) {
                    $newName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $counter . '.' . $extension;
                    $uploadFilePath = "vendors/documents/MOVs/" . $newName;
                    $counter++;
                }

                move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFilePath);
    
                // Insert file information in the database for each file
                $query = "INSERT INTO mov (doc_name, user_id, govarea, status, remarks, time_submitted)
                          VALUES ('$newName', '$user', '$business', '$status', NULL, NOW())";
    
                if ($db->query($query)) {
                    echo "File $newName inserted successfully.";
                } else {
                    echo "Error inserting file $newName: " . $db->error;
                }
            }
        }
    }
}


// Environmental Management //
if (isset($_POST['dropzoneID']) && $_POST['dropzoneID'] == 'envgov') {
    if (!empty($_FILES['file']['name'])) {

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowExtn = array('pdf');
    
            if (in_array($extension, $allowExtn) && $_POST['dropzoneID'] === 'envgov') {
                // Use the original file name as is
                $newName = $fileName;
                $uploadFilePath = "vendors/documents/MOVs/" . $newName;

                $counter = 1;
                while (file_exists($uploadFilePath)) {
                    $newName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $counter . '.' . $extension;
                    $uploadFilePath = "vendors/documents/MOVs/" . $newName;
                    $counter++;
                }
                
                move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFilePath);
    
                // Insert file information in the database for each file
                $query = "INSERT INTO mov (doc_name, user_id, govarea, status, remarks, time_submitted)
                          VALUES ('$newName', '$user', '$environmental', '$status', NULL, NOW())";
    
                if ($db->query($query)) {
                    echo "File $newName inserted successfully.";
                } else {
                    echo "Error inserting file $newName: " . $db->error;
                }
            }
        }
    }
}

?>
