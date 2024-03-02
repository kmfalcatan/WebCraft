<?php
include_once '../dbConfig/dbconnect.php';
include_once '../functions/header.php';
include_once '../authentication/auth.php';

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
                        <img src="../assets/img/system-name.png" alt="">
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

           
           <div class="topContainer" id="topContainer">
                <img class="top-img" src="../assets/img/person-circle.png" alt="" >
                <h2>USER LIST</h2>
            </div>
           <div class="userContainer" id="userContainer">
               <?php foreach ($users as $user): ?>
                    <div class="subUserContainer"  onclick="toggleSidebarAndProfile(this)" data-userid="<?php echo $user['id']; ?>">
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

            <div class="container2" id="profileContainer" >
                <button class="closeButton" onclick="closeProfileContainer()">Close</button>
                <img class="profile_img_circle" src="../uploads/<?php echo $user['profile_img']; ?>" alt="">
                <p id="name"><?php echo $user['fullname'] ?? ''; ?></p>
                <p id="id"><?php echo date("Y") . "-" . str_pad($user['id'], 4, "0", STR_PAD_LEFT) ?? ''; ?></p>
                <div class="infoContainer">
                    <div class="infoGroup">
                        <p><?php echo $user['username'] ?? ''; ?></p>
                        <p><?php echo $user['email'] ?? ''; ?></p>
                        <p><?php echo $user['contact'] ?? ''; ?></p>
                    </div>
                    <div class="infoGroup">
                        <p><?php echo $user['department'] ?? ''; ?></p>
                        <p><?php echo $user['address'] ?? ''; ?></p>
                        <p><?php echo $user['gender'] ?? ''; ?></p>
                    </div>
                </div>
                <a class="link" href="../admin panel/viewUserEquip.php?id=<?php echo $user['id']; ?>">View Equipment</a>
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
    <script>
        var users = <?php echo json_encode($users); ?>;
    </script>

    <script src="../assets/js/userAccount.js"></script>
</body>
</html>