<?php
include('../functions/upateProfile.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/addOtherInfor.css">
    <link rel="stylesheet" href="../assets/css/editProfile.css">
</head>
<body id="body">
    <div class="container">
        <div class="subContainer">
            <div class="textContainer">
                <p class="text">Edit Profile</p>
            </div>

            <form class="warrantyContainer1" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" enctype="multipart/form-data">
                
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

                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="uploadButtonContainer">
                        <input class="uploadButton" name="profile_img" type="file">
                    </div>
                </div>
                <div class="inputContainer">
                    <div class="inputContainer2">
                        <input class="input" name="username" type="text" placeholder="Username" value="<?php echo $userInfo['username'] ?? ''; ?>">
                    </div>

                    <div class="inputContainer2">
                        <input class="input" name="fullname" type="text" placeholder="Full name" value="<?php echo $userInfo['fullname'] ?? ''; ?>">
                    </div>
                    
                    <div class="inputContainer2">
                        <input class="input" name="email" type="email" placeholder="Email" value="<?php echo $userInfo['email'] ?? ''; ?>">
                    </div>
                    
                    <div class="inputContainer2">
                        <input class="input" name="contact" type="number" placeholder="Contact no." value="<?php echo $userInfo['contact'] ?? ''; ?>">
                    </div>

                    <div class="inputContainer2">
                        <select class="input" name="" id="">
                            <option value="" disabled selected hidden>Choose a department</option>
                            <option value="option1">College of Medicine</option>
                            <option value="option2">College of Science and Mathematics</option>
                            <option value="option3">College of Computing Studies</option>
                            <option value="option4">College of Nursing</option>
                            <option value="option5">College of Engineering</option>
                        </select>
                    </div>
                </div>

                <div class="buttonContainer1">
                    <button class="button" type="submit" id="btn1">Save</button>
                    <a href="../admin panel/setting.php">
                        <button class="button" id="btn2">Back</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
 <script src="../assets/js/theme/setting.js"></script>
</body>
</html>