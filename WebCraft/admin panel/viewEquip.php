<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";

$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;
$userID = isset($_GET['id']) ? $_GET['id'] : null; 
$sql2 = "SELECT image FROM equipment WHERE equipment_ID = '$equipment_ID'";
$sql = "SELECT * FROM units WHERE equipment_ID = '$equipment_ID'";
$result_units = $conn->query($sql);
$result_equipment = $conn->query($sql2);

if ($result_equipment->num_rows > 0) {
    $row = $result_equipment->fetch_assoc();
    $imageFilename = $row['image'];
    $imageURL = "../uploads/" . $imageFilename;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/viewEquip.css">
    <link rel="stylesheet" href="../assets/css/index.css">
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
                        <p class="companyName">MedEquip Tracker</p>
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer">
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

                        <p class="adminName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container1">
        <div class="subContainer">
            <?php
                while ($row1 = $result_units->fetch_assoc()) {
                    $equipment_name = $row1['equipment_name'];
                    $unit_ID = $row1['unit_ID'];
                    $status = $row1['status'];
                    
                    $unitPrefix = 'UNIT';
                    $defaultUnitID = '0000';
                    $unitID = $unitPrefix . '-' . str_pad($unit_ID, strlen($defaultUnitID), '0', STR_PAD_LEFT);
                    
                    echo "<a href='equipOtherInfo.php?equipment_ID=$equipment_ID&id=$userID'>";
                        echo "<div class='subContainer1'>";
                            echo "<div class='equipmentContainer'>";
                                echo "<div class='imageContainer1'>";
                                    echo "<div class='subImageContainer1'>";
                                        echo "<img class='image3' src='$imageURL' alt=''>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='infoContainer'>";
                                    echo "<div class='statusContainer'>";
                                        echo "<div class='subStatusContainer'>";
                                            echo "<div class='status'>";
                                                echo "<p class='subStatus'>OLD</p>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer'>";
                                        echo "<p> $equipment_name</p>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer'>";
                                        echo "<p>ID: $unitID</p>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer'>";
                                        echo "Status: $status";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</a>";
                }
            ?>
        
        </div>
        <div class="buttonContainer">
            <a href="dashboard.php?id=<?php echo $userID; ?>">
                    <button class="button">Back</button>
            </a>
        </div>
    </div>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/viewEquipt.js"></script>
    <script src="../assets/js/theme/dashboard-theme.js"></script>
</body>
</html>
