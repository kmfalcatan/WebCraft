<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";
include_once "../functions/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/viewBudget.css">
    <link rel="stylesheet" href="../assets/css/viewAppointment.css">
</head>
<body id="body">
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
                        <img class="image3" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">
                    </div>
                </div>

                <div class="infoContainer">
                    <div class="equipNameContainer">
                        <p>Budget Approved | January 20, 2024</p>
                    </div>

                    <div class="equipNameContainer">
                        <p>For maintenance:</p>
                    </div>

                    <div class="equipNameContainer">
                        <p>Details of equipment:</p>
                    </div>
                </div>
            </div>

            <div class="damageContainer">
                <div class="budgetContainer">
                    <div class="textContainer">
                        <p>Budget release:</p>
                    </div>

                    <div class="subBudgetContainer">
                        <div class="budget1">
                            <p>20,000</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="maintenanceContainer">
                <div class="subMaintenanceContainer">
                    <p><span>Approved by:</span> km</p>
                </div>

                <div class="subMaintenanceContainer">
                    <p><span>Requested by:</span> km</p>
                </div>
            </div>

            <div class="buttonContainer">
                <button class="button1">
                    <img class="image7" src="../assets/img/th (3).jpg" alt="">
                </button>
                <button class="button">Send email</button>
                <a href="../admin panel/budget.php?id=<?php echo $userID; ?>">
                    <button class="button">Back</button>
                </a>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/theme/dashboard-theme.js"></script>
</body>
</html>