<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

if (isset($_GET['unit_ID'])) {
    $unit_ID = $_GET['unit_ID'];

    $query = "SELECT unit_ID, equipment_ID, equipment_name, user FROM units WHERE unit_ID = '$unit_ID'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $unitRow = mysqli_fetch_assoc($result);

        $unit_ID = $unitRow['unit_ID'];
        $equipment_ID = $unitRow['equipment_ID'];
        $equipment_name = $unitRow['equipment_name'];
        $user = $unitRow['user'];

        $unitPrefix = 'UNIT';
        $defaultUnitID = '0000';
        $formattedUnitID = $unitPrefix . '-' . str_pad($unit_ID, strlen($defaultUnitID), '0', STR_PAD_LEFT);

        $userQuery = "SELECT id FROM users WHERE fullname = '$user'";
        $userResult = mysqli_query($conn, $userQuery);

        if ($userResult && mysqli_num_rows($userResult) > 0) {
            $userRow = mysqli_fetch_assoc($userResult);
            $user_ID = $userRow['id'];
        }

        $equipmentQuery = "SELECT image, description, property_number, account_code, deployment FROM equipment WHERE equipment_ID = '$equipment_ID'";
        $equipmentResult = mysqli_query($conn, $equipmentQuery);

        if ($equipmentResult && mysqli_num_rows($equipmentResult) > 0) {
            $equipmentRow = mysqli_fetch_assoc($equipmentResult);

            $image_url = $equipmentRow['image'];
            $description = $equipmentRow['description'];
            $property_number = $equipmentRow['property_number'];
            $account_code = $equipmentRow['account_code'];
            $deployment = $equipmentRow['deployment'];
        } else {
            echo "Equipment not found!";
            exit;
        }
    } else {
        echo "Unit not found!";
        exit;
    }
} else {
    echo "Missing unit_ID parameter in the URL!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
    <link rel="stylesheet" href="../assets/css/approveReport.css">
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
                        <img class="medName" src="../assets/img/system-name.png" alt="">
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer" id="profileContainer">
                        <?php
                            if (!empty($userInfo['profile_img'])) {
                                echo '<img class="headerImg" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                            } else {
                                echo '<img class="headerImg" src="../assets/img/person-circle.png" alt="Mountain Placeholder">';
                            }
                        ?> 
                        </div>

                        <div class="subProfileContainer">
                        <div class='menubarContainer' onclick='toggleMenu(this)'>
                            <div class='line'></div>
                            <div class='line'></div>
                            <div class='line'></div>
                        </div>
                        <p class="adminName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
            <?php include('sidebar.php'); ?>
        </div>
    </div>

    <div class="container2">
        <div class="subContainer2">
            <div class="headerContainer2">
                <a href="../admin panel/reportList.php?id=<?php echo $userID; ?>">
                    <div class="backContainer">
                        <img class="image3" src="../assets/img/left-arrow.png" alt="">
                    </div>
                </a>

                <div class="iconContainer">
                    <div class="subIconContainer">
                        <img src="../assets/img/remove.png" alt="" style="width: 2.1rem; height: 2.1rem;">
                    </div>

                    <div class="textContainer10">
                        <p>REMOVE UNIT</p>
                    </div>
                </div>
            </div>

            <form class="infoContainer" action="../functions/removeUnit.php" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="user_ID" value="<?php echo $user_ID ?>">

                <div class="subInfoContainer">
                    <div class="imageContainer2">
                        <div class="subImageContainer2" style="border: 1px solid rgb(2, 116, 200)">
                            <?php if (!empty($image_url)): ?>
                                <img class="image8" src="../uploads/<?php echo $image_url; ?>" alt="">
                            <?php else: ?>
                                <img class="image8" src="../assets/img/img_placeholder.jpg" alt="">
                            <?php endif; ?>
                        </div>

                        <div class="equipNameContainer">
                            <input type="text" class="article" name="article" value="<?php echo $equipment_name; ?>" readonly>
                        </div>
                    </div>

                    <div class="equipInfoContainer">
                        <div class="subEquipInfoContainer">
                            <div class="userContainer">
                                <p class="user">User</p>
                            </div>

                            <div class="subUserContainer">
                                <input type="text" class="userName2" name="fullname" value="<?php echo $user; ?>" readonly>
                            </div>
                        </div>

                        <div class="subEquipInfoContainer">
                            <div class="userContainer">
                                <p class="user">Deployment</p>
                            </div>

                            <div class="subUserContainer">
                                <div class="userName2">
                                    <?php echo $deployment; ?>
                                </div>
                            </div>
                        </div>

                        <div class="subEquipInfoContainer1">
                            <div class="subEquipInfoContainer">
                                <div class="userContainer">
                                    <p class="user">Property number</p>
                                </div>
    
                                <div class="subUserContainer">
                                    <div class="userName2">
                                        <?php echo $property_number; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="subEquipInfoContainer">
                                <div class="userContainer">
                                    <p class="user">Account code</p>
                                </div>
    
                                <div class="subUserContainer">
                                    <div class="userName2">
                                        <?php echo $account_code; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="descriptionContainer">
                    <div class="description">
                        <p class="user">Description</p>
                    </div>

                    <div class="subDescriptionContainer">
                        <div class="userName2">
                            <?php echo $description; ?>
                        </div>
                    </div>
                </div>

                <div class="unitContainer">
                    <div class="textContainer">
                        <p>UNITS REPORTED</p>
                    </div>

                        <div class="subUnitContainer">
                            <div class="unitNumberContainer">
                                <input type="text" class="unitID" name="unit_ID" value="<?php echo $formattedUnitID; ?>">
                            </div>

                            <div class="unitNumberContainer1">
                                <div class="issueContainer">
                                    <p class="user">Issue</p>
                                </div>

                                <div class="subUserContainer">
                                    <select class="userName2" name="unit_issue">
                                        <option value="" disabled selected>Select issue</option>
                                        <option value="Lost">Lost</option>
                                        <option value="For Return">For Return</option>
                                    </select>
                                </div>
                            </div>

                            <div class="unitNumberContainer1">
                                <div class="issueContainer">
                                    <p class="user">Problem description</p>
                                </div>

                                <div class="subUserContainer">
                                    <input type="text" class="userName2" name="problem_desc" >
                                </div>
                            </div>
                        </div>
                </div>

                <div class="buttonContainer">
                    <button class="button" type="submit" name="approve">Remove</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
