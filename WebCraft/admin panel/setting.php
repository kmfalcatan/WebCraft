<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/setting.css">
</head>

<body>
    <div class="container">
        <div class="subContainer">
            <div class="buttonContainer">
                <a href="../admin panel/userProfile.php">
                    <button>Edit profile</button>
                </a>
            </div>

            <div class="buttonContainer">
                <a href="../admin panel/changePassword.php">
                    <button>Change password</button>
                </a>
            </div>

            <div class="buttonContainer">
                <a href="../admin panel/recycle.php">
                    <button>Recycle</button>
                </a>
            </div>

            <div class="buttonContainer">
                <button onclick="showLogoutConfirmation()">Log out</button>
            </div>

            <div class="buttonContainer">
                <a href="../admin panel/dashboard.php">
                    <button>Back</button>
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
            window.location.href = "../authentication/login.php";
        }
    </script>

</body>

</html>