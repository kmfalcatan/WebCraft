<?php
    include_once "../authentication/auth.php";
    include_once "../functions/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/newSetting.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
</head>
<body>
    <div class="container">
        <div class="headerContainer">
            <a href="../user panel/dashboard.php?id=<?php echo $userID; ?>">
                <div class="backContainer">
                    <img class="backIcon" src="../assets/img/left-arrow.png" alt="">
                </div>
            </a>

            <div class="settingContainer">
                <div class="backContainer">
                    <img class="setting" src="../assets/img/setting-blue.png" alt="">
                </div>

                <div class="settingText">
                    <p>SETTING</p>
                </div>
            </div>
        </div>

        <div class="subContainer">
            <div class="settingContainer1">
                <a href="../user panel/userProfile.php?id=<?php echo $userID; ?>">
                    <div class="subSettingContainer1">
                        <div class="imageContainer">
                            <img class="image1" src="../assets/img/profile-blue.png" alt="">
                        </div>

                        <div class="textContainer">
                            <p>View and edit personal 
                                information.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="settingContainer1">
                <a href="../user panel/changePassword.php?id=<?php echo $userID; ?>">
                    <div class="subSettingContainer1">
                        <div class="imageContainer">
                            <img class="image1" src="../assets/img/pass-blue.png" alt="">
                        </div>

                        <div class="textContainer">
                            <p>Update password
                                for enhanced security.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="settingContainer1">
                <a href="../user panel/bin.php?id=<?php echo $userID; ?>">
                    <div class="subSettingContainer1">
                        <div class="imageContainer">
                            <img class="image1" src="../assets/img/recycle-blue.png" alt="">
                        </div>

                        <div class="textContainer">
                            <p>View and restore repaired 
                                or found items.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="settingContainer1">
                <div class="subSettingContainer1" onclick="showLogoutConfirmation()" id="btn4">
                    <div class="imageContainer">
                        <img class="image1" src="../assets/img/signout-blue.png" alt="">
                    </div>

                    <div class="textContainer">
                        <p>Log out</p>
                    </div>
                </div>
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
</body>
</html>