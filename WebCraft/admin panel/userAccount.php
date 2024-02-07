<?php
session_start();

require_once '../dbConfig/dbconnect.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $stmt = $conn->prepare("SELECT fullname, profile_img FROM users WHERE role = 'user'");
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
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/userAccount.css">
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
                        <p class="companyName">MedEquip Tracker</p>
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer">
                        <img class="image1" src="../assets/img/person-circle.png" alt="">
                    </div>
                </div>
            </div>

            <?php include('sidebar.php'); ?>
        </div>

        <div class="container">
           <div class="searchBarContainer">
                <input class="searchBar" placeholder="Search..." type="text">
           </div>

           <h2>User Lists</h2>
           <div class="userContainer">
                <a class="link" href="../admin panel/viewUserEquip.php">
                    <?php foreach ($users as $user): ?>
                        <div class="subUserContainer">
                            <div class="imageContainer2">
                                <div class="subImageContainer2">
                                    <?php if (!empty($user['profile_img'])): ?>
                                        <img class="profile_img" src="../uploads/<?php echo $user['profile_img']; ?>" alt="">
                                    <?php else: ?>
                                        <img class="profile_img" src="../assets/img/pp_placeholder.png" alt="Placeholder">
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="nameContainer1">
                                <p><?php echo $user['fullname']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </a>
            </div>

            <div class="addIcon">
                <div class="subAddIcon">
                     <a href="../admin panel/addUser.php">
                     <img src="../assets/img/plus.png" alt="">
                    </a>
                 </div>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>