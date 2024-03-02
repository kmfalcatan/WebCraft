<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;
$userID = isset($_GET['id']) ? $_GET['id'] : null; 
$sql2 = "SELECT image FROM equipment WHERE equipment_ID = '$equipment_ID'";
$sql = "SELECT * FROM units WHERE equipment_ID = '$equipment_ID'";
$result_units = $conn->query($sql);
$result_equipment = $conn->query($sql2);

if ($result_equipment->num_rows > 0) {
    $row = $result_equipment->fetch_assoc();
    $imageFilename = $row['image'];
    $imageURL = "../uploads/" . $imageFilename;
}

$recordsPerPage = 9;

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $recordsPerPage;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/viewEquip.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
</head>
<body id="body">
    
<div class="container2">
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
        </div>
    </div>
    <div class="container1">
        <div class="header">
            <button class="backbtn">
            <a href="dashboard.php?id=<?php echo $userID; ?>"><img src="../assets//img/left-arrow.png" style="width: 1.5rem; height: 1.5rem;" ></a>
            </button>
        <?php
            $result_article = $conn->query("SELECT article FROM equipment WHERE equipment_ID = '$equipment_ID'");

            if ($result_article->num_rows > 0 && $article = $result_article->fetch_assoc()) {
                echo "<h2>{$article['article']} unit list</h2>";
            }
        ?>
        <div class="searchContainer">
            <input class="searchBar" type="text" id="searchInput" placeholder="Search..." oninput="liveSearch()">
        </div>
    </div>
        <div class="subContainer">
            <?php
                $sql = "SELECT * FROM units WHERE equipment_ID = '$equipment_ID' LIMIT $offset, $recordsPerPage";
                $result_units = $conn->query($sql);

                while ($row1 = $result_units->fetch_assoc()) {
                    $equipment_name = $row1['equipment_name'];
                    $unit_ID = $row1['unit_ID'];
                    $status = $row1['status'];
                    
                    $unitPrefix = 'UNIT';
                    $defaultUnitID = '0000';
                    $unitID = $unitPrefix . '-' . str_pad($unit_ID, strlen($defaultUnitID), '0', STR_PAD_LEFT);
                    
                    echo "<a href='updateUnit.php?equipment_ID=$equipment_ID&unit_ID=$unit_ID&id=$userID'>";
                        echo "<div class='subContainer1'>";
                            echo "<div class='equipmentContainer'>";
                                echo "<div class='imageContainer1'>";
                                    echo "<div class='subImageContainer1'>";
                                        echo "<img class='image3' src='$imageURL' alt=''>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='infoContainer'>";
                                    echo "<div class='statusContainer'>";
                                        echo "<div class='subStatusContainer'>";
                                            echo "<div class='status'>";
                                                echo "<p class='subStatus'>OLD</p>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer'>";
                                        echo "<p class='equip-name'> $equipment_name</p>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer'>";
                                        echo "<p>ID: $unitID</p>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer'>";
                                        echo "Status: $status";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</a>";
                }
            ?>
        
        </div>
        <div class="buttonContainer">
            <div class="next-previous">
                <?php
                    $prevPage = $currentPage > 1 ? $currentPage - 1 : 1;
                    echo "<a href='viewEquip.php?equipment_ID=$equipment_ID&id=$userID&page=$prevPage'><button class='previousbtn'>";
                    echo "<span><img src='../assets/img/chevron-left (1).png' alt='' style='height: 1rem; width: 1rem;'></span>";
                    echo "<span>Previous</span>";
                    echo "</button></a>";
                ?>

                <div class="pageIndicator"><?php echo $currentPage; ?></div>

                <?php
                    $nextPage = $currentPage + 1;
                    echo "<a href='viewEquip.php?equipment_ID=$equipment_ID&id=$userID&page=$nextPage'><button class='nextbtn'>";
                    echo "<span>Next</span>";
                    echo "<span><img src='../assets/img/chevron-right.png' alt='' style='height: 1rem; width: 1rem;'></span>";
                    echo "</button></a>";
                ?>
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

    </script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/viewEquipt.js"></script>
    <script src="../assets/js/nextPrev.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
</body>
</html>
