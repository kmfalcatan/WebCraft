<?php
session_start();

require_once '../dbConfig/dbconnect.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $stmt = $conn->prepare("SELECT fullname, profile_img, department FROM users WHERE role = 'user'");
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];

    while ($user = $result->fetch_assoc()) {
        $users[] = $user;
    }
} else {
    header("Location: login.php");
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

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/viewUSerEquip.css">
</head>
<body>
    <div class="container2">
        <div class="subContainer">
            <?php foreach ($users as $user): ?>
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
                        <p>Name: <?php echo $user['fullname']; ?></p>
                    </div>

                    <div class="subInfoContainer">
                        <p>User ID: </p>
                    </div>

                    <div class="subInfoContainer">
                        <p>Department: <?php echo $user['department']; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="tableContainer1">
                <div class="subTableContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>ARTICLE</th>
                                <th>DESCRIPTION</th>
                                <th>DEPLOYMENT</th>
                                <th>USER</th>
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
                            <tr>
                                <td>adasdasd</td>
                                <td>asdasdas</td>
                                <td>adasdasd</td>
                                <td>asdasdas</td>
                                <td>adasdasd</td>
                                <td>asdasdas</td>
                                <td>adasdasd</td>
                                <td>asdasdas</td>
                                <td>adasdasd</td>
                                <td>asdasdas</td>
                                <td class="actionContainer">
                                    <button class="action">View</button>
                                    <button class="action">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="buttonContainer">
            <a href="../admin panel/userAccount.php">
                <button>
                    Back
                </button>
            </a>
        </div>
    </div>
</body>
</html>