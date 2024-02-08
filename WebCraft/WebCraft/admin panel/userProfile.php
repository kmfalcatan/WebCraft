<?php
include('../dbConfig/dbconnect.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

function getUserInfo($conn, $id) {
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; 
    }
}

$userInfo = getUserInfo($conn, $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/addOtherInfor.css">
    <link rel="stylesheet" href="../assets/css/editProfile.css">
</head>
<body>
    <div class="container">
        <div class="subContainer">
            <div class="textContainer">
                <p class="text">Profile</p>
            </div>

            <form class="warrantyContainer1" method="POST"  action="../admin panel/editProfile.php?id=<?php echo $id; ?>">
                
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <?php
                            if (!empty($userInfo['profile_img'])) {
                                echo '<img class="uploadImage" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                            } else {
                                echo '<img class="uploadImage" src="../assets/img/img_placeholder.jpg" alt="Mountain Placeholder">';
                            }
                        ?>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                </div>
                <div class="subWarrantyContainer">
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="fullname" type="text" placeholder="Full name" value="<?php echo $userInfo['fullname'] ?? ''; ?>" readonly>
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="email" type="email" placeholder="Email" value="<?php echo $userInfo['email'] ?? ''; ?>" readonly>
                    </div>
                    
                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="contact" type="number" placeholder="Contact no." value="<?php echo $userInfo['contact'] ?? ''; ?>" readonly>
                    </div>

                    <div class="startWarrantyContainer">
                        <input class="startWarranty" name="department" type="text" placeholder="department" value="<?php echo $userInfo['department'] ?? ''; ?>" readonly>
                    </div>
                </div>

                <div class="buttonContainer1">
                    <a href="../admin panel/edrritProfile.php?id=<?php echo $id; ?>">
                        <button class="button"><a href="../admin panel/editProfile.php?id=<?php echo $id; ?>">Edit</a></button>
                    </a>
                    <a href="../admin panel/dashboard.php">
                        <button class="button">Back</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

 <script src="../assets/js/uploadImg.js"></script>
</body>
</html>