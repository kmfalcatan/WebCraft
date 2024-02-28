<?php
include_once "../authentication/auth.php";
include_once "../functions/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
</head>

<body id="body">
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
    </div>

    <div class="container">
        <div class="subContainer">
            <div class="buttonContainer">
                <a href="../admin panel/userProfile.php?id=<?php echo $userID; ?>">
                    <button id="btn1">Edit profile</button>
                </a>
            </div>

            <div class="buttonContainer">
                <a href="../admin panel/changePassword.php?id=<?php echo $userID; ?>">
                    <button id="btn2">Change password</button>
                </a>
            </div>

            <div class="buttonContainer">
                <a href="../admin panel/recycle.php?id=<?php echo $userID; ?>">
                    <button id="btn3">Recycle</button>
                </a>
            </div>

            <div class="buttonContainer">
                <button onclick="showLogoutConfirmation()" id="btn4">Log out</button>
            </div>

            <div class="buttonContainer">
                <a href="../admin panel/dashboard.php?id=<?php echo $userID; ?>">
                    <button id="btn5">Back</button>
                </a>
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

    <script>
        function showLogoutConfirmation() {
            document.getElementById("logoutConfirmation").style.display = "block";
        }

        function hideLogoutConfirmation() {
            document.getElementById("logoutConfirmation").style.display = "none";
        }

        function logout() {
            window.location.href = "../functions/logout.php";
        }
    </script>

    <script src="../assets/js/theme/setting.js"></script>
</body>
</html>