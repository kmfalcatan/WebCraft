<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

if (!isset($_GET['request_ID']) || !($row = $conn->query("SELECT * FROM appointment WHERE request_ID = {$_GET['request_ID']}")->fetch_assoc())) {
    echo "Request ID is not provided or no appointment found with the provided ID.";
    exit();
}

$equipment_name = $row['article'];
$date_of_appointment = $row['date_request'];
$details_of_equipment = $row['description'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/viewAppointment.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body id="body">
    <div class="container1">
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

        <div class="container2">
            <div class="subContainer">
                <div class="equipInfoContainer">
                    <div class="imageContainer1">
                        <div class="subImageContainer1">
                            <img class="image3" src="../uploads/<?php echo $row['equip_img']; ?>" alt="Equipment Image">
                        </div>
                    </div>

                    <div class="infoContainer">
                        <div class="equipNameContainer">
                            <p><?php echo $equipment_name; ?></p>
                        </div>

                        <div class="equipNameContainer">
                            <p>Appointment Date: <?php echo $date_of_appointment; ?></p>
                        </div>

                        <div class="equipNameContainer">
                            <p>Reason for request: <?php echo $details_of_equipment; ?>
                        </div>
                    </div>
                </div>

                <div class="damageContainer">
                    <div class="imageContainer1">
                        <div class="textContainer">
                            <p>Damage:</p>
                        </div>
                        <div class="subImageContainer1">
                            <img class="image3" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">

                            <div class="nextRightContainer">
                                <img class="image3" src="../assets/img/chevron-left (1).png" alt="">
                            </div>

                            <div class="nextLeftContainer">
                                <img class="image3" src="../assets/img/chevron-right.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="budgetContainer">
                        <div class="textContainer">
                            <p>propose budget:</p>
                        </div>

                        <div class="subBudgetContainer">
                            <input type="text" class="budget" placeholder="Budget:">
                            <input type="text" class="budget" placeholder="Admin email:">
                        </div>
                    </div>
                </div>

                <div class="maintenanceContainer">
                    <div class="subMaintenanceContainer">
                        <p class="maintenance">Maintenance contact details:</p>
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="text" class="budget" placeholder="Name:">
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="text" class="budget" placeholder="Email:">
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="text" class="budget" placeholder="Contact No.:">
                    </div>
                </div>

                <div class="buttonContainer">
                    <button class="button1">
                        <img class="image7" src="../assets/img/th (3).jpg" alt="">
                    </button>
                    <button class="button">Send email</button>
                    <button class="button">Approve</button>
                    <button class="button" type="button" onclick="goBack()">Back</button>
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