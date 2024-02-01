<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../functions/signup.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/signUpForm.css">
</head>
<body>
    <div class="container">
        <div class="subContainer">
            
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
                    <!-- <?php if (isset($message)): ?>
                        <div class="alert alert-danger" style="color: rgb(244, 72, 24); font-size: 0.8rem; position:absolute; margin-top: 2rem;">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?> -->
                    <div class="subLogInFormContainer">
                        <div class="logIntextContainer">
                            <p class="logIntext">Sign Up</p>
                        </div>
    
                        <div class="subLogInFormContainer1">
                            <div class="iconContainer">
                                <img class="icon" src="../assets/img/user.png" alt="">
                            </div>
    
                            <div class="inputContainer">
                                <input class="inputField" name="fullname" type="text" placeholder="Full name" required>
                            </div>  
                        </div>
    
                        <div class="subLogInFormContainer1">
                            <div class="iconContainer">
                                <img class="icon" src="../assets/img/user.png" alt="">
                            </div>
    
                            <div class="inputContainer">
                                <input class="inputField" name="username" type="text" placeholder="User name" required>
                            </div>  
                        </div>
    
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
                                <input class="inputField" name="password" type="text" placeholder="Password" required>
                            </div>  
                        </div>
                        
                        <div class="subLogInFormContainer1">
                            <div class="iconContainer">
                                <img class="icon" src="../assets/img/password.png" alt="">
                            </div>
    
                            <div class="inputContainer">
                                <input class="inputField" name="confirm_password" type="text" placeholder="Confirm password" required>
                            </div>  
                        </div>
    
                        <div class="signInButtonContainer">
                            <button class="signInButton">Sign Up</button>
                        </div>
                    </div>
    
                    <div class="signUpContainer">
                        <div class="subSignUpContainer">
                            <p>Already have an account?</p>
                        </div>
    
                        <div class="signUpButtonContainer">
                            <a href="../authentication/login.html">
                                <button class="signUpButton">Sign in</button>
                            </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>

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
        </div>
    </div>
</body>
</html>