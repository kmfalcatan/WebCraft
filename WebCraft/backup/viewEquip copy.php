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

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">
    <link rel="stylesheet" href="../assets/css/newViewEquipment.css">
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
        <div class="subContainer1">
            <div class="backContainer">
                <a href="">
                    <div class="subBackContainer">
                        <img class="backIcon" src="../assets/img/left-arrow.png" alt="">
                    </div>
                </a>

                <div class="searchContainer">
                    <input class="search" type="text" placeholder="Search">
                </div>
            </div>

            <div class="equipContainer">
                <a href="">
                    <div class="subEquipContainer">
                        <div class="imageContainer1" style="outline: 1px red solid;">
                            <img class="image1" src="" alt="">
                        </div>
                </a>

                        <div class="infoContainer">
                            <div class="subInfoContainer">
                                <div class="statusContainer1">
                                    <p class="status1">OLD</p>
                                </div>
                            </div>

                            <div class="subInfoContainer1">
                                <p class="text">Equipment name</p>
                            </div>

                            <div class="subInfoContainer1">
                                <p class="text">Unit ID</p>
                            </div>

                            <div class="subInfoContainer1">
                                <p class="text">Status</p>
                            </div>

                            <div class="subInfoContainer">
                                <div class="statusContainer2">
                                    <button onclick="popup1()" class="historyButton">History</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="nextContainer">
                <div class="subNextContainer">
                    <div class="previusContainer">
                        <button class="previousButton"><img class="arrowIcon" src="../assets/img/chevron-left (1).png" alt="">Previous</button>
                    </div>

                    <div class="previusContainer">
                        <p class="number">1</p>
                    </div>

                    <div class="previusContainer">
                        <button class="previousButton">Next<img class="arrowIcon" src="../assets/img/chevron-right.png" alt=""></button>
                    </div>
                </div>
            </div>
        </div>

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
                            <button onclick="popup1()" class="cancelButton">Cancel</button>
                        </div>
                    </div>
                </div>
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
