<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

$userID = isset($_GET['id']) ? $_GET['id'] : null; 

if ($userID !== null) {
   
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user !== null) { 
        $query = "SELECT * FROM equipment WHERE user = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $user['fullname']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $equipment = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $userID = isset($user['id']) ? date('Y') . '-' . str_pad($user['id'], 5, '0', STR_PAD_LEFT) : "";
    } else {

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/viewUSerEquip.css">
</head>
<body id="body">
    <div class="container2">
        <div class="topContainer" id="topContainer">
            <button class="backbtn" type="button" onclick="goBack()">
                <img src="../assets//img/left-arrow.png" style="width: 1.5rem; height: 1.5rem;" >
            </button>

            <img class="top-img" src="../assets/img/person-circle.png" alt="" >
            <h2>USER EQUIPMENT</h2>
        </div>

        <div class="subContainer">
            <div class="userInfoContainer">
                <div class="imageContainer">
                    <div class="subImageContainer3">
                        <?php if (!empty($user['profile_img'])): ?>
                            <img class="profile_img" src="../uploads/<?php echo $user['profile_img']; ?>" alt="">
                        <?php else: ?>
                            <img class="profile_img" src="../assets/img/pp_placeholder.png" alt="Placeholder">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="inforContainer">
                    <div class="subInfoContainer">
                        <p id="name"><?php echo isset($user['fullname']) ? $user['fullname'] : ""; ?></p>
                    </div>

                    <div class="subInfoContainer">
                        <p>ID: <?php echo $userID; ?></p>
                    </div>

                    <div class="subInfoContainer">
                        <p>Department: <?php echo isset($user['department']) ? $user['department'] : ""; ?></p>
                    </div>
                </div>
            </div>

            <div class="tableContainer1">
                <div class="subTableContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ARTICLE</th>
                                <!-- <th>DESCRIPTION</th>
                                <th>DEPLOYMENT</th>
                                <th>USER</th> -->
                                <th>PROPERTY NUMBER</th>
                                <th>ACCOUNT CODE</th>
                                <th>UNITS</th>
                                <th>UNIT VALUE</th>
                                <th>TOTAL VALUE</th>
                                <th>REMARKS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            <?php if (isset($equipment)): ?>
                                <?php $counter = 1; ?>
                                <?php foreach ($equipment as $item): ?>
                                    <tr>
                                        <td><?php echo $counter++; ?></td>
                                        <td><?php echo $item['article']; ?></td>
                                        <!-- <td><?php echo $item['description']; ?></td>
                                        <td><?php echo $item['deployment']; ?></td>
                                        <td><?php echo $item['user']; ?></td> -->
                                        <td><?php echo $item['property_number']; ?></td>
                                        <td><?php echo $item['account_code']; ?></td>
                                        <td><?php echo $item['units']; ?></td>
                                        <td><?php echo $item['unit_value']; ?></td>
                                        <td><?php echo $item['total_value']; ?></td>
                                        <td><?php echo $item['remarks']; ?></td>
                                        <td class="actionContainer">
                                            <a href="../admin panel/equipOtherInfo.php?equipment_ID={$row['equipment_ID']}&id={$userID}">
                                            <img src='../assets/img/view.png' alt='View' class='action-img'style='width: 2.5rem; height: 1.rem;'>
                                                                </a>
                                            <img src='../assets/img/trash.png' alt='View' class='action-img' style='width: 1.7rem; height: 1.7rem;'>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="buttonContainer">
        <button type="button" class="button" onclick="goBack()">Back</button>
        </div> -->
    </div>

        <script>
        function goBack() {
            window.history.back();
        }
        </script>
    <script src="../assets/js/theme/user-theme.js"></script>
</body>
</html>