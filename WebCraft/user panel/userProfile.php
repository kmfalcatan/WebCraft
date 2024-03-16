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
    <style>
        .topContainer a{
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            padding: 0.4rem 2rem;
            text-decoration: none;
            color: rgb(2, 116, 200);
            margin-right: 2rem;
            font-weight: bold;
            border-radius: 0.3rem;
        }

        .topContainer a:hover{
            background-color: rgba(2, 117, 200, 0.297);
            color: #fff;
        }
    </style>
</head>
<body id="body">
    <div class="container">
        <form class="subContainer" id="subContainer" method="POST"  action="../user panel/editProfile.php?id=<?php echo $userID; ?>">
            <div class="topContainer">
                <img class="top-img" src="../assets/imG/person-circle.png" alt="" >
                <h2>USER PROFILE</h2>
                <a href="../user panel/userEquip.php?id=<?php echo $userID; ?>">My inventory</a>
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
                <a href="../user panel/editProfile.php?id=<?php echo $userID; ?>">
                    <button class="button" id="btn1"><a href="../user panel/editProfile.php?id=<?php echo $userID; ?>">Edit</a></button>
                </a>
                <button class="button" id="btn2"><a href="../user panel/setting.php?id=<?php echo $userInfo['id']; ?>">Back</a></button>
            </div>
        </form>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
 <script src="../assets/js/theme/setting.js"></script>
</body>
</html>