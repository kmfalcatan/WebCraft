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

    <link rel="stylesheet" href="../assets/css/addOtherInfor.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body id="body">
    
    <div class="container">
        <form class="subContainer" id="subContainer" method="POST"  action="../admin panel/editProfile.php?id=<?php echo $userID; ?>">
            <div class="topContainer">
                <img class="top-img" src="../assets/imG/person-circle.png" alt="" >
                <h2>USER PROFILE</h2>
            </div>

            <input type="hidden" name="id" value="<?php echo $userID; ?>">
            
            <div class="imageContainer">
                <div class="subImageContainer">
                <?php
                    if (!empty($userInfo['profile_img'])) {
                        echo '<img class="uploadImage" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                    } else {
                        echo '<img class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">';
                    }
                ?>
                </div>
            </div>

            <div class="fullnameContainer">
                <div class="subUserInfoContainer">
                <input class="userInfo3" name="fullname" type="text" value="<?php echo $userInfo['fullname'] ?? ''; ?>" readonly>
                </div>
            </div>

            <div class="subWarrantyContainer">
                <div class="userInfoContainer">

                    <label for="username">Username</label>
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="username" type="text" value="<?php echo $userInfo['username'] ?? ''; ?>" readonly>
                    </div>
                    
                    <label for="email">E-mail</label>
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="email" type="email" value="<?php echo $userInfo['email'] ?? ''; ?>" readonly>
                    </div>
                    
                    <label for="contact">Contact Number</label>
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="contact" type="number" value="<?php echo $userInfo['contact'] ?? ''; ?>" readonly>
                    </div>
                </div>

                <div class="userInfoContainer">
                    <label for="department">Department</label>
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="department" type="text" value="<?php echo $userInfo['department'] ?? ''; ?>" readonly>
                    </div>
                    
                    <label for="address">Address</label>
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="address" type="text" value="<?php echo $userInfo['address'] ?? ''; ?>" readonly>
                    </div>
                    
                    <label for="gender">Gender</label>
                    <div class="subUserInfoContainer">
                        <input class="" id="gender" name="gender" type="text" value="<?php echo $userInfo['gender'] ?? ''; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="buttonContainer2">
                <a href="../admin panel/editProfile.php?id=<?php echo $userID; ?>">
                    <button class="button" id="btn1"><a href="../admin panel/editProfile.php?id=<?php echo $userID; ?>">Edit</a></button>
                </a>
                <button class="button" id="btn2"><a href="../admin panel/setting.php?id=<?php echo $userID; ?>">Back </a></button>
            </div>
        </form>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
 <script src="../assets/js/theme/setting.js"></script>
</body>
</html>