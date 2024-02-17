<?php
include_once "../functions/upateProfile.php";
include_once "../authentication/auth.php";
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
        <form class="subContainer" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" enctype="multipart/form-data">
            <div class="textContainer">
                <p class="text">Edit Profile</p>
            </div>

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

                <div class="uploadButtonContainer">
                    <input class="uploadButton" name="profile_img" type="file">
                </div>
            </div>

            <div class="fullnameContainer">
                <div class="subUserInfoContainer">
                    <input class="userInfo3" name="fullname" type="text" placeholder="Full Name" value="<?php echo $userInfo['fullname'] ?? ''; ?>" readonly>
                </div>
            </div>

            <div class="subWarrantyContainer">
                <div class="userInfoContainer">
                    <div class="subUserInfoContainer">
                    <input class="userInfo2" name="username" type="text" placeholder="Username" value="<?php echo $userInfo['username'] ?? ''; ?>">
                    </div>
                    
                    <div class="subUserInfoContainer">
                        <input class="userInfo2" name="email" type="email" placeholder="Email" value="<?php echo $userInfo['email'] ?? ''; ?>">
                    </div>
                    
                    <div class="subUserInfoContainer">
                       <input class="userInfo2" name="contact" type="number" placeholder="Contact no." value="<?php echo $userInfo['contact'] ?? ''; ?>">
                    </div>
                </div>

                <div class="userInfoContainer">
                    <div class="subUserInfoContainer">
                        <select class="userInfo2" name="department" id="">
                            <option value="" disabled selected hidden>Choose a department</option>
                            <option value="College of Medicine">College of Medicine</option>
                            <option value="College of Science and Mathematics">College of Science and Mathematics</option>
                            <option value="College of Computing Studies">College of Computing Studies</option>
                            <option value="College of Nursing">College of Nursing</option>
                            <option value="College of Engineering">College of Engineering</option>
                        </select>
                    </div>
                    
                    <div class="subUserInfoContainer">
                        <input type="text" class="userInfo2" placeholder="Address">
                    </div>
                    
                    <div class="subUserInfoContainer">
                        <select class="userInfo2" name="gender" id="">
                            <option value="">Choose Gender:</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="buttonContainer2">
                <button class="button" type="submit" id="btn1">Save</button>
                <a href="../admin panel/setting.php">
                    <button class="button" id="btn2">Back</button>
                </a>
            </div>
        </form>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
 <script src="../assets/js/theme/setting.js"></script>
</body>
</html>