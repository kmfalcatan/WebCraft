<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";
include_once "../functions/header.php";

$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;

$sql = "SELECT * FROM equipment WHERE equipment_ID = '$equipment_ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageFilename = $row['image'];
    $imageURL = "../uploads/" . $imageFilename;
    $article = $row['article'];
    $yearReceived = $row['year_received'];
    $remarks = $row['remarks'];
} else {
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
            <a href="equipOtherInfo.php?equipment_ID=<?php echo $equipment_ID; ?>&id=<?php echo $userID; ?>">
                <div class="subContainer1">
                    <div class="equipmentCoontainer">
                        <div class="imageContainer1">
                            <div class="subImageContainer1">
                                <img class="image3" src="<?php echo $imageURL; ?>" alt="">
                            </div>
                        </div>
        
                        <div class="infoContainer">
                            <div class="statusContainer">
                                <div class="subStatusContainer">
                                    <div class="status">
                                        <p class="subStatus">OLD</p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="subInfoContainer">
                                <p>Apparatus name: <?php echo $article; ?></p>
                            </div>
        
                            <div class="subInfoContainer">
                                <p>ID: <?php echo $yearReceived; ?></p>
                            </div>
        
                            <div class="subInfoContainer">
                                Status: <?php echo $remarks; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="buttonContainer">
            <a href="dashboard.php?id=<?php echo $userID; ?>">
                <button class="button" >
                    Back
                </button>
            </a>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/viewEquipt.js"></script>
    <script src="../assets/js/theme/dashboard-theme.js"></script>
</body>
</html>