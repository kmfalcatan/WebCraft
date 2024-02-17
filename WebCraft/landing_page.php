<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/landing.css">
</head>
<body>
    <div class="headerContainer">
        <div class="logoContainer">
            <div class="subLogoContainer">
                <img class="logo" src="assets/img/medLogo.png" alt="">
            </div>

            <div class="nameContainer">
                <p>MedEquip Tracker</p>
            </div>
        </div>

        <div class="buttonContainer">
            <div class="subButtonContainer">
                <button id="btn1"><a class="button1" href="about.php">About</a></button>
            </div>

            <div class="subButtonContainer">
                <button id="btn2"><a class="button2"  href="">Contact</a></button>
            </div>

            <div class="subButtonContainer">
                <button id="btn3"><a class="button3" href="authentication/login.php">Sign<span style="margin-left: 0.2rem;">in</span></a></button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="subContainer" id="subContainer">
            <div class="textContainer">
                <div class="settingContainer">
                    <div class="subSettingContainer" onclick="toggleColorContainer()">
                        <img class="setting" src="assets/img/setting-2.svg" alt="">
                    </div>

                    <div class="colorContainer" id="colorContainer">
                        <div class="colorOptions" id="colorOptions">
                        <ul>
                            <li class="color radial-gradient" style="background-image: radial-gradient(rgb(255, 252, 0, 0.7), rgb(231, 139, 0));" onclick="changeColor('radial-gradient(rgb(255, 252, 0, 0.7), rgb(231, 139, 0))')"></li>
                            <li class="color" style="background-color: #bfd5db;" onclick="changeColor('#bfd5db')"></li>
                            <li class="color" style="background-color: #b80f0A;" onclick="changeColor('#b80f0A')"></li>
                            <li class="color" style="background-color: #f0f0f0;" onclick="changeColor('#f0f0f0')"></li>
                        </ul>
                        </div>
                    </div>
                </div>

                <div class="welcomeContainer">
                    <div class="subWelcomeContainer">
                        <p>Welcome to MedEquip Tracker!</p>
                    </div>
                </div>
                
                <div class="paragraphContainer">
                    <div class="subParagraphContainer">
                        <p>Simplify and enhance the efficient tracking and management of medical equipment</p>
                    </div>
                </div>

                <div class="viewContainer">
                    <div class="subViewContainer">
                        <a href="guest panel/guest.php">
                            <button class="viewButton">View inventory</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="imageContainer">
                <div class="subImageContainer">
                    <img class="image" src="assets/img/banner_image_2.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/theme/main.js"></script>
</body>
</html>