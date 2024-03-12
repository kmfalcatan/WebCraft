<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";
include_once "../functions/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/recycle.css">
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
                        <img class="system-name" src="../assets/img/system-name.png" alt="">
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
                        <p class="usernName"><?php echo $userInfo['username'] ?? ''; ?></p>
                    </div>
                </div>

            </div>
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
                        <p class="year">Lost</p>
                    </div>

                    <div class="filter" onclick="filterByYear(2023)">
                        <p class="year">Returned</p>
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
                            <th>UNIT ID</th>
                            <th>DATE</th>
                            <th>REMARKS</th>
                            <th>VIEW</th>
                        </tr>
                    </thead>

                    <tbody">
                        <?php
                            $query = "SELECT approved_ID, article, unit_ID, unit_issue, timestamp FROM approved_report";
                            $result = mysqli_query($conn, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $count = 1; 
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $formatted_timestamp = date("l j, Y h:i a", strtotime($row['timestamp']));
                                    echo "<tr>";
                                    echo "<td>{$count}</td>";
                                    echo "<td>" . $row['article'] . "</td>";
                                    echo "<td>" . $row['unit_ID'] . "</td>";
                                    echo "<td>" . $formatted_timestamp . "</td>"; 
                                    echo "<td>" . $row['unit_issue'] . "</td>";
                                    echo "<td class='actionContainer'>";
                                    echo "<a href='viewApprovedReport.php?approved_ID={$row['approved_ID']}&id={$userID}'><img src='../assets/img/view.png' alt='View' class='action-img' style='width: 2rem; height: 1.5rem;'></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $count++; 
                                }
                            } else {
                                // No data found
                                echo "<tr><td colspan='6'>No records found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="buttonContainer1">
                <a href="../admin panel/setting.php?id=<?php echo $userID; ?>">
                    <button class="button2" id="btn1">Back</button>
                </a>
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

    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
</body>
</html>