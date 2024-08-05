<?php
include_once "../authentication/auth.php";
include_once "../functions/header.php";
include_once "../functions/updateEquip.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
    <link rel="stylesheet" href="../assets/css/newEquipOtherInfo.css">
    <link rel="stylesheet" href="../assets/css/warranty.css">
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
                    <div class="subProfileContainer" id="profileContainer">
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
            <?php include('sidebar.php'); ?>
        </div>
    </div>

    <div class="container2">
        <div class="subContainer2">
            <div class="headerContainer1">
            </div>

            <form class="infoContainer"  action="../functions/updateEquip.php" enctype="multipart/form-data" method="post">
                <div class="subInfoContainer">
                    <div class="imageContainer1">
                        <div class="subImageContainer1">
                            <div class="image1">
                                <img class="image1" src="<?php echo $imageURL; ?>" alt="Mountain Placeholder" onerror="this.onerror=null; this.src='../assets/img/img_placeholder.jpg';">
                            </div>

                        </div>

                        <div class="equipNameContainer">
                            <input class="equipNameContainer" type="text" name="article" id="update" value="<?php echo $article; ?>">
                        </div>
                    </div>

                    <div class="subInfoContainer1">
                        <div class="infoEquipContainer">
                            <div class="subInfoEquipContainer">
                                <p>User Handler</p>
                            </div>

                            <div class="subInfoEquipContainer1">
                                <div class="infoEquip">
                                    <?php foreach ($userInfo as $info): ?>
                                        <div class="userHandler">
                                            <p><?php echo $info['user']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="subInfoEquipContainer2">
                                <button onclick="popup2()" class="viewButton">View more</button>
                                
                                <div class="userContainer" id="userContainer" style="display: none;">
                                    <div class="subUserContainer">
                                        <p>NAME</p>
                                        <p>UNIT HANDLE</p>
                                    </div>

                                     <?php foreach ($userInfo as $info): ?>
                                        <div class="subUserContainer1">
                                            <p><?php echo $info['user']; ?></p>
                                            <p><?php echo $info['units_handled']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="infoEquipContainer1">
                            <div class="subInfoEquipContainer">
                                <p>Deployment</p>
                            </div>

                            <div class="subInfoEquipContainer1">
                                    <input class="infoEquip" type="text" name="deployment" id="update" value="<?php echo $deployment; ?>">
                           
                            </div>
                        </div>

                        <div class="infoEquipContainer2">
                            <div class="infoEquipContainer3">
                                <div class="subInfoEquipContainer">
                                    <p>Property Number</p>
                                </div>
    
                                <div class="subInfoEquipContainer1">
                                    <input class="infoEquip" type="text" name="property_number" id="update" value="<?php echo $property_number; ?>">
                                </div>
                            </div>

                            <div class="infoEquipContainer3">
                                <div class="subInfoEquipContainer">
                                    <p>Account Code</p>
                                </div>
    
                                <div class="subInfoEquipContainer1">
                                    <input class="infoEquip" type="text" name="account_code" id="update" value="<?php echo $account_code; ?>">
                                </div>
                            </div>

                            <div class="infoEquipContainer3">
                                <div class="subInfoEquipContainer">
                                    <p>Total Units</p>
                                </div>
    
                                <div class="subInfoEquipContainer1">
                                    <div class="infoEquip">
                                        <p><?php echo $units; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="infoEquipContainer4">
                    <div class="infoEquipContainer3">
                        <div class="subInfoEquipContainer">
                            <p>Unit Value</p>
                        </div>

                        <div class="subInfoEquipContainer1">
                            <input class="infoEquip" type="text" name="unit_value" id="update" value="<?php echo $unit_value; ?>"> 
                        </div>
                    </div>

                    <div class="infoEquipContainer3">
                        <div class="subInfoEquipContainer">
                            <p>Total Value</p>
                        </div>

                        <div class="subInfoEquipContainer1">
                            <input class="infoEquip" type="text" name="total_value" id="update" value="<?php echo $total_value; ?>">
                        </div>
                    </div>

                    <div class="infoEquipContainer3">
                        <div class="subInfoEquipContainer">
                            <p>Remarks</p>
                        </div>

                        <div class="subInfoEquipContainer1">
                             <input class="infoEquip" type="text" name="remarks" id="update" value="<?php echo $remarks; ?>">
                        </div>
                    </div>
                </div>

                <div class="descriptionContainer">
                    <div class="subInfoEquipContainer">
                        <p>Description</p>
                    </div>

                    <div class="subDescriptionContainer">
                        <input class="infoEquip" type="text" name="description" id="update" value="<?php echo $description; ?>">
                    </div>
                </div>

                <div class="descriptionContainer">
                    <div class="subInfoEquipContainer">
                        <p>Step How To Use:</p>
                    </div>

                    <div class="subDescriptionContainer">
                        <input class="infoEquip" type="text" name="instruction" id="update" value="<?php echo $instruction; ?>">
                    </div>
                </div>

                <div class="buttonContainer" style="margin-top: 2.4rem;">
                    <a href="../admin panel/updateEquip.php?equipment_ID=<?php echo $equipment_ID; ?>&id=<?php echo $userID; ?>">
                        <button class="button" type="submit" id="btn1">Save</button>
                    </a>
                    
                    <button id="btn2" type="button" class="button" onclick="goBack()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- warranty -->
    <div class="container4" id="warrantyContainer" style="display: none;">
        <div class="subContainer"  >
            <div class="warrantyContainer">
                <p>Warranty Will Expire On: <span><?php echo isset($warranty_end) ? date('M d, Y', strtotime($warranty_end)) : ''; ?></span></p>
            </div>
            <div class="buttonContainer">
                <button id="btn1" type="button" class="button" onclick="closeWarranty()">Close</button>
            </div>
        </div>
    </div>

     <!-- sidebar show -->
     <div class="sidebar" id="sidebar">
        <?php include('slideshow.php'); ?>
    </div>

    <div id="logoutConfirmation" class="popupContainer">
        <div class="popupContent">
            <p>Are you sure you want to log out?</p>
            <div class="popupButtons">
                <button onclick="logout()">Yes</button>
                <button onclick="hideLogoutConfirmation()">No</button>
            </div>
        </div>
    </div>

    <div id="logoutConfirmation" class="popupContainer">
        <div class="popupContent">
            <p>Are you sure you want to log out?</p>
            <div class="popupButtons">
                <button onclick="logout()">Yes</button>
                <button onclick="hideLogoutConfirmation()">No</button>
            </div>
        </div>
    </div>

    <script src="../assets/js/sidebarShow.js"></script>
    <script src="../assets/js/toggle.js"></script>
</body>
</html>