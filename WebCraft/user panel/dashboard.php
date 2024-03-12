<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";

$fullName = isset($_GET['fullname']) ? $_GET['fullname'] : null;

$sql = "SELECT * FROM equipment";
if ($fullName) {
  $sql .= " WHERE user LIKE '%$fullName%'";
}

$result = $conn->query($sql);
$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
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
                        <img src="../assets/img/system-name.png" alt="">
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
                        <p class="userName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
            <?php include('sidebar.php'); ?>
        </div>

        <div class="container">
           <div class="searchBarContainer">
                <input class="searchBar" type="text" id="searchInput" placeholder="Search..." oninput="liveSearch()">
           </div>

           <div class="filterContainer">
                <div class="subFilterContainer">
                    <div class="sortContainer">
                        <img class="sort" src="../assets/img/th (2).jpg" alt="">
                    </div>

                    <div class="filter" onclick="filterByYear('all')">
                        <p class="year">All</p>
                    </div>

                    <div class="filter" onclick="filterByYear(2024)">
                        <p class="year">2024</p>
                    </div>

                    <div class="filter" onclick="filterByYear(2023)">
                        <p class="year">2023</p>
                    </div>

                    <div class="filter" onclick="filterByYear(2022)">
                        <p class="year">2022</p>
                    </div>

                    <div class="med-icon">
                        <h1>+</h1>
                    </div>

                </div>
           </div>

           <div class="tableContainer">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ARTICLE</th>
                            <th>PROPERTY NUMBER</th>
                            <th>ACCOUNT CODE</th>
                            <th>UNITS</th>
                            <th>UNIT VALUE</th>
                            <th>TOTAL VALUE</th>
                            <th>REMARKS</th>
                            <th colspan="4">VIEW</th>
                        </tr>
                    </thead>

                    <tbody id="tblBody">
                    </tbody>
                </table>
           </div>
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-profile">
            <div class="subProfileContainer">
                <?php
                    if (!empty($userInfo['profile_img'])) {
                        echo '<img class="headerImg" src="../uploads/' . $userInfo['profile_img'] . '" alt="Profile Image">';
                    } else {
                        echo '<img class="headerImg" src="../assets/img/person-circle.png" alt="Mountain Placeholder">';
                    }
                ?>
            </div>
            <div class="user-info">
                <p class="userName"><?php echo $userInfo['fullname'] ?? ''; ?></p>
                <p class="email"><?php echo $userInfo['email'] ?? ''; ?></p>
            </div>
            <button class="close-btn" onclick="toggleSidebar()">x</button>
        </div>

        <a href="../user panel/userProfile.php?id=<?php echo $userID; ?>">
            <div class="profile-menu">
                <div class="profile-icon">
                    <img src="../assets/img/person-circle.png" alt=""> 
                </div> 
                <p>Your profile</p>
            </div>
        </a>

        <div class="logout-menu" onclick="showLogoutConfirmation()">
            <div class="logout-icon">
                <img src="../assets/img/logout.png" alt=""> 
            </div> 
            <p>Log out</p>
        </div>
    </div>

    <div id="logoutConfirmation" class="popupContainer">
        <div class="popupContent">
            <p>Are you sure you want to log out?</p>
            <div class="popupButtons">
                <button onclick="logout()">Yes</button>
                <button onclick="hideLogoutConfirmation()">No</button>
            </div>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
</body>
</html>