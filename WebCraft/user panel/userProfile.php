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
    <div class="container" style="height: 100vh;">
        <form class="subContainer"  style="height: 70vh;" method="POST"  action="../user panel/editProfile.php?id=<?php echo $userID; ?>">
            <div class="textContainer">
                <p class="text">Profile</p>
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
                    <input class="userInfo3" name="fullname" type="text" placeholder="Full Name" value="<?php echo $userInfo['fullname'] ?? ''; ?>" readonly>
                </div>

                <div class="subUserInfoContainer" id="userID">
                    <p class="userID"><?php echo  $userID = isset($userInfo['id']) ? date('Y') . '-' . str_pad($userInfo['id'], 5, '0', STR_PAD_LEFT) : ""; ?></p>
                </div>
            </div>

            <div class="subWarrantyContainer">
                <div class="userInfoContainer">
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="username" type="text" placeholder="User Name" value="<?php echo $userInfo['username'] ?? ''; ?>" readonly>
                    </div>
                    
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="email" type="email" placeholder="Email" value="<?php echo $userInfo['email'] ?? ''; ?>" readonly>
                    </div>
                    
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="contact" type="number" placeholder="Contact no." value="<?php echo $userInfo['contact'] ?? ''; ?>" readonly>
                    </div>
                </div>

                <div class="userInfoContainer">
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="department" type="text" placeholder="Department" value="<?php echo $userInfo['department'] ?? ''; ?>" readonly>
                    </div>
                    
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="address" type="text" placeholder="Address" value="<?php echo $userInfo['address'] ?? ''; ?>" readonly>
                    </div>
                    
                    <div class="subUserInfoContainer">
                        <input class="startWarranty" name="gender" type="text" placeholder="Gender" value="<?php echo $userInfo['gender'] ?? ''; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="buttonContainer2">
                <a href="../user panel/editProfile.php?id=<?php echo $userID; ?>">
                    <button class="button" id="btn1"><a href="../user panel/editProfile.php?id=<?php echo $userID; ?>">Edit</a></button>
                </a>
                <button class="button" id="btn2"><a href="../user panel/setting.php?id=<?php echo $userID; ?>">Back </a></button>
            </div>
        </form>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
 <script src="../assets/js/theme/setting.js"></script>
</body>
</html>