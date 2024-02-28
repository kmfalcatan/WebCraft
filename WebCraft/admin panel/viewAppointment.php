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


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php-mailer/src/Exception.php';
require '../php-mailer/src/PHPMailer.php';
require '../php-mailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    
    $maintenance_email = $_POST['maintenance_email']; 

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'pawtingkasan20@gmail.com'; 
        $mail->Password = 'ixgx velx feaw sgit';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('pawtingkasan20@gmail.com'); 
        $mail->addAddress($maintenance_email);

        $mail->isHTML(true);
        $mail->Subject = "Appointment Details";
        $mail->Body = "
            <h2>Appointment Details</h2>
            <p>Equipment Name: $equipment_name</p>
            <p>Appointment Date: $date_of_appointment</p>
            <p>Reason: $details_of_equipment</p>
            <hr>
            <p>Admin Name: {$_POST['admin_name']}</p>
            <p>Budget: {$_POST['budget']}</p>
        ";

        $equip_img = $row['equip_img'];
        if (!empty($equip_img)) {
            $mail->addAttachment("../uploads/$equip_img");
        }

        $mail->send();
        echo "Email sent successfully.";
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$e->getMessage()}";
    }    
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
                        <img src="../assets/img/system-name.png" alt="">
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
                            <input type="text" class="budget" name="budget" placeholder="Budget:">
                            <input type="text" class="budget" name="admin_name" placeholder="Admin Name:">
                            <!-- <input type="email" class="budget" name="admin_email" placeholder="Admin email:"> -->
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
                    <!-- <button class="button1">
                        <img class="image7" src="../assets/img/th (3).jpg" alt="">
                    </button>
                    <button class="button">Approve</button> -->
                    <button class="button" type="submit" name="submit">Send email</button>
                    <a href="../admin panel/approveAppointment.php?request_ID=<?php echo $row['request_ID']; ?>&id=<?php echo $userID; ?>">
                        <button class="button" type="button">Back</button>
                    </a>
                </div>
            </div>
        </form>
        
        <script src="../assets/js/theme/dashboard-theme.js"></script>
</body>
</html>