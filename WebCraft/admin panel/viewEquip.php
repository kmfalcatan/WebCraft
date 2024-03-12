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
    <link rel="stylesheet" href="../assets/css/newViewEquipment.css">
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

                        <p class="adminName"><?php echo $userInfo['username'] ?? ''; ?></p>
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
                    echo "<h2>{$article['article']} available unit list</h2>";
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
                    $user = $row1['user'];
                    
                    $unitPrefix = 'UNIT';
                    $defaultUnitID = '0000';
                    $unitID = $unitPrefix . '-' . str_pad($unit_ID, strlen($defaultUnitID), '0', STR_PAD_LEFT);
                    
                    echo "<a href='updateUnit.php?equipment_ID=$equipment_ID&unit_ID=$unit_ID&id=$userID'>";
                        echo "<div class='equipContainer'>";
                            echo "<div class='subEquipContainer'>";
                                echo "<div class='imageContainer1'>";
                                    echo "<img class='image1' src='$imageURL' alt=''>";
                                echo "</div>";
                                echo "<div class='infoContainer'>";
                                    echo "<div class='subInfoContainer'>";
                                        echo "<div class='statusContainer1'>";
                                            echo "<p class='status1'>OLD</p>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer1'>";
                                        echo "<p class='text'> $equipment_name</p>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer1'>";
                                        echo "<p  class='text'>ID: $unitID</p>";
                                    echo "</div>";
                                    echo "<div class='subInfoContainer1'>";
                                        echo "<p  class='text'>user: $user</p>";
                                    echo "</div>";

                                    echo "<div class='subInfoContainer'>";
                                        echo "<div class='statusContainer2'>";
                                            echo "<button onclick='popup1()' class='historyButton' type='button'>History</button>";
                                        echo "</div>";
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

        <!-- history -->
        <div class="container3" style="display: none;">
            <div class="container4">
                <div class="subContainer3">
                    <div class="equipmentNameContainer">
                        <p>Equipment history</p>
                    </div>
    
                    <div class="issueContainer">
                        <div class="subIssueContainer">
                            <p>Issue: Lost</p>
                        </div>
    
                        <div class="subIssueContainer">
                            <p>Date: 03/03/2024</p>
                        </div>
                    </div>
    
                    <div class="cancelContainer">
                        <div class="subCancelContainer">
                            <button onclick="popup1()" class="cancelButton" type="button">Cancel</button>
                        </div>
                    </div>
                </div>
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

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/viewEquipt.js"></script>
    <script src="../assets/js/nextPrev.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
    <script>
        function popup1(){
            var popupContainer = document.querySelector('.container3');

            if(popupContainer.style.display === 'none'){
                popupContainer.style.display = 'block';
            } else if(popupContainer.style.display === 'block'){
                popupContainer.style.display = 'none';
            } else{
                popupContainer.style.display = 'none';
            }
        }
    </script>
</body>
</html>
