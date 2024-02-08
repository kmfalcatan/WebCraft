<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../functions/signin.php';
}

$message = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/loginForm.css">
</head>
<body>
    <div class="container">
        <div class="subContainer">
            <div class="imageContainer">
                <img class="image" src="../assets/img/R.png" alt="">
                <div class="backgroundContainer">
                    <div class="paragraphContainer">
                        <p class="paragraph">Discover the power of efficient equipment management wiith MedEquip Tracker</p>
                    </div>

                    <div class="learnButtonContainer">
                        <button class="learnButton">
                            Learn more
                            <img class="image1" src="../assets/img/chevron-right (1).png" alt="">
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="logInFormContainer1">
                <div class="logoContainer">
                    <div class="nameContainer">
                        <p>MedEquip Tracker</p>
                    </div>
    
                    <div class="subLogoContainer">
                        <img class="logo" src="../assets/img/medLogo.png" alt="">
                    </div>
                </div>
    
            <form action="" method="POST">
                <div class="logInFormContainer">
                    <div class="subLogInFormContainer">
                        <div class="logIntextContainer">
                            <p class="logIntext">Sign in</p>
                        </div>
    
                        <?php
                        session_start();
                        if (isset($_SESSION['login_error'])) {
                            echo '<div id="alert" class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                            unset($_SESSION['login_error']);
                        }
                        ?>
                        
                        <div class="subLogInFormContainer1">
                            <div class="iconContainer">
                                <img class="icon" src="../assets/img/email.png" alt="">
                            </div>
    
                            <div class="inputContainer">
                                <input class="inputField" name="email" type="email" placeholder="E-mail" required>
                            </div>  
                        </div>
    
                        <div class="subLogInFormContainer1">
                            <div class="iconContainer">
                                <img class="icon" src="../assets/img/password.png" alt="">
                            </div>
    
                            <div class="inputContainer">
                                <input class="inputField" name="password" type="password" placeholder="Password" required>
                            </div>  
                        </div>
    
                        <div class="rememberMeContainer">
                            <input class="checkBox" type="checkbox">
                            <p class="rememberMe">Remember Me</p>
                        </div>
    
                        <div class="signInButtonContainer">
                            <button class="signInButton">Sign in</button>
                        </div>
    
                        <div class="forgotContainer">
                            <a class="forgot" href="">
                                <p>Forgot password?</p>
                            </a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/login.js"></script>
</body>
</html>