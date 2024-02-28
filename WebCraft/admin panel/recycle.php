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
                            <th>ARTICLE</th>
                            <th>PROPERTY NUMBER</th>
                            <th>ACCOUNT CODE</th>
                            <th>UNITS</th>
                            <th>UNIT VALUE</th>
                            <th>TOTAL VALUE</th>
                            <th>REMARKS</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class='actionContainer'>
                            <a href=''><img src='../assets/img/restore.png' alt='View' class='action-img' style='width: 1.5rem; height: 0.5.rem;'></a>
                            <img src='../assets/img/trash.png' alt='View' class='action-img' style='width: 1.7rem; height: 1.7rem;'>
                            </td>
                        </tr>
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
    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/theme/setting.js"></script>
</body>
</html>