<?php
require_once('connector.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');
    
    class DatabaseUpdater {
        private $db;
    
        public function __construct($db) {
            $this->db = $db;
        }
    
        public function updateStatus($docId, $statusValue) {
            $sql = "UPDATE mov SET status = ? WHERE doc_id = ?";
            return $this->executeUpdate($sql, $statusValue, $docId);
        }
    
        public function updateRemarks($docId, $remarksValue) {
            $sql = "UPDATE mov SET remarks = ? WHERE doc_id = ?";
            return $this->executeUpdate($sql, $remarksValue, $docId);
        }
    
        private function executeUpdate($sql, ...$params) {
            $stmt = mysqli_prepare($this->db, $sql);
    
            if ($stmt === false) {
                // Handle error
                return false;
            }
    
            mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
            mysqli_stmt_execute($stmt);
    
            $success = mysqli_stmt_affected_rows($stmt) > 0;
    
            mysqli_stmt_close($stmt);
    
            return $success;
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $doc_id = $_POST['doc_id'];
    
        $dbUpdater = new DatabaseUpdater($db);
    
        if (isset($_POST['statusSelect'])) {
            $statusValue = $_POST['statusSelect'];
            $dbUpdater->updateStatus($doc_id, $statusValue);
        }
    
        if (isset($_POST['remarks'])) {
            $remarksValue = $_POST['remarks'];
            $dbUpdater->updateRemarks($doc_id, $remarksValue);
        }

        // Send a response back to the client (this is a simple example, adjust as needed)
        $response = array('success' => true, 'message' => 'Data received successfully');
        echo json_encode($response);
    }
    
 else {
    $response = array('success' => false, 'message' => 'Invalid request method');
    echo json_encode($response);
}

?>