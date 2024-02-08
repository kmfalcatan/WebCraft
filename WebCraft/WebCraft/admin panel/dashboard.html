<?php
    include('../dbConfig/dbconnect.php');
    include('../functions/header.php');

    $sql = "SELECT * FROM equipment";
    $result = $conn->query($sql);
    $equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
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

                    <div class="subProfileContainer">
                        <div class='menubarContainer' onclick='toggleMenu(this)'>
                            <div class='line'></div>
                            <div class='line'></div>
                            <div class='line'></div>
                        </div>

                        <p class="adminName">Admin</p>
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
                </div>
           </div>

           <div class="tableContainer">
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

                    <tbody id="tblBody">
                        <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr data-equipment-id='{$row['equipment_ID']}'>";
                                echo "<td>{$row['article']}</td>";
                                echo "<td>{$row['description']}</td>";
                                echo "<td>{$row['deployment']}</td>";
                                echo "<td>{$row['user']}</td>";
                                echo "<td>{$row['property_number']}</td>";
                                echo "<td>{$row['account_code']}</td>";
                                echo "<td>{$row['units']}</td>";
                                echo "<td>{$row['unit_value']}</td>";
                                echo "<td>{$row['total_value']}</td>";
                                echo "<td>{$row['remarks']}</td>";
                                echo "<td class='actionContainer'>";
                                echo "<a href='../admin panel/viewEquip.php?equipment_ID={$row['equipment_ID']}'><button class='action'>View</button></a>";
                                echo "<button class='action'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
           </div>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/search.js"></script>
</body>
</html>