<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/WebCraft/assets/css/index.css">
    <link rel="stylesheet" href="/WebCraft/assets/css/addEquip.css">
</head>
<body>
    <div class="container2">
        <div class="headerContainer">
            <div class="subHeaderContainer">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <img class="image" src="/WebCraft/assets/img/417914173_1061244888319690_1028014099293182518_n-removebg-preview.png" alt="">
                    </div>

                    <div class="nameContainer">
                        <p class="companyName">MedEquip tracker</p>
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer">
                        <img class="image1" src="/WebCraft/assets/img/person-circle.png" alt="">
                    </div>

                    <div class="subProfileContainer">
                        <div class='menubarContainer' onclick='toggleMenu(this)'>
                            <div class='line'></div>
                            <div class='line'></div>
                            <div class='line'></div>
                        </div>

                        <p class="adminName">Admin</p>
                    </div>
                </div>
            </div>

            <div class='sideNavBarContainer'>
                <div class='sideNavBar1'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            New Equipment
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/th-removebg-preview.png" alt="">
                        <img class="image5" src="/WebCraft/assets/img/plus-circle.png" alt="">
                    </div>
                </div>
        
                <div class='sideNavBar'>
                        <div class="subSideNavBar">
                            <a class='profile' href='/WebCraft/admin panel/dashboard.html'>
                                Inventory
                            </a>
                        </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/file-text-circle.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Users
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/person-circle.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Budget
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/th__1_-removebg-preview.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Appointment
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/calendar.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Help
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/question-circle (2).png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            About
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image4" src="/WebCraft/assets/img/about-us-icon-3.jpg" alt="">
                    </div>
                </div>
                <div class='sideNavBar2'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Setting
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/vector-settings-icon-removebg-preview.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container3">
        <form action="../functions/saveEquip.php" enctype="multipart/form-data" method="post">
            <div class="subContainer2">
                <div class="imageContainer1">
                    <div class="subImageContainer1">
                        <div class="uploadImageContainer">
                            <div class="subUploadImageContainer">
                                <img class="uploadImage" src="" alt="">
                            </div>
                        </div>
        
                        <div class="uploadButtonContainer">
                            <input class="uploadButton" name="image" type="file" name="image">
                        </div>
                    </div>
    
                    <div class="infoContainer">
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="user_name" cols="30" rows="10" placeholder="User name:"></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="article" cols="30" rows="10" placeholder="Article:"></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="description" cols="30" rows="10" placeholder="Description:"></textarea>
                        </div>
    
                        <div class="subInfoContainer">
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="property_number" cols="30" rows="10" placeholder="Property number:"></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="account_code" cols="30" rows="10" placeholder="Account code:"></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="units" cols="30" rows="10" placeholder="Units:"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="otherInfoContainer">
                    <div class="subOtherInfoContainer">
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="unit_value" cols="30" rows="10" placeholder="Unit value:"></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="total_value" cols="30" rows="10" placeholder="Total value:"></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="remarks" cols="30" rows="10" placeholder="remarks:"></textarea>
                        </div>
                    </div>
    
                    <div class="descriptionContainer">
                        <textarea class="inputInfo4" name="other_information" cols="30" rows="10" placeholder="Description:"></textarea>
                    </div>
    
                    <div class="addEquipButtonContainer">
                        <a href="../adminPanel/addOtherinfor.html">
                            <button class="addEquipButton" type="submit">Add other information</button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="/WebCraft/assets/js/dashboard.js"></script>
</body>
</html>