
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/userAccount.css">
</head>
<body>
    <div class="container1">
        <div class="headerContainer">
            <div class="subHeaderContainer">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <img class="image" src="../assets/img/medLogo.png" alt="">
                    </div>

                    <div class="nameContainer">
                        <p class="companyName">MedEquip Tracker</p>
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer">
                        <img class="image1" src="../assets/img/person-circle.png" alt="">
                    </div>
                </div>
            </div>

            <<?php include('sidebar.php'); ?>
        </div>

        <div class="container">
           <div class="searchBarContainer">
                <input class="searchBar" placeholder="Search..." type="text">
           </div>

           <div class="userContainer">
                <a class="link" href="../admin panel/viewUserEquip.php">
                    <div class="subUserContainer">
                        <div class="imageContainer2">
                            <div class="subImageContainer2">
                                <img class="image6" src="" alt="">
                            </div>
                        </div>
                        
                        <div class="nameContainer1">
                            <p>User's Name:</p>
                        </div>
                    </div>
                </a>
                <div class="addIcon">
                    <span>+</span>
                </div>
            </div>
        </div>
    </div>
    


    <script src="../assets/js/dashboard.js"></script>
</body>
</html>