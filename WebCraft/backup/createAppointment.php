<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $article = $_POST['article'];
    $unit_ID = $_POST['unit_ID']; 
    $date_request = $_POST['date_request'];
    $description = $_POST['description'];

    $equipImgName = $_FILES['equip_img']['name'];
    $equipImgTemp = $_FILES['equip_img']['tmp_name'];
    $equipImgPath = "../uploads/" . $equipImgName;
    move_uploaded_file($equipImgTemp, $equipImgPath);

    $sql = "SELECT * FROM users WHERE fullname = '$fullname'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $message = "Full name doesn't exist.";
    } else {
        $row = mysqli_fetch_assoc($result);
        $userID = $row['id'];

        $sql = "SELECT equipment_ID FROM equipment WHERE article = '$article'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row !== null) {
            $equipment_ID = $row['equipment_ID'];

            $sql = "INSERT INTO appointment (equip_img, equipment_ID, unit_ID, article, date_request, description, fullname, email, contact_number) 
            VALUES ('$equipImgName', '$equipment_ID', '$unit_ID', '$article', '$date_request', '$description', '$fullname', '$email', '$contact_number')";
            if (mysqli_query($conn, $sql)) {
                $message = "Request sent successfully.";
                header("Location: ../user panel/appointment.php?id=$userID");
                exit;
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        } else {
            $message = "Invalid equipment article.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/createAppointment.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
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
                        <p class="userName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <form class="container2" method="POST" enctype="multipart/form-data">
            <div class="topContainer">
                <img class="top-img" src="../assets/img/stet-icon.png" alt="" >
                <h2>CREATE APPOINTMENT REQUEST</h2>
            </div>
            <div class="subContainer" id="subContainer"> 
                <div class="form-header">
                <h2>Request Maintenance</h2>
                <div class="msg" id="alert">
                    <?php
                    if (!empty($message)) {
                        if ($message == "Full name doesn't exist.") {
                            echo "<p style='color: red;'>$message</p>";
                        } elseif ($message == "Request sent successfully.") {
                            echo "<p style='color: green;'>$message</p>";
                        } else {
                            echo "<p>$message</p>";
                        }
                    }
                    ?>
                </div>
                </div>

                <div class="equipInfoContainer">
                    <div class="imageContainer1">
                        <div class="subImageContainer1">
                            <img class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">
                        </div>

                        <div class="uploadImageContainer">
                            <input class="uploadButton" type="file" name="equip_img">
                        </div>
                    </div>

                    <div class="infoContainer">
                        <div class="equipNameContainer">
                        <select class="inputName" name="article" id="">
                            <option value="">Select Equipment:</option>
                            <?php
                            $sql = "SELECT article FROM equipment";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['article'] . "'>" . $row['article'] . "</option>";
                            }
                            ?>
                        </select>
                        </div>

                        <div class="equipNameContainer">
                        <select class="inputName" name="unit_ID" id="unitSelect">
                            <option value="">Select Unit:</option>
                        </select>

                        </div>
                        
                        <div class="equipNameContainer">
                            <input class="inputName" type="date" name="date_request" id="date" placeholder="Date of appointmnet:">
                        </div>

                        <div class="equipNameContainer">
                            <input class="inputName" type="text" name="description" id="" placeholder="Enter reason for requesting appoinment">
                        </div>

                    </div>
                </div>

                <div class="damageContainer">
                    <div class="imageContainer1">
                        <div class="subImageContainer1">
                            <img class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">

                            <div class="nextRightContainer">
                                <img class="uploadImage" src="../assets/img/chevron-left (1).png" alt="">
                            </div>

                            <div class="nextLeftContainer">
                                <img class="uploadImage" src="../assets/img/chevron-right.png" alt="">
                            </div>
                        </div>

                        <div class="uploadImageContainer">
                            <input class="uploadButton" name="damage_img" type="file">
                        </div>
                    </div>

                    <div class="budgetContainer">
                        <div class="textContainer">
                            <p>Maintenance Requester</p>
                        </div>

                        <div class="subBudgetContainer">
                        <div class="equipNameContainer">
                                <input class="inputName" type="text" name="fullname" id="" value="<?php echo $userInfo['fullname'] ?? ''; ?>" readonly>
                            </div>
    
                            <div class="equipNameContainer">
                                <input class="inputName" type="email" name="email" id="" placeholder="Email">
                            </div>
    
                            <div class="equipNameContainer">
                                <input class="inputName" type="number" name="contact_number" id="" placeholder="Contact no.">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="buttonContainer">
                    <button class="button" type="submit" id="btn1">Send Request</button>
                    <a href="../user panel/appointment.php?id=<?php echo $userID; ?>">
                        <button class="button" type="button">Back</button>
                    </a>
                </div>
            </div>
        </form>

        <script src="../assets/js/login.js"></script>
        <script src="../assets/js/uploadImg.js"></script>
       <script src="../assets/js/unitID.js"></script>

</body>
</html>