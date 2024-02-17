<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";
include_once "../functions/header.php";

if (!isset($_GET['request_ID']) || empty($_GET['request_ID'])) {
    echo "Request ID is not provided.";
    exit();
}

$requestID = $_GET['request_ID'];
$query = "SELECT * FROM approved_requests WHERE request_ID = $requestID";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $equipmentName = $row['equipment_name'];
    $dateApproved = $row['date_approved'];
    $detailsOfEquipment = $row['details_of_equipment'];
    $budget = $row['budget'];

    $unitQuery = "SELECT unit_ID FROM appointment WHERE request_ID = $requestID";
    $unitResult = $conn->query($unitQuery);
    $unitRow = $unitResult->fetch_assoc();
    $unit_ID = $unitRow['unit_ID'];

    $appointmentQuery = "SELECT fullname FROM appointment WHERE request_ID = $requestID";
    $appointmentResult = $conn->query($appointmentQuery);
    $appointmentRow = $appointmentResult->fetch_assoc();
    $requestedBy = $appointmentRow['fullname'];

    $maintenanceQuery = "SELECT name FROM maintenance_contact WHERE request_ID = $requestID";
    $maintenanceResult = $conn->query($maintenanceQuery);
    $maintenanceRow = $maintenanceResult->fetch_assoc();
    $approvedBy = $maintenanceRow['name'];
    
} else {
    echo "No record found for the provided Request ID.";
    exit();
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
                    <p><span>Approved by:</span> <?php echo $approvedBy; ?></p>
                </div>

                <div class="subMaintenanceContainer">
                    <p><span>Requested by:</span> <?php echo $requestedBy; ?></p>
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
    
    <script src="../assets/js/theme/dashboard-theme.js"></script>
</body>
</html>