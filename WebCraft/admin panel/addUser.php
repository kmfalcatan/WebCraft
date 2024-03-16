<?php 
 include_once "../functions/adduser.php";
 include_once "../authentication/auth.php";
 include_once "../dbConfig/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>
    
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/addUser.css">
</head>
<body id="body">
    <div class="container" style="margin-top: 0;">
        
        <form class="subContainer1" action="../functions/adduser.php" method="POST" onsubmit="return validateForm()">

            <div class="inputContainer">
                <input type="text" name="fullname" placeholder="Full Name" required>
            </div>

            <div class="inputContainer">
                <input type="email" name="email" placeholder="New E-mail" required>
            </div>

            <div class="inputContainer">
                <input type="email" name="current_email" placeholder="Current E-mail" required>
            </div>

            <div class="inputContainer">
                <input type="password" name="password" placeholder="Default password" required>
            </div>

            <div class="inputContainer">
                <input type="password" name="confirmPassword" placeholder="Confirm password" required>
            </div>

            <div class="inputContainer">
                <select name="role" id="role" required>
                    <option value="" disabled selected hidden>Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="buttonContainer">
                <button type="submit" class="button" name="submit">Add user</button>
                <a href="../admin panel/userAccount.php?id=<?php echo $userID; ?>">
                    <button type="button" class="button" id="btn2">Cancel</button>
                </a>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var password = document.getElementsByName('password')[0].value;
            var confirmPassword = document.getElementsByName('confirmPassword')[0].value;

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
        }
    </script>
    <script src="../assets/js/theme/user-theme.js"></script>
</body>
</html>
