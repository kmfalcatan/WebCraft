<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/header-sidebar.css">
    <link rel="stylesheet" href="../assets/css/help.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
</head>
<body>
    <div class="container1">
        <div class="headerContainer">
            <div class="subHeaderContainer">
                <div class="imageContainer" >
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
            <div class='sideNavBarContainer'>
                <div class='sideNavBar1'>
                    <div class="subSideNavBar">
                        <a class='profile' href='#newEquip'>
                            New Equipment
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image3" src="../assets/img/th-removebg-preview.png" alt="">
                        <img class="image5" src="../assets/img/plus-circle.png" alt="">
                    </div>
                </div>
        
                <div class='sideNavBar'>
                        <div class="subSideNavBar">
                            <a class='profile' href='#viewEquip'>
                                View equipment
                            </a>
                        </div>
        
                    <div class="image2">
                        <img class="image3" src="../assets/img/file-text-circle.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href='#viewBudget'>
                            View budget
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image3" src="../assets/img/th__1_-removebg-preview.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href='#viewUser'>
                            View users
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image3" src="../assets/img/person-circle.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href='#appointment'>
                            Appointment
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image3" src="../assets/img/calendar.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href='#editProfile'>
                            Profile editing
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image3" src="../assets/img/question-circle (2).png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href='#changePass'>
                            Change passsword
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image4" src="../assets/img/change-password-icon-clipart-7-removebg-preview.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href='#recycle'>
                            Recycle
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image4" src="../assets/img/recycling-2--removebg-preview.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar2'>
                    <div class="subSideNavBar">
                        <a class='profile' href='../admin panel/dashboard.php?id=<?php echo $userID; ?>'>
                            Back
                        </a>
                    </div>
        
                    <div class="image2">
                        <img class="image3" src="../assets/img/vector-settings-icon-removebg-preview.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" >
        <div class="subContainer" id="container">
            <p class="text">MEDEQUIP TRACKER</p>
            <p class="text1">A quick admin guide</p>
        </div>

        <div class="adminContainer" id="adminContainer">
            <p class="text1">ADMIN</p>
        </div>
    </div>

    <div class="newEquipContainer" id="newEquip">
        <div class="subNewEquipContainer">
            <p class="text1">1. Adding new equipment</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer1">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/Screenshot_2024-02-05_202750-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Click the add new equipment icon.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>Complete all fields and upload equipment picture.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newEquipContainer" id="viewEquip">
        <div class="subNewEquipContainer">
            <p class="text1">2. View equipment</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer3">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/viewEquip-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer1">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Select equipment on the row.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>select one of the listed equipment you want, to view full details.</p>
                    </div>
                </div>
                
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">3</p>
                    </div>

                    <div class="step">
                        <p>Click "check warranty" button to view warranty details of the selected equipment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newEquipContainer" id="viewBudget">
        <div class="subNewEquipContainer">
            <p class="text1">3. View budget</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer1">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/viewBudget-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Click the budget icon in the sidebar.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>Look for the equipment approved to view budget allocations and click it.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newEquipContainer" id="viewUser">
        <div class="subNewEquipContainer">
            <p class="text1">4. View users</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer3">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/viewUser-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer1">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Click on user icon.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>Select one of the listed users you want, to view information.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newEquipContainer" id="appointment">
        <div class="subNewEquipContainer">
            <p class="text1">5. Approving appointment</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer1">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/appointment-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Go to appointment icon and click it.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>Select one of the listed appointments youwant to approve.</p>
                    </div>
                </div>
                
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">3</p>
                    </div>

                    <div class="step">
                        <p>CLick on the "Approve" button below.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newEquipContainer" id="editProfile">
        <div class="subNewEquipContainer">
            <p class="text1">6. Profile editing</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer3">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/editProfile-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer1">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Click on the setting icon in sidebar.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>Click the "edit profile" and edit your personal information.</p>
                    </div>
                </div>
                
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">3</p>
                    </div>

                    <div class="step">
                        <p>Click on "Save" button to ensure future action works properly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newEquipContainer" id="changePass">
        <div class="subNewEquipContainer">
            <p class="text1">7. Change password</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer1">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/changePassword-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Select the "Change password" in your setting.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>Enter your current password and the new password, and confirm it.</p>
                    </div>
                </div>
                
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">3</p>
                    </div>

                    <div class="step">
                        <p>Click on the "Save" button to successfully change your password.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newEquipContainer" id="recycle">
        <div class="subNewEquipContainer">
            <p class="text1">8. restoring and Deleting recycle bin items</p>
        </div>

        <div class="imageContainer1"> 
            <div class="subImageContainer3">
                <div class="subImageContainer2">
                    <img class="image6" src="../assets/img/recycle-removebg-preview.png" alt="">
                </div>
            </div>

            <div class="stepContainer1">
                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">1</p>
                    </div>

                    <div class="step">
                        <p>Open the setting in the sidebar to view recycle bin items.</p>
                    </div>
                </div>

                <div class="subStepContainer">
                    <div class="numberContainer">
                        <p class="text1">2</p>
                    </div>

                    <div class="step">
                        <p>Click on "Restore" button to recover item, or "Delete" 
                           button to completely remove the item from the recycle bin.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- sidebar show -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-profile">
            <div class="subProfileContainer">
                <?php
                    if (!empty($userInfo['profile_img'])) {
                        echo '<img class="headerImg" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                    } else {
                        echo '<img class="headerImg" src="../assets/img/person-circle.png" alt="Mountain Placeholder">';
                    }
                ?>
            </div>
            <div class="user-info">
                <p class="userName" style="font-weight: bold;"><?php echo $userInfo['fullname'] ?? ''; ?></p>
                <p class="email"><?php echo $userInfo['email'] ?? ''; ?></p>
            </div>
            <button class="close-btn" onclick="toggleSidebar()">x</button>
        </div>

        <a href="../admin panel/userProfile.php?id=<?php echo $userID; ?>">
            <div class="profile-menu">
                <div class="profile-icon">
                    <img src="../assets/img/person-circle.png" alt=""> 
                </div> 
                <p>Your profile</p>
            </div>
        </a>

        <div class="logout-menu" onclick="showLogoutConfirmation()">
            <div class="logout-icon">
                <img src="../assets/img/logout.png" alt=""> 
            </div> 
            <p>Log out</p>
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

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
</body>
</html>