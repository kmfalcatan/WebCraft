<?php
include('../functions/upateProfile.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/addOtherInfor.css">
    <link rel="stylesheet" href="../assets/css/editProfile.css">
</head>
<body>
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
                <div class="subWarrantyContainer">
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="fullname" type="text" placeholder="Full name" value="<?php echo $userInfo['fullname'] ?? ''; ?>">
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="email" type="email" placeholder="Email" value="<?php echo $userInfo['email'] ?? ''; ?>">
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="contact" type="number" placeholder="Contact no." value="<?php echo $userInfo['contact'] ?? ''; ?>">
                    </div>

                    <div class="startWarrantyContainer">
                        <select class="startWarranty1" name="" id="">
                            <option value="">
                                Choose a department
                            </option>
                        </select>
                    </div>
                </div>

                <div class="buttonContainer1">
                    <button class="button" type="submit" >Save</button>
                    <a href="../admin panel/setting.php">
                        <button class="button">Back</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
</body>
</html>