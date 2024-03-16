<?php
include_once '../dbConfig/dbconnect.php';
include_once '../functions/header.php';
include_once '../authentication/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/webcraftLogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>MedEquip Tracker</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/reportList.css">
    <link rel="stylesheet" href="../assets/css/sidebarShow.css">

</head>
<body style="overflow: hidden;">
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

        <div class="container" id="reportCotainer">
           <div class="filterContainer" style="height: 4rem;">
                <div class="subFilterContainer">
                    <div class="sortContainer">
                        <img class="sort" src="../assets/img/th (2).jpg" alt="">
                    </div>

                    <div class="filter" onclick="changeColor(this)">
                        <p class="year">Lost</p>
                    </div>

                    <div class="filter" onclick="changeColor(this)">
                        <p class="year">Return</p>
                    </div>

                    <div class="searchCon">
                        <input class="search" type="text" id="searchInput" placeholder="Search..." oninput="liveSearch()">
                    </div>

                </div>
           </div>

           <div class="tableContainer" style="background-color: #fff;">
                <table>
                    <tbody>
                        <tr>
                        <?php
                            include_once '../dbConfig/dbconnect.php';
                            include_once '../functions/header.php';

                            $query = "SELECT report_ID, timestamp, user_ID FROM unit_report ORDER BY timestamp DESC";
                            $result = mysqli_query($conn, $query);

                            $prevTimestamp = null;
                            $userID = null;

                            while ($row = mysqli_fetch_assoc($result)) {
                                $report_ID = $row['report_ID'];
                                $timestamp = strtotime($row['timestamp']); 
                                $currentUserID = $row['user_ID'];

                                $userQuery = "SELECT fullname, profile_img FROM users WHERE id = '$currentUserID'";
                                $userResult = mysqli_query($conn, $userQuery);
                                $userData = mysqli_fetch_assoc($userResult);
                                $fullName = $userData['fullname'];
                                $image = $userData['profile_img'];

                                $timeDiff = time() - $timestamp;

                                $intervals = array(
                                    31536000 => 'year',
                                    2592000 => 'month',
                                    604800 => 'week',
                                    86400 => 'day',
                                    3600 => 'hour',
                                    60 => 'minute',
                                    1 => 'second'
                                );

                                $timeAgo = '';
                                foreach ($intervals as $secs => $str) {
                                    $d = $timeDiff / $secs;
                                    if ($d >= 1) {
                                        $r = round($d);
                                        $timeAgo = $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
                                        break;
                                    }
                                }

                                if ($timestamp != $prevTimestamp) {

                                    if ($prevTimestamp !== null) {
                                        echo "</a></div></td></tr>";
                                    }
                                    echo "<tr><td><div class='list'  onclick='changeColor(this)'  data-id='{$report_ID}'>";

                                    echo "<div class='sender-img'>
                                            <img src='../uploads/" . ($image ? $image : 'placeholder.jpg') . "' alt='Profile Image'>
                                        </div>
                                        <div class='label' style='display: flex;'>
                                        <a href='approveReport.php?report_ID={$report_ID}&user_ID={$currentUserID}&timestamp={$timestamp}&id={$userID}'>
                                            <p class='left-text'><span>$fullName</span> sent a report.</p>
                                        </a>
                                            <div class='right-text'>
                                                <p class='time'>$timeAgo</p> 
                                                <i class='fas fa-ellipsis-h'></i>
                                            </div>
                                        </div>";

                                    $userID = $currentUserID;
                                    $prevTimestamp = $timestamp;
                                }
                            }

                            if ($prevTimestamp !== null) {
                                echo "</a></div></td></tr>";
                            }

                            mysqli_free_result($result);
                        ?>
                        </tr>
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

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/sidebarShow.js"></script>
    <script>
        function changeColor(element) {
            element.classList.add('selected');
            
            const selectedItems = document.querySelectorAll('.list.selected');
            const selectedIds = Array.from(selectedItems).map(item => item.getAttribute('data-id'));
            localStorage.setItem('selectedListItems', JSON.stringify(selectedIds));
        }

        function checkSelectedColor() {
            const selectedIds = JSON.parse(localStorage.getItem('selectedListItems'));
            if (selectedIds) {
                selectedIds.forEach(id => {
                    const selectedElement = document.querySelector(`.list[data-id='${id}']`);
                    if (selectedElement) {
                        selectedElement.classList.add('selected');
                    }
                });
            }
        }

        window.addEventListener('DOMContentLoaded', checkSelectedColor);
    </script>

</body>
</html>
