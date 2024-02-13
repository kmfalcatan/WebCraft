<?php
include_once '../dbConfig/dbconnect.php';
include_once '../functions/header.php';

$sql = "SELECT * FROM users WHERE role = 'user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $users = array();

    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    $users = array();
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

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/userAccount.css">
</head>
<body id="body">
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

        <div class="container">
           <div class="searchBarContainer">
                <input class="searchBar" placeholder="Search..." type="text">
           </div>

           <h2>User Lists</h2>
           <div class="userContainer">
               <?php foreach ($users as $user): ?>
                <a class="link" href="../admin panel/viewUserEquip.php?id=<?php echo $user['id']; ?>">
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
                </a>
                <?php endforeach; ?>
            </div>

            <div class="addIcon">
                <div class="subAddIcon">
                    <a href="../admin panel/addUser.php?id=<?php echo $userID; ?>">
                        <button class="addButton" >Add user</button>
                    </a>
                 </div>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/theme/user-theme.js"></script>
</body>
</html>