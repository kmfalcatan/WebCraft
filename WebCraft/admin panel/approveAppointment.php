<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

function approveRequest($conn, $userID, $requestID, $equipImg, $equipmentName, $budget, $detailsOfEquipment) {
    // Prepare and execute the SQL statement to insert data into the approved_request table
    $stmt = $conn->prepare("INSERT INTO approved_requests (request_ID, equip_img, equipment_name, budget, details_of_equipment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $requestID, $equipImg, $equipmentName, $budget, $detailsOfEquipment);
    $stmt->execute();
    $stmt->close();

    // Redirect to budget.php with the userID
    header("Location: budget.php?id=$userID");
    exit();
}

if (!isset($_GET['request_ID']) || !($row = $conn->query("SELECT * FROM appointment WHERE request_ID = {$_GET['request_ID']}")->fetch_assoc())) {
    echo "Request ID is not provided or no appointment found with the provided ID.";
    exit();
}

$equipment_name = $row['article'] ?? '';
$date_of_appointment = $row['date_request'] ?? '';
$details_of_equipment = $row['description'] ?? '';

$budgetResult = $conn->query("SELECT * FROM budget WHERE request_ID = {$_GET['request_ID']}");
$budgetRow = $budgetResult->fetch_assoc();
$budget = $budgetRow['budget'] ?? '';

$maintenanceResult = $conn->query("SELECT * FROM maintenance_contact WHERE request_ID = {$_GET['request_ID']}");
$maintenanceRow = $maintenanceResult->fetch_assoc();
$admin_email = $maintenanceRow['admin_email'] ?? '';
$name = $maintenanceRow['name'] ?? '';
$maintenance_email = $maintenanceRow['maintenance_email'] ?? '';
$contact_number = $maintenanceRow['contact_number'] ?? '';

if (isset($_POST['approve'])) {
    approveRequest($conn, $userID, $_GET['request_ID'], $row['equip_img'], $equipment_name, $budget, $details_of_equipment);
}
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
                            <input type="email" class="budget" name="admin_email" placeholder="Admin email:"  value="<?php echo $admin_email; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="maintenanceContainer">
                    <div class="subMaintenanceContainer">
                        <p class="maintenance">Maintenance contact details:</p>
                    </div>

                    <div class="subMaintenanceContainer">
                        <input type="text" class="budget" name="name" placeholder="Name:" value="<?php echo $name; ?>" readonly>
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
        <script>
        window.onload = function() {
            var equipmentName = "<?php echo $equipment_name; ?>";
            var dateOfAppointment = "<?php echo $date_of_appointment; ?>";
            var detailsOfEquipment = "<?php echo $details_of_equipment; ?>";
            var budget = "<?php echo $budget; ?>";
            var adminEmail = "<?php echo $admin_email; ?>";
            var name = "<?php echo $name; ?>";
            var maintenanceEmail = "<?php echo $maintenance_email; ?>";
            var contactNumber = "<?php echo $contact_number; ?>";

            if (equipmentName !== "" && dateOfAppointment !== "" && detailsOfEquipment !== "" && budget !== "" && adminEmail !== "" && name !== "" && maintenanceEmail !== "" && contactNumber !== "") {
                document.getElementById("approveButton").disabled = false;
            } else {
                document.getElementById("approveButton").disabled = true;
            }
        };
    </script>

</body>
</html>