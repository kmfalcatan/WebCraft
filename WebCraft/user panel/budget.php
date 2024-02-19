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
                </div>
           </div>

           <div class="tableContainer">
                <table>
                    <thead>
                        <tr>
                            <th>EQUIPMENT IMAGE</th>
                            <th>EQUIPMENT NAME</th>
                            <th>BUDGET FOR</th>
                            <th>DATE APPROVED</th>
                            <th>BUDGET</th>
                            <th>UNIT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $query = "SELECT * FROM approved_requests";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
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
                                echo "<a href='../user panel/viewBudget.php?request_ID={$requestID}&id={$userID}'><button class='action'>View</button></a>";
                                echo "<button class='action'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
           </div>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/theme/dashboard-theme.js"></script>
</body>
</html>
