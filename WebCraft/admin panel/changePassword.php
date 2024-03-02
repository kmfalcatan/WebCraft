<?php
include_once "../authentication/auth.php";
include_once "../functions/header.php";
include_once "../functions/changePassword.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/changePassword.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
</head>
<body>

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
    </div>

    <div class="container">
        <div class="topContainer">
            <img class="top-img" src="../assets/img/change-password-icon-clipart-7-removebg-preview.png" alt="" >
            <h2>CHANGE PASSWORD</h2>
        </div>
        <div class="subContainer1">
            <form method="POST">
                <div id="alert">
                    <?php
                        if (isset($error_message)) {
                            echo "<div class='error-message'>$error_message</div>";
                        }
                        if (isset($success_message)) {
                            echo "<div class='success-message'>$success_message</div>";
                        }
                    ?>
                </div>
           
                <div class="inputPassContainer">
                    <input type="password" name="old_password" placeholder="Old password" required>
                </div>

                <div class="inputPassContainer">
                    <input type="password" name="new_password" placeholder="New password" required>
                </div>

                <div class="inputPassContainer">
                    <input type="password" name="confirm_password" placeholder="Confirm password" required>
                </div>

                <div class="inputPassContainer">
                    <button type="submit" class="button">Save</button>
                    <a href="../admin panel/setting.php?id=<?php echo $userID; ?>">
                        <button type="button" class="button">Back</button>
                    </a>
                </div>
            </form>
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
                <p class="userName"><?php echo $userInfo['fullname'] ?? ''; ?></p>
                <p class="email"><?php echo $userInfo['email'] ?? ''; ?></p>
            </div>
            <button class="close-btn" onclick="toggleSidebar()" style="left: 40%;">x</button>
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

    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
</body>
</html>
