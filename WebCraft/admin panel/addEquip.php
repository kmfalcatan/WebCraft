<?php
include_once "../functions/saveEquip.php";
include_once "../functions/header.php";

$users = []; 
$query = "SELECT id, fullname FROM users WHERE role = 'user'";
$result = mysqli_query($conn, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row['fullname'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/newAddequipment.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
    <link rel="stylesheet" href="../assets/css/newOtherInfo.css">
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
                        <img class="medName" src="../assets/img/system-name.png" alt="">
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

    <form class="container2" action="../functions/saveEquip.php" enctype="multipart/form-data" method="post"  id="Form1">
        <div class="subContainer3">
            <div class="textContainer">
                <div class="imageContainer2">
                    <div class="subImageContainer2">
                        <img class="image1" src="../assets/img/stet-icon.png" alt="">
                    </div>

                    <div class="textContainer1">
                        <h2>ADD EQUIPMENT</h2>
                    </div>
                </div>
            </div>

            <div class="subContainer4">
                <div class="infoContainer1">
                    <div class="uploadImageContainer1">
                        <div class="subUploadImageContainer1">
                            <div class="imageContainer3">
                                <img class="image3" id="image3" src="../assets/img/img_placeholder.jpg" alt="">
                            </div>
                        </div>

                        <div class="uploadButtonContainer1">
                            <label class="uploadButton1" type="button">
                                <img class="uploadIcon1" src="../assets/img/upload.png" alt="Upload Icon" class="uploadIcon">
                                upload
                                <input id="image" name="image" type="file" style="display: none;">
                            </label>
                        </div>
                    </div>

                    <div class="subInfoContainer1">
                        <div class="inputInfoContainer3">
                            <div class="subInputInfoContainer3">
                                <button onclick="dropdown()" type="button" class="inputInfo1">Select Custodian</button>

                                <div class="dropdownContainer1"  name="user" id="dropdown" style="display: none;">
                                    <?php
                                        foreach ($users as $username) {
                                            echo '<div class="subDropDownContainer1">';
                                            echo '<input class="checkBox" name="user" type="checkbox" onchange="handleUserSelection(this, \'' . $username . '\')">';
                                            echo '<p>' . $username . '</p>';
                                            echo '</div>';               
                                            
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="subInputInfoContainer3">
                                <div class="subInputInfoContainer3">
                                <label onclick="viewSelectedUsers()" class="viewButton">Selected custodians</label>

                                <div class="dropdownContainer1" id="dropdown1" style="display: none;">
                                    <div id="selectedUsersContainer" style="text-align: center;"></div>
                                </div>
                                </div>

                            </div>
                        </div>

                        <div class="inputInfoContainer3">
                            <div class="subInputInfoContainer3">
                                <input class="inputInfo2" type="text" name="article" placeholder="Article:">
                            </div>

                            <div class="subInputInfoContainer3">
                                <input class="inputInfo2" type="text" name="deployment" placeholder="Deployment:">
                            </div>
                        </div>

                        <div class="inputInfoContainer3">
                            <div class="subInputInfoContainer3" style="flex-direction: column;">
                                <button onclick="dropdown2()" type="button" class="inputInfo8">Distribute unit</button>

                                <div class="dropdownContainer1" id="dropdown2" style="display: none;">
                                    <div class="labelContainer">
                                        <label class="label" id="user">Custodians</label>
                                        <label class="label" id="unit">Unit</label>
                                    </div>
                                    <div id="selectedUsersContainer2"></div> 
                                    <div class="subDropDownContainer1">
                                        <button class="saveButton"  onclick="saveUnits()" type="button">save</button>
                                    </div>
                                </div>
                            </div>


                            <div class="subInputInfoContainer3">
                                <input class="inputInfo2" type="text" name="total_unit" id="totalUnits" placeholder="Total unit:" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="subContainer6">
                    <div class="subInputInfoContainer3">
                        <input class="inputInfo2" type="text" name="property_number" placeholder="Property number:">
                    </div>

                    <div class="subInputInfoContainer3">
                        <input class="inputInfo2" type="text" name="account_code" placeholder="Account code:">
                    </div>

                    <div class="subInputInfoContainer3">
                        <input class="inputInfo2" type="text" name="unit_value" placeholder="Unit value:">
                    </div>

                    <div class="subInputInfoContainer3">
                        <input class="inputInfo2" type="text" name="total_value" placeholder="Total value:">
                    </div>

                    <div class="subInputInfoContainer3">
                        <input class="inputInfo2" type="text" name="remarks" placeholder="Remarks:">
                    </div>
                </div>

                <div class="descriptionContainer1">
                    <input class="description" name="description" type="text" placeholder="Descripton:">
                </div>

                <div class="yearContainer">
                    <p class="year">Year:
                        <input type="year" name="year_received" id="select-year">
                    </p>
                </div>
            </div>
        </div>

        <div class="otherInfoContainer6">
            <img onclick="appear()" class="arrowDown" src="../assets/img/arrow-down.png" alt="">
        </div>

        <div class="container3" style="display: none;">
            <div class="backContainer1">
                <img onclick="appear()" class="arrowDown1" src="../assets/img/arrow-down.png" alt="">
            </div>

            <div class="container2">
                <div class="subContainer7">
                    <div class="textContainer3">
                        <div class="imageContainer2">
                            <div class="subImageContainer2">
                                <img class="image1" src="../assets/img/stet-icon.png" alt="">
                            </div>
        
                            <div class="textContainer2">
                                <p>ADDITIONAL INFORMATION</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="subContainer5">
                        <div class="infoContainer3">
                            <div class="uploadImageContainer3">
                                <div class="subUploadImageContainer2">
                                    <div class="imageContainer4">
                                        <img class="image4" id="image4" src="../assets/img/img_placeholder.jpg" alt="">
                                    </div>
                                </div>
        
                                <div class="uploadButtonContainer6">
                                    <label class="uploadButton6">
                                        <img class="uploadIcon6" src="../assets/img/upload.png" alt="">
                                        upload
                                        <input id="warranty_image" name="warranty_image" type="file" style="display: none;" >
                                    </label>
                                </div>
                            </div>
        
                            <div class="subInfoContainer2">
                                <div class="inputInfoContainer5">
                                    <div class="subInputInfoContainer5">
                                        <p class="inputInfo3">Warranty start date:</p>
                                    </div>

                                    <div class="subInputInfoContainer5">
                                        <input class="inputInfo4" type="date" name="warranty_start">
                                    </div>

                                    <div class="subInputInfoContainer5">
                                        <p class="inputInfo3">Warranty expiration date:</p>
                                    </div>
        
                                    <div class="subInputInfoContainer5">
                                        <input class="inputInfo4" type="date" name="warranty_end">
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="instructionContainer">
                            <p class="inputInfo3">steps how to use:</p>
                            <div class="instruction">
                                <button id="addStep" type="button">Add Step</button>
                                <ol id="stepsList">
                                    <label class="step-label">Step 1</label>
                                    <input class="steps" name="instruction" type="text" style="width: 95%; height: 3rem; border-radius: 0.2rem;" placeholder="Enter step...">
                                </ol>
                            </div>
                        </div>
                        
                        <div class="addButtonContainer">
                            <button class="addButton" type="submit">Add to inventory</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- slideshow -->
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

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/addEquip.js"></script>
    <script src="../assets/js/uploadImg.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>


    <script>
        document.getElementById('addStep').addEventListener('click', function() {

            const numSteps = document.querySelectorAll('.steps').length;
            
            const newStep = document.createElement('li');
            newStep.innerHTML = `
                <label class="step-label">Step ${numSteps + 1}</label>
                <input class="steps" name="instruction" type="text" style="width: 58.5rem; height: 3rem; border-radius: 0.2rem;" placeholder="Enter step...">
            `;
            
            document.getElementById('stepsList').appendChild(newStep);
        });
    </script>

</body>
</html>