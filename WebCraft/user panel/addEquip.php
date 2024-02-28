<?php
include_once "../functions/saveEquip.php";
include_once "../functions/header.php";

$users = [];
$query = "SELECT id, fullname FROM users WHERE role = 'user'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $users[$row['id']] = $row['fullname'];
}
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

                        <p class="adminName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
            
            <?php include('sidebar.php'); ?>
            
        </div>
    </div>

    <form action="../functions/saveEquip.php" enctype="multipart/form-data" method="post"  id="Form1">
        <div class="container3">
            <div class="topContainer">
                <img class="top-img" src="../assets/img/stet-icon.png" alt="" >
                <h2>ADD EQUIPMENT</h2>
            </div>
            <div class="subContainer2">
                <div class="imageContainer1">
                    <div class="subImageContainer1">
                        <div class="uploadImageContainer">
                            <div class="subUploadImageContainer">
                                <img class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">
                            </div>
                        </div>
        
                        <div class="uploadButtonContainer">
                            <label for="image" class="uploadButton">
                                <input id="image" name="image" type="file" style="display: none;" required>
                                <span class="plusIcon">+</span>
                            </label>
                        </div>
                    </div>
    
                    <div class="infoContainer">
                        <div class="subInfoContainer">
                        <?php
                            $fullname = $userInfo['id'] ?? '';
                            if (isset($users[$fullname])) {
                                echo '<input class="inputInfo" name="user" type="text" placeholder="Full Name" value="' . $users[$fullname] . '" readonly>';
                            }
                        ?>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="article" cols="30" rows="10" placeholder="Article:" required></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="deployment" cols="30" rows="10" placeholder="Deployment:" required></textarea>
                        </div>
    
                        <div class="subInfoContainer">
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="property_number" cols="30" rows="10" placeholder="Property number:" required></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="account_code" cols="30" rows="10" placeholder="Account code:" required></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="units" cols="30" rows="10" placeholder="Units:" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="otherInfoContainer">
                    <div class="subOtherInfoContainer">
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="unit_value" cols="30" rows="10" placeholder="Unit value:" required></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="total_value" cols="30" rows="10" placeholder="Total value:" required></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="remarks" cols="30" rows="10" placeholder="remarks:"></textarea>
                        </div>
                    </div>
    
                    <div class="descriptionContainer">
                        <textarea class="inputInfo4" name="description" cols="30" rows="10" placeholder="Description:" required></textarea>
                    </div>

                    <div class="dropdownContainer">
                        <label for="year">Year:</label>
                        <select id="year" name="year_received" class="yearDropdown" required>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
    
                    <div class="addEquipButtonContainer">
                        <button class="addEquipButton" type="submit" name="submit_form1" id="addEquipButton">Add other information</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/uploadImg.js"></script>
    <script src="../assets/js/theme/new-equip-theme.js"></script>
</body>
</html>