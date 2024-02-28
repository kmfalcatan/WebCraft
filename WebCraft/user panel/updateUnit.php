<?php
include_once '../functions/header.php';
include_once '../functions/updateUnit.php';
include_once '../authentication/auth.php';

$unitPrefix = 'UNIT';
$defaultUnitID = '0000';
$unitID = $unitPrefix . '-' . str_pad($unit_ID, strlen($defaultUnitID), '0', STR_PAD_LEFT); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/addEquip.css">
    <link rel="stylesheet" href="../assets/css/updateUnit.css">
</head>
<body id="body">
    <div class="container2">
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
    </div>

    <form class="subContainer3" action="" enctype="multipart/form-data" method="post">
        <div class="container3">
            <div class="subContainer2">
                <div class="imageContainer1">
                    <div class="subImageContainer1">
                        <div class="uploadImageContainer">
                            <div class="subUploadImageContainer">
                                <img class="uploadImage" src="<?php echo $image; ?>" alt="Mountain Placeholder">
                            </div>
                        </div>
                    </div>
    
                    <div class="infoContainer">
                    </div>
                </div>
    
                <div class="otherInfoContainer">
                    <div class="subOtherInfoContainer" >
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="unit_ID" cols="30" rows="10" placeholder="Unit ID:" readonly><?php echo $unitID; ?></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="equipment_name" cols="30" rows="10" placeholder="Equipment Name:" readonly><?php echo $equipment_name; ?></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="status" cols="30" rows="10" placeholder="Status:"><?php echo $status; ?></textarea>
                        </div>
                    </div>
    
                    <!-- <div class="descriptionContainer">
                        <textarea class="inputInfo4" name="description" cols="30" rows="10" placeholder="Description:"><?php echo $description; ?></textarea>
                    </div> -->
    
                    <div class="buttonsContainer">
                        <a href="../user panel/updateEquip.php?equipment_ID=<?php echo $equipment_ID; ?>&id=<?php echo $userID; ?>">
                            <button class="button" type="submit" id="btn1">Save</button>
                        </a>
                        
                        <button id="btn2" type="button" class="button" onclick="goBack()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/theme/dashboard-theme.js"></script>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</body>
</html>