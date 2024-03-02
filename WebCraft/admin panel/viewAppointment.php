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
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
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
                        <p class="adminName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <form class="container2" method="POST" enctype="multipart/form-data" action="../functions/saveAppointment.php?request_ID=<?php echo $_GET['request_ID']; ?>">
            <div class="topContainer">
                <img class="top-img" src="../assets/img/calendar.png" alt="" >
                <h2>SEND APPOINTMENT</h2>
            </div>
        
            <div class="subContainer" id="subContainer">
                <div class="equipInfoContainer">
                    <div class="imageContainer1">
                        <!-- img di pa nasasave sa database table budget -->
                    <div class="subImageContainer1">
                        <img class="image3" src="../uploads/<?php echo $row['equip_img']; ?>" alt="Equipment Image">
                        <input type="hidden" name="equip_img">
                    </div>
                    </div>

                    <div class="infoContainer">
                        <div class="equipNameContainer">
                            <input name="equipment_name" value="<?php echo $equipment_name; ?>" readonly>
                        </div>

                        <div class="equipNameContainer">
                            <input name="date_of_appointment" value="<?php echo $date_of_appointment; ?>" readonly>
                        </div>

                        <div class="equipNameContainer">
                            <input name="details_of_equipment" value="<?php echo $details_of_equipment; ?>" readonly>
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
                            <input type="text" class="budget" name="budget" placeholder="Budget:">
                            <input type="text" class="budget" name="admin_name" placeholder="Admin Name:">
                            <input type="number" class="budget" name="admin_contact" placeholder="Admin Contact #:">
                        </div>
                    </div>
                </div>

                <div class="maintenanceContainer">
                    <div class="subMaintenanceContainer">
                        <p class="maintenance">Maintenance contact details:</p>
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="text" class="budget" name="maintenance_name" placeholder="Name:">
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="email" class="budget" name="maintenance_email" placeholder="Email:">
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="number" class="budget" name="contact_number" placeholder="Contact No.:">
                    </div>
                </div>

                <div class="buttonContainer">
                    <button class="button" type="submit" name="submit">Send email</button>
                    <a href="../admin panel/approveAppointment.php?request_ID=<?php echo $row['request_ID']; ?>&id=<?php echo $userID; ?>">
                        <button class="button" type="button">Back</button>
                    </a>
                </div>
            </div>
        </form>

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
            <button class="close-btn" onclick="toggleSidebar()">x</button>
        </div>

        <a href="../admin panel/userProfile.php?id=<?php echo $userID; ?>">
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
        
        <script src="../assets/js/sidebarShow.js"></script>
</body>
</html>