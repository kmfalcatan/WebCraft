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
                        <img class="image" src="/WebCraft/assets/img/medLogo.png" alt="">
                    </div>

                    <div class="nameContainer">
                        <p class="companyName">MedEquip Tracker</p>
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
                            <a class='profile' href='../admin panel/dashboard.php'>
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

    <form action="../functions/saveEquip.php" enctype="multipart/form-data" method="post"  id="equipForm">
        <div class="container3">
            <div class="subContainer2">
                <div class="imageContainer1">
                    <div class="subImageContainer1">
                        <div class="uploadImageContainer">
                            <div class="subUploadImageContainer">
                                <img class="uploadImage" src="/WebCraft/assets/img/img_placeholder.jpg" alt="Mountain Placeholder">
                            </div>
                        </div>
        
                        <div class="uploadButtonContainer">
                            <input class="uploadButton" name="image" type="file" name="image" required>
                        </div>
                    </div>
    
                    <div class="infoContainer">
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="user" cols="30" rows="10" placeholder="User name:" required></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="article" cols="30" rows="10" placeholder="Article:" required></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="deployment" cols="30" rows="10" placeholder="Deployment:" required></textarea>
                        </div>
    
                        <div class="subInfoContainer">
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="property_number" cols="30" rows="10" placeholder="Property number:" required></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="account_code" cols="30" rows="10" placeholder="Account code:" required></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="units" cols="30" rows="10" placeholder="Units:" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="otherInfoContainer">
                    <div class="subOtherInfoContainer">
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="unit_value" cols="30" rows="10" placeholder="Unit value:" required></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="total_value" cols="30" rows="10" placeholder="Total value:" required></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="remarks" cols="30" rows="10" placeholder="remarks:" required></textarea>
                        </div>
                    </div>
    
                    <div class="descriptionContainer">
                        <textarea class="inputInfo4" name="description" cols="30" rows="10" placeholder="Description:" required></textarea>
                    </div>

                    <div class="dropdownContainer">
                        <label for="year">Year:</label>
                        <select id="year" name="year_received" class="yearDropdown" required>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
    
                    <div class="addEquipButtonContainer">
                        <button class="addEquipButton" name="submit_form1" id="addEquipButton"> <a href="../admin panel/addOtherinfo.php">Add other information</a></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="/WebCraft/assets/js/dashboard.js"></script>
    <script src="/WebCraft/assets/js/uploadImg.js"></script>
</body>
</html>