<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";
include_once "../functions/approveRequest.php";
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

        <form class="container2" method="POST" enctype="multipart/form-data" >
            <div class="subContainer">
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
                            <input name="date_of_appointment" value="Appointment Date: <?php echo $date_of_appointment; ?>" readonly>
                        </div>

                        <div class="equipNameContainer">
                            <input name="details_of_equipment" value="Reason: <?php echo $details_of_equipment; ?>" readonly>
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
                            <input type="text" class="budget" name="budget" placeholder="Budget:" value="<?php echo $budget; ?>" readonly>
                            <input type="text" class="budget" name="admin_name" placeholder="Admin name:" value="<?php echo $admin_name; ?>" readonly>
                            <input type="email" class="budget" name="admin_email" placeholder="Admin email:"  value="<?php echo $admin_email; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="maintenanceContainer">
                    <div class="subMaintenanceContainer">
                        <p class="maintenance">Maintenance contact details:</p>
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="text" class="budget" name="maintenance_name" placeholder="Name:" value="<?php echo $maintenance_name; ?>" readonly>
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="email" class="budget" name="maintenance_email" placeholder="Email:" value="<?php echo $maintenance_email; ?>" readonly>
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="number" class="budget" name="contact_number" placeholder="Contact No.:" value="<?php echo $contact_number; ?>" readonly>
                    </div>
                </div>

                <div class="buttonContainer">
                    <a href="viewAppointment.php?request_ID=<?php echo $_GET['request_ID']; ?>&id=<?php echo $userID; ?>">
                        <button class="button" type="button">Edit Form</button>
                    </a>
                    <!-- <button class="button1">
                        <img class="image7" src="../assets/img/th (3).jpg" alt="">
                    </button> -->
                    
                    <button class="button" type="submit" name="approve" id="approveButton" disabled>Approve</button>
                    <a href="../admin panel/appointment.php?id=<?php echo $userID; ?>">
                        <button class="button" type="button">Back</button>
                    </a>
                </div>
            </div>
        </form>
        
        <script src="../assets/js/theme/dashboard-theme.js"></script>
        <script src="../assets/js/approveReq.js"></script>

</body>
</html>