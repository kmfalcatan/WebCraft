<?php
include_once '../dbConfig/dbconnect.php';
include_once '../functions/header.php';

if(isset($_GET['equipment_ID'])) {
    $equipment_ID = $_GET['equipment_ID'];

    $sql = "SELECT warranty_end FROM equipment WHERE equipment_ID = $equipment_ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $warranty_end = $row['warranty_end'];
    } else {
        $warranty_end = "No warranty expiration information available.";
    }
} else {
    $warranty_end = "Equipment ID not provided.";
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
    <link rel="stylesheet" href="../assets/css/warranty.css">
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

    <div class="container4">
        <div class="subContainer">
            <div class="warrantyContainer">
                <p>Warranty expired on: <span><?php echo isset($warranty_end) ? date('M d, Y', strtotime($warranty_end)) : ''; ?></span></p>
            </div>

            <div class="buttonContainer">
                <button id="btn1" type="button" class="button" onclick="goBack()">Back</button>
            </div>
        </div>
    </div>

    <script src="../assets/js/theme/dashboard-theme.js"></script>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</body>
</html>
