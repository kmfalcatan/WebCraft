<?php
include_once "../dbConfig/dbconnect.php";
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
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
    <link rel="stylesheet" href="../assets/css/units.css">
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
                        <p class="adminName"><?php echo $userInfo['username'] ?? ''; ?></p>
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
                    <div class="med-icon" id="medIcon"  onclick="showFilterPopup()">
                        <img src="../assets/img/filter.png" style="width: 1.5rem; height: 1.5rem; cursor: pointer;" alt="">
                        <p>Filter</p>
                    </div>

                        <div class="filterPopupContainer" id="filterPopupContainer" style="display: none;">
                            <div class="filterPopupContent">
                                <h2>UNIT FILTERS</h2>
                                <div class="desc">
                                    <p>User filters to find units.</p>
                                </div>

                                <div class="filters">
                                    <div class="yearContainer">
                                        <label for="year">Year:</label>
                                        <select class="year" name="unit_issue">
                                            <option value="" disabled selected>Select year</option>
                                            <?php
                                                $yearQuery = "SELECT DISTINCT year_received FROM equipment";
                                            
                                                $userResult = $conn->query($yearQuery);
                                                
                                                if ($userResult->num_rows > 0) {
                                                    while($yearRow = $userResult->fetch_assoc()) {
                                                        echo '<option value="' . $yearRow["year_received"] . '">' . $yearRow["year_received"] . '</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="articleContainer">
                                        <label for="article">Article:</label>
                                        <select class="article" name="unit_issue">
                                            <option value="" disabled selected>Select article</option>
                                            <?php
                                                $articleQuery = "SELECT DISTINCT article FROM equipment";
                                            
                                                $articleResult = $conn->query($articleQuery);
                                                if ($articleResult->num_rows > 0) {
                                                    while($articleRow = $articleResult->fetch_assoc()) {
                                                        if (!empty($articleRow["article"])) {
                                                            echo '<option value="' . $articleRow["article"] . '">' . $articleRow["article"] . '</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="custodianContainer">
                                        <label for="custodian">Custodian:</label>
                                        <select class="custodian" name="unit_issue">
                                            <option value="" disabled selected>Select custodian</option>
                                            <?php
                                                $userQuery = "SELECT DISTINCT user FROM units";
                                                $userResult = $conn->query($userQuery);
                                                
                                                if ($userResult->num_rows > 0) {
                                                    while($userRow = $userResult->fetch_assoc()) {
                                                        if (!empty($userRow["user"])) {
                                                            echo '<option value="' . $userRow["user"] . '">' . $userRow["user"] . '</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="button">
                                    <button class="closebtn" onclick="hideFilterPopup()">Close</button>
                                    <button  id="filterButton" onclick="hideFilterPopup()">Filter</button>
                                </div> 
                            </div>
                        </div>
                </div>
           </div>

           <div class="tableContainer">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>UNIT ID</th>
                            <th>ARTICLE</th>
                            <th>PROPERTY NUMBER</th>
                            <th>ACCOUNT CODE</th>
                            <th>CUSTODIAN</th>
                            <th>YEAR</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody id="tblBody">
                        <?php
                            $sql = "SELECT unit_ID, equipment_name, user FROM units";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                $count = 1; 
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $equipmentName = $row['equipment_name'];

                                    $sqlEquipment = "SELECT property_number, account_code, year_received FROM equipment WHERE article = '$equipmentName'";
                                    $resultEquipment = mysqli_query($conn, $sqlEquipment);

                                    $formattedUnitID = '';

                                    if ($resultEquipment) {
                                        $equipmentRow = mysqli_fetch_assoc($resultEquipment);

                                        $unitPrefix = 'UNIT';
                                        $defaultUnitID = '0000';
                                        $unitID = $row['unit_ID'];
                                        $formattedUnitID = $unitPrefix . '-' . str_pad($unitID, strlen($defaultUnitID), '0', STR_PAD_LEFT);

                                        echo "<tr>";
                                        echo "<td>{$count}</td>"; 
                                        echo "<td style='font-weight: bold;'>" . $formattedUnitID . "</td>";
                                        echo "<td>" . $row['equipment_name'] . "</td>";
                                        echo "<td>" . $equipmentRow['property_number'] . "</td>";
                                        echo "<td>" . $equipmentRow['account_code'] . "</td>";
                                        echo "<td>" . $row['user'] . "</td>";
                                        echo "<td>" . $equipmentRow['year_received'] . "</td>";
                                        echo "<td class='actionContainer' style='display: flex;'>";
                                        echo "<a href='removeUnit.php?unit_ID={$row['unit_ID']}&id={$userInfo['id']}'><button class'movebtn'><img src='../assets/img/move.png'>remove</button</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                        $count++; 
                                    }
                                }
                            }
                            ?>
                    </tbody>
                </table>
           </div>
        </div>
    </div>

    <!-- sidebar show -->
    <div class="sidebar" id="sidebar">
        <?php include('slideshow.php'); ?>
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

    <script src="../assets/js/toggle.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
   <script src="../assets/js/filter.js"></script>

</body>
</html>