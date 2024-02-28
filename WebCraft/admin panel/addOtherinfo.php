<?php
include_once "../functions/saveOtherinfo.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

$equipment_ID = $_SESSION['equipment_ID'] ?? null;

if (!$equipment_ID) {
    echo "Error: equipment_ID is not set.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/addOtherInfor.css">
</head>
<body>

<form action="../functions/saveOtherinfo.php" enctype="multipart/form-data" method="POST" id="Form2">
    <div class="container">
        <div class="subContainer" id="subContainer">
            <div class="textContainer">
                <p class="text">Warranty</p>
            </div>

            <div class="warrantyContainer">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <img class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">
                    </div>

                    <input type="hidden" name="equipment_ID" value="<?php echo $equipment_ID; ?>">

                    <div class="uploadButtonContainer">
                        <input class="uploadButton" name="warranty_image" type="file" required>
                    </div>
                </div>

                <div class="subWarrantyContainer">
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="warranty_start" type="date" placeholder="Start warranty:" required>
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="warranty_end" type="date" placeholder="End warranty:" required>
                    </div>
                </div>
            </div>

            <div class="budgetContainer">
                <div class="textContainer">
                    <p  class="text">Budget</p>
                </div>

                <div class="subBudgetContainer">
                    <input class="budget" name="budget" type="text" placeholder="Budget:" required>
                </div>
            </div>

            <div class="howToUseContainer">
                <div class="textContainer">
                    <p class="text">How to use</p>
                </div>

                <div class="subHowToUseContainer">
                    <textarea class="inputHowToUse" name="instruction" cols="30" rows="10" placeholder="How to use:" required></textarea>
                </div>
            </div>
        </div>

        <div class="buttonContainer">
            <button class="button" name="submit_form2" >Add to inventory</button>
            <a href="../admin panel/addEquip.html?id=<?php echo $userID; ?>">
                <button type="button" class="button">Back</button>
            </a>
        </div>
    </div>
</form>

 <script src="../assets/js/uploadImg.js"></script>
</body>
</html>