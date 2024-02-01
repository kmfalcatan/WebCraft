<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../functions/signin.php';
}
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
    
                <div class="logInFormContainer">
                    <form action="" method="POST">
                    <div class="subLogInFormContainer">
                        <div class="logIntextContainer">
                            <p class="logIntext">Sign in</p>
                        </div>
    
                        <div class="subLogInFormContainer1">
                            <div class="iconContainer">
                                <img class="icon" src="../assets/img/user.png" alt="">
                            </div>
    
                            <div class="inputContainer">
                                <input class="inputField" name="user_name" type="text" placeholder="User name" required>
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
    
                    <div class="signUpContainer">
                        <div class="subSignUpContainer">
                            <p>Don't have an account?</p>
                        </div>
    
                        <div class="signUpButtonContainer">
                            <button class="signUpButton"><a href="../authentication/signup.php">Sign up</a></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
