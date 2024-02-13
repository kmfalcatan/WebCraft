<?php
include_once "../authentication/auth.php";
include_once "../functions/changePassword.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/changePassword.css">
</head>
<body>
    <div class="container">
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

    <script src="../assets/js/login.js"></script>
</body>
</html>
