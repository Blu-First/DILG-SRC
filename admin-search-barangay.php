<?php
// connector.php file includes your database connection logic
require_once('connector.php');

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $search = mysqli_real_escape_string($db, $search);

    if (!empty($search)) {
        // If the search input is not empty, perform the search
        $sql = "SELECT user_id, name, logo FROM users WHERE name LIKE '%$search%'";
        $result = $db->query($sql);

        // Display search results
        if ($result->num_rows > 0) {
            echo '<ul class="row">';
            while ($row = $result->fetch_assoc()) {
                echo '<li class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <a href="admin-barangay-profile.php?barangay=' . $row['user_id'] . '">
                            <div class="card-box height-100-p p-3">
                                <div class="d-flex flex-wrap text-center py-3">
                                    <div class="col-md-12">
                                        <img src="vendors/images/barangay-logos/' . $row['logo'] . '" alt="" width="86px" height="74px">
                                    </div>
                                    <div class="col-md-12 py-2">
                                        <div class="h5 weight-600 pt-3">' . $row['name'] . '</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No results found.</p>';
        }

        $result->free_result();
    } else {
        // If the search input is empty, display the original content
        include('admin-orig-barangay.php');
    }
}
?>
