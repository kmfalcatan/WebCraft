<?php
include_once '../dbConfig/dbconnect.php';
include_once '../functions/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/budget.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">

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

        <div class="container">
           <div class="searchBarContainer">
                <input class="searchBar" placeholder="Search..." type="text">
           </div>

           <div class="filterContainer">
                <div class="subFilterContainer">
                    <div class="sortContainer">
                        <img class="sort" src="../assets/img/th (2).jpg" alt="">
                    </div>

                    <div class="filter" onclick="changeColor(this)">
                        <p class="year">2024</p>
                    </div>

                    <div class="filter" onclick="changeColor(this)">
                        <p class="year">2023</p>
                    </div>

                    <div class="filter" onclick="changeColor(this)">
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
                            <th>EQUIPMENT IMAGE</th>
                            <th>EQUIPMENT NAME</th>
                            <th>BUDGET FOR</th>
                            <th>DATE APPROVED</th>
                            <th>BUDGET</th>
                            <th>UNIT</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $query = "SELECT * FROM approved_requests";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $count = 1; 
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$count}</td>";
                                echo "<td><img src='../uploads/{$row['equip_img']}' alt='Equipment Image' width='100' height='100'></td>";
                                echo "<td>{$row['equipment_name']}</td>";
                                echo "<td>{$row['details_of_equipment']}</td>";
                                echo "<td>{$row['date_approved']}</td>";
                                echo "<td>{$row['budget']}</td>";
                                $requestID = $row['request_ID'];
                                $unitResult = $conn->query("SELECT unit_ID FROM appointment WHERE request_ID = $requestID");
                                $unitRow = $unitResult->fetch_assoc();
                                echo "<td>{$unitRow['unit_ID']}</td>";
                                echo "<td class='actionContainer'>";
                                echo "<a href='../admin panel/viewBudget.php?request_ID={$requestID}&id={$userID}'><img src='../assets/img/view.png' alt='View' class='action-img' style='width: 2.5rem; height: 1.rem;</a>";
                                echo "<button class='action'><img src='../assets/img/trash.png' alt='View' class='action-img' style='width: 1.7rem; height: 1.7rem;'></button>";
                                echo "</td>";
                                echo "</tr>";
                                $count++; 
                            }
                        } else {
                            echo "<tr><td colspan='9'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
           </div>
        </div>
    </div>

    <!-- sidebar show -->
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

        <a href="../admin panel/userProfile.php?id=<?php echo $userID; ?>">
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
    <script src="../assets/js/sidebarShow.js"></script>
</body>
</html>
