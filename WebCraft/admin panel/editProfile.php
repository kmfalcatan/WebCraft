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

            <div class="warrantyContainer1">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <div class="uploadImage">
                            <img class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">
                        </div>
                    </div>

                    <input type="hidden" name="equipment_ID" value="<?php echo $equipment_ID; ?>">

                    <div class="uploadButtonContainer">
                        <input class="uploadButton" name="warranty_image" type="file">
                    </div>
                </div>

                <div class="subWarrantyContainer">
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="warranty_start" type="text" placeholder="User name:">
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="warranty_end" type="text" placeholder="Full name:">
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="warranty_end" type="text" placeholder="Email:">
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="warranty_end" type="text" placeholder="Contact no.:">
                    </div>
                </div>

                <div class="buttonContainer1">
                    <button class="button" name="" >Save</button>
                    <a href="../admin panel/setting.php">
                        <button class="button">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
</body>
</html>