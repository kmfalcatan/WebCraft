<?php
include ('../dbConfig/dbconnect.php');
include_once "../authentication/auth.php";
include_once "../functions/header.php";

$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;

$sql = "SELECT * FROM equipment WHERE equipment_ID = '$equipment_ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageFilename = $row['image'];
    $imageURL = "../uploads/" . $imageFilename;
    $user = $row['user'];
    $article = $row['article'];
    $deployment = $row['deployment'];
    $property_number = $row['property_number'];
    $account_code = $row['account_code'];
    $units = $row['units'];
    $unit_value = $row['unit_value'];
    $total_value = $row['total_value'];
    $remarks = $row['remarks'];
    $description = $row['description'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateStatus'])) {
    // Process the form submission

    // Assume 'status' and 'selectedEquipment' are arrays
    $statuses = $_POST['status'];
    $selectedEquipment = $_POST['selectedEquipment'];

    // Validate and update status in the 'units' table
    foreach ($selectedEquipment as $index => $unitID) {
        $status = $statuses[$index];

        // Add validation as needed

        // Update the status in the 'units' table
        $updateStatusQuery = "UPDATE units SET status = '$status' WHERE unit_ID = '$unitID'";
        $conn->query($updateStatusQuery);

        //if ($status === 'lost' || $status === 'return') {
            // Fetch equipment details
            //$recycleQuery = "INSERT INTO recycle_bin (equipment_ID, image, article, description, deployment, user, property_number, account_code, units, unit_value, total_value, remarks, year_received, warranty_image, warranty_start, warranty_end, budget, instruction)
                             //SELECT * FROM equipment WHERE equipment_ID = '$equipment_ID'";
            //$conn->query($recycleQuery);

            // Delete from the 'equipment' table
            //$deleteQuery = "DELETE FROM equipment WHERE equipment_ID = '$equipment_ID'";
          //  $conn->query($deleteQuery);
        //}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/addEquip.css">
    <link rel="stylesheet" href="../assets/css/warranty.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">

    <style>
        /* Simplified styling for testing */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: block;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px;
            z-index: 1;
        }

        .checkbox-label {
            display: block;
            margin-bottom: 8px;
        }

        .status-select {
            margin-left: 10px;
        }
    </style>
</head>
<body id="body">
    <div class="container2">
        <div class="headerContainer">
            <div class="subHeaderContainer">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <img class="image" src="../assets/img/medLogo.png" alt="">
                    </div>

                    <div class="nameContainer">
                        <img src="../assets/img/system-name.png" alt="">
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer" id="profileContainer">
                        <?php
                            if (!empty($userInfo['profile_img'])) {
                                echo '<img class="headerImg" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                            } else {
                                echo '<img class="headerImg" src="../assets/img/person-circle.png" alt="Mountain Placeholder">';
                            }
                        ?>
                        </div>

                        <div class="subProfileContainer">
                        <div class='menubarContainer' onclick='toggleMenu(this)'>
                            <div class='line'></div>
                            <div class='line'></div>
                            <div class='line'></div>
                        </div>
                        <p class="userName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="subContainer3" action="" enctype="multipart/form-data" method="post">
        <div class="container3">
            <div class="topContainer">
                <img class="top-img" src="../assets/img/th-removebg-preview.png" alt="" >
                <h2>VIEW EQUIPMENT</h2>
            </div>
            <div class="subContainer2">
                <div class="imageContainer1">
                    <div class="subImageContainer1">
                        <div class="uploadImageContainer">
                            <div class="subUploadImageContainer">
                                <img class="uploadImage" src="<?php echo $imageURL; ?>" alt="Mountain Placeholder">
                            </div>
                        </div>
                    </div>
    
                    <div class="infoContainer">
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="user" cols="30" rows="10" placeholder="User name:" readonly><?php echo $user; ?></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="article" cols="30" rows="10" placeholder="Article:" readonly><?php echo $article; ?></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="deployment" cols="30" rows="10" placeholder="Deployment:" readonly><?php echo $deployment; ?></textarea>
                        </div>
    
                        <div class="subInfoContainer">
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="property_number" cols="30" rows="10" placeholder="Property number:" readonly><?php echo $property_number; ?></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="account_code" cols="30" rows="10" placeholder="Account code:" readonly><?php echo $account_code; ?></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="units" cols="30" rows="10" placeholder="Units:" readonly><?php echo $units; ?></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <div class="dropdown inputInfo3">
                                    <button onclick="toggleDropdown()" class="dropdown-btn">Select options</button>
                                    <div id="dropdownContent" class="dropdown-content">
                                        <form method="POST" action="">
                                            <?php
                                                // Fetch units from the 'units' table inside the dropdown div
                                                $sqlUnits = "SELECT * FROM units WHERE equipment_ID = '$equipment_ID'";
                                                $resultUnits = $conn->query($sqlUnits);

                                                // Check if there are units available
                                                if ($resultUnits->num_rows > 0) {
                                                    $unitsArray = array();
                                                    while ($rowUnits = $resultUnits->fetch_assoc()) {
                                                        // Extract unit details
                                                        $unitID = $rowUnits['unit_ID'];
                                                        $unitName = $rowUnits['equipment_name'];

                                                        echo '<div class="checkbox-label">';
                                                        echo '<label>';
                                                        echo '<input type="checkbox" name="selectedEquipment[]" value="' . $unitID . '">';
                                                        echo '<span>ID: ' . $unitID . '</span> ' . $unitName; // Display ID and name
                                                        echo '<select class="status-select" name="status[]">';
                                                        echo '<option value="" disabled selected>Choose a status</option>';
                                                        echo '<option value="lost">Lost</option>';
                                                        echo '<option value="return">Return</option>';
                                                        echo '</select>';
                                                        echo '</label>';
                                                        echo '</div>';
                                                    }
                                                } else {
                                                    echo '<p>No units available.</p>';
                                                }
                                            ?>
                                            <button type="submit" name="updateStatus">Update Status</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="otherInfoContainer">
                    <div class="subOtherInfoContainer">
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="unit_value" cols="30" rows="10" placeholder="Unit value:" readonly><?php echo $unit_value; ?></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="total_value" cols="30" rows="10" placeholder="Total value:" readonly><?php echo $total_value; ?></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="remarks" cols="30" rows="10" placeholder="remarks:" readonly><?php echo $remarks; ?></textarea>
                        </div>
                    </div>
    
                    <div class="descriptionContainer">
                        <textarea class="inputInfo4" name="description" cols="30" rows="10" placeholder="Description:" readonly><?php echo $description; ?></textarea>
                    </div>
    
                    <!-- Temporary link -->
                    <div class="buttonsContainer">
                        <button class="button3" id="btn3" type="button"><a href="equipOtherInfo.php?equipment_ID=<?php echo $equipment_ID; ?>&id=<?php echo $userID; ?>">Back</a></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container4" id="warrantyContainer" style="display: none;">
        <div class="subContainer"  >
            <div class="warrantyContainer">
                <p>Warranty Will Expire On: <span><?php echo isset($warranty_end) ? date('M d, Y', strtotime($warranty_end)) : ''; ?></span></p>
            </div>
            <div class="buttonContainer">
                <button id="btn1" type="button" class="button" onclick="closeWarranty()">Close</button>
            </div>
        </div>
    </div>

    <!-- sidebar show -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-profile">
            <div class="subProfileContainer">
                <?php
                    if (!empty($userInfo['profile_img'])) {
                        echo '<img class="headerImg" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                    } else {
                        echo '<img class="headerImg" src="../assets/img/person-circle.png" alt="Mountain Placeholder">';
                    }
                ?>
            </div>
            <div class="user-info">
                <p class="userName"><?php echo $userInfo['fullname'] ?? ''; ?></p>
                <p class="email"><?php echo $userInfo['email'] ?? ''; ?></p>
            </div>
            <button class="close-btn" onclick="toggleSidebar()" style="left: 70%;">x</button>
        </div>

        <a href="../user panel/userProfile.php?id=<?php echo $userID; ?>">
            <div class="profile-menu">
                <div class="profile-icon">
                    <img src="../assets/img/person-circle.png" alt=""> 
                </div> 
                <p>Your profile</p>
            </div>
        </a>

        <div class="logout-menu" onclick="showLogoutConfirmation()">
            <div class="logout-icon">
                <img src="../assets/img/logout.png" alt=""> 
            </div> 
            <p>Log out</p>
        </div>
    </div>

    <div id="logoutConfirmation" class="popupContainer">
        <div class="popupContent">
            <p>Are you sure you want to log out?</p>
            <div class="popupButtons">
                <button onclick="logout()">Yes</button>
                <button onclick="hideLogoutConfirmation()">No</button>
            </div>
        </div>
    </div>


    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>

<script>
    function toggleDropdown() {
        var dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
    }

    // Close the dropdown when clicking outside
    window.addEventListener('click', function(event) {
        var dropdownContent = document.getElementById("dropdownContent");
        var dropdownBtn = document.querySelector(".dropdown-btn");

        if (!event.target.matches('.dropdown-btn') && !event.target.closest('.dropdown-content')) {
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            }
        }
    });
</script>

</body>
</html>