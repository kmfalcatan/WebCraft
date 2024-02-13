<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";

$sql = "SELECT * FROM appointment";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/appointment.css">
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

           <div class="tableContainer1">
                <table>
                    <thead>
                        <tr>
                            <th>EQUIPMENT IMAGE</th>
                            <th>EQUIPMENT NAME</th>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php   
                        while ($row = mysqli_fetch_assoc($result)) { 
                            $equipment_ID = date('Y') . '-' . str_pad($row['equipment_ID'], 5, '0', STR_PAD_LEFT);
                            echo "<tr>";
                            echo "<td><img src='../uploads/{$row['equip_img']}' alt='Equipment Image' width='100' height='100'></td>";
                            echo "<td>{$row['article']}</td>";
                            echo "<td>{$equipment_ID}</td>";
                            echo "<td>{$row['date_request']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "<td class='actionContainer'>";
                            echo "<a href='../admin panel/viewAppointment.php?equipment_ID&id=<?php echo $userID; ?>'><button class='action'>View</button></a>";
                            echo "<button class='action'>Delete</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
           </div>

           <div class="createAppointment">
                <div class="createAppointment2">
                    <a href="../user panel/createAppointment.php?id=<?php echo $userID; ?>">
                    <button class="createbtn">Create<span style="margin-left: 0.5rem;">Request</span></button>
                    </a>
                </div>
           </div>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>