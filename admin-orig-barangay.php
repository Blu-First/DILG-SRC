<ul class="row">
    <?php

$sql = "SELECT user_id, name, logo FROM users";
$result = $db->query($sql);
    $counter = 0;

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($counter % 4 == 0) {
            echo '</ul><ul class="row pb-10">';
        }
        ?>
        <li class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="admin-barangay-profile.php?barangay=<?php echo $row['user_id']; ?>">
                <div class="card-box height-100-p p-3">
                    <div class="d-flex flex-wrap text-center py-3">
                        <div class="col-md-12">
                            <img src="vendors/images/barangay-logos/<?php echo $row['logo']; ?>" alt="" width="86px" height="74px">
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="h5 weight-600 pt-3">
                                <?php echo $row['name']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <?php
        $counter++;
    }
    ?>
</ul>
