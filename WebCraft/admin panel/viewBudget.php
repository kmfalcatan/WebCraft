<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";
include_once "../functions/header.php";
include_once "../functions/budget.php";
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
    <link rel="stylesheet" href="../assets/css/receipt.css">
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
                    <img class="image3" src="../uploads/<?php echo $row['equip_img']; ?>" alt="Equipment Image">
                    </div>
                </div>

                <div class="infoContainer">
                    <div class="equipNameContainer">
                        <p class="equip-name"><?php echo $equipmentName; ?> | <?php echo $unit_ID; ?></p>
                    </div>

                    <div class="equipNameContainer">
                        <p>Budget Approved | <?php echo $dateApproved; ?></p>
                    </div>


                    <div class="equipNameContainer">
                        <p>Issue: <?php echo $detailsOfEquipment; ?></p>
                    </div>
                </div>
            </div>

            <div class="damageContainer">
                <div class="budgetContainer">
                    <div class="textContainer">
                        <p>BUDGET RELEASE:</p>
                    </div>

                    <div class="subBudgetContainer">
                        <div class="budget1">
                            <p><?php echo $budget; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="maintenanceContainer">
                <div class="subMaintenanceContainer">
                    <p><span>Approved by:</span><?php echo $approvedBy; ?></p>
                </div>

                <div class="subMaintenanceContainer">
                    <p><span>Requested by:</span><?php echo $requestedBy; ?></p>
                </div>
            </div>

            <div class="buttonContainer">
                <button class="button1">
                    <img class="image7" src="../assets/img/th (3).jpg" alt="">
                </button>
                <a href="../admin panel/budget.php?id=<?php echo $userID; ?>">
                    <button class="button">Back</button>
                </a>
            </div>
        </div>
    </div>

    <div id="receiptModal" class="receiptModal" style="display: none;">
        <div class="ModalButtons">
             <button class="printButton">
                 <img class="logo" src="../assets/img/th (3).jpg" alt="">
             </button>
             
            <button class="backButton">Close</button>
        </div>
        <?php include('receipt.php'); ?>

    </div>
    
    <script src="../assets/js/theme/dashboard-theme.js"></script>
   
    <script src="../assets/js/receipt.js"></script>

</body>
</html>