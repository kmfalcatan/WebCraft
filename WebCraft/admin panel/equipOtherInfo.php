<?php
    include('../dbConfig/dbconnect.php');

    $equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;

    $sql = "SELECT * FROM equipment WHERE equipment_ID = '$equipment_ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageFilename = $row['image'];
        $imageURL = "../uploads/" . $imageFilename;
        $user = $row['user'];
        $article = $row['article'];
        $deployment = $row['deployment'];
        $property_number = $row['property_number'];
        $account_code = $row['account_code'];
        $units = $row['units'];
        $unit_value = $row['unit_value'];
        $total_value = $row['total_value'];
        $remarks = $row['remarks'];
        $description = $row['description'];
    } else {
        // Equipment not found, handle the error here
        // You can redirect the user or display an error message
    }

    $conn->close();
?>

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
                                <img class="uploadImage" src="<?php echo $imageURL; ?>" alt="Mountain Placeholder">
                            </div>
                        </div>
                    </div>
    
                    <div class="infoContainer">
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="user" cols="30" rows="10" placeholder="User name:" readonly><?php echo $user; ?></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="article" cols="30" rows="10" placeholder="Article:" readonly><?php echo $article; ?></textarea>
                        </div>
                        
                        <div class="subInfoContainer">
                            <textarea class="inputInfo" name="deployment" cols="30" rows="10" placeholder="Deployment:" readonly><?php echo $deployment; ?></textarea>
                        </div>
    
                        <div class="subInfoContainer">
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="property_number" cols="30" rows="10" placeholder="Property number:" readonly><?php echo $property_number; ?></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="account_code" cols="30" rows="10" placeholder="Account code:" readonly><?php echo $account_code; ?></textarea>
                            </div>
    
                            <div class="subInputInfoContainer2">
                                <textarea class="inputInfo3" name="units" cols="30" rows="10" placeholder="Units:" readonly><?php echo $units; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="otherInfoContainer">
                    <div class="subOtherInfoContainer">
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="unit_value" cols="30" rows="10" placeholder="Unit value:" readonly><?php echo $unit_value; ?></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="total_value" cols="30" rows="10" placeholder="Total value:" readonly><?php echo $total_value; ?></textarea>
                        </div>
    
                        <div class="subInputInfoContainer2">
                            <textarea class="inputInfo3" name="remarks" cols="30" rows="10" placeholder="remarks:" readonly><?php echo $remarks; ?></textarea>
                        </div>
                    </div>
    
                    <div class="descriptionContainer">
                        <textarea class="inputInfo4" name="description" cols="30" rows="10" placeholder="Description:" readonly><?php echo $description; ?></textarea>
                    </div>
    
                    <!-- Temporary link -->
                    <div class="buttonsContainer">
                        <a href="updateEquip.php?equipment_ID=<?php echo $equipment_ID; ?>">
                            <button class="button"><a href="updateEquip.php?equipment_ID=<?php echo $equipment_ID; ?>">Update</a></button>
                        </a>
                        
                        <a href="../admin panel/warranty.php">
                            <button class="button">Check warranty</button>
                        </a>
                        
                        <a href="../admin panel/viewEquip.php">
                            <button class="button">Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>