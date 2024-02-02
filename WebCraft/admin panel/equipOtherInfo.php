<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/addEquip.css">
</head>
<body>
    <div class="container2">
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
        </div>
    </div>

    <form class="subContainer3" action="" enctype="multipart/form-data" method="post">
        <div class="container3">
            <div class="subContainer2">
                <div class="imageContainer1">
                    <div class="subImageContainer1">
                        <div class="uploadImageContainer">
                            <div class="subUploadImageContainer">
                                <img class="uploadImage" src="" alt="">
                            </div>
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
    
                    <div class="buttonsgitContainer">
                        <a href="../admin panel/updateEquip.php">
                            <button class="addEquipButton1" type="submit">Update</button>
                        </a>

                        
                        <a href="../admin panel/warranty.php">
                            <button class="addEquipButton1" type="submit">Check warranty</button>
                        </a>

                        
                        <a href="viewEquip.php">
                            <button class="addEquipButton1" type="submit">Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>