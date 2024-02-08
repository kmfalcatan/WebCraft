<?php
    include('../dbConfig/dbconnect.php');

    $equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;

    $sql = "SELECT * FROM equipment WHERE equipment_ID = '$equipment_ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageFilename = $row['image'];
        $imageURL = "../uploads/" . $imageFilename;
        $article = $row['article'];
        $yearReceived = $row['year_received'];
        $remarks = $row['remarks'];
    } else {
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/viewEquip.css">
    <link rel="stylesheet" href="../assets/css/index.css">
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

    <div class="container1">
        <div class="subContainer">
            <a href="equipOtherInfo.php?equipment_ID=<?php echo $equipment_ID; ?>">
                <div class="subContainer1">
                    <div class="equipmentCoontainer">
                        <div class="imageContainer1">
                            <div class="subImageContainer1">
                                <img class="image3" src="<?php echo $imageURL; ?>" alt="">
                            </div>
                        </div>
        
                        <div class="infoContainer">
                            <div class="statusContainer">
                                <div class="subStatusContainer">
                                    <div class="status">
                                        <p class="subStatus">OLD</p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="subInfoContainer">
                                <p>Apparatus name: <?php echo $article; ?></p>
                            </div>
        
                            <div class="subInfoContainer">
                                <p>ID: <?php echo $yearReceived; ?></p>
                            </div>
        
                            <div class="subInfoContainer">
                                Status: <?php echo $remarks; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="buttonContainer">
            <a href="dashboard.php">
                <button class="button">
                    Back
                </button>
            </a>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/viewEquipt.js"></script>
</body>
</html>