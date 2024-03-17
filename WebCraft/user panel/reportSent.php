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
    <style>
        .filter{
        width: 6rem;
        color: #333;
        
    }
    </style>
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

                            <p class="userName"><?php echo $userInfo['username'] ?? ''; ?></p>
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
                        <p class="year">Pending</p>
                    </div>

                    <div class="filter" onclick="changeColor(this)">
                        <p class="year">Approved</p>
                    </div>

                    <div class="filter" onclick="changeColor(this)">
                        <p class="year">Declined</p>
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
                            $userID = $_SESSION['user_id'];

                            $reportQuery = "SELECT DISTINCT timestamp, report_ID, status FROM unit_report WHERE user_ID = '$userID' ORDER BY timestamp DESC";
                            $reportResult = mysqli_query($conn, $reportQuery);

                            if (mysqli_num_rows($reportResult) > 0) {
                                $previousTimestamp = null;

                                while ($row = mysqli_fetch_assoc($reportResult)) {
                                    $timestamp = strtotime($row['timestamp']);
                                    $reportID = $row['report_ID'];
                                    $status = $row['status'];

                                    if ($timestamp == $previousTimestamp) {
                                        continue; 
                                    }

                                    $formatted_timestamp = date("l j, Y h:i a", strtotime($row['timestamp']));

                                    $userQuery = "SELECT profile_img, fullname FROM users WHERE id = '$userID'";
                                    $userResult = mysqli_query($conn, $userQuery);

                                    if (mysqli_num_rows($userResult) > 0) {
                                        $row = mysqli_fetch_assoc($userResult);
                                        $image = $row['profile_img'];
                                        $fullName = $row['fullname'];

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

                                        foreach ($intervals as $seconds => $unit) {
                                            $interval = floor($timeDiff / $seconds);

                                            if ($interval > 0) {
                                                $timeAgo .= $interval . ' ' . ($interval > 1 ? $unit . 's' : $unit) . ' ago';
                                                break;
                                            }
                                        }

                                        echo "<tr><td><div class='list'>";
                                        echo "<div class='sender-img'>
                                                <img src='../uploads/" . ($image ? $image : 'placeholder.jpg') . "' alt='Profile Image'>
                                            </div>
                                            <div class='label' style='display: flex;'>
                                                <a href='reportDetails.php?report_ID=$reportID&user_ID=$userID&timestamp=$timestamp'>
                                                    <p class='left-text'>" . $status ."</p>
                                                </a>
                                                <div class='right-text'>
                                                <p class='time'>$timeAgo</p> 
                                                <button class='ellipsis-button' onclick='toggleDropdown(this)' style='border: none;'>
                                                <i class='fas fa-ellipsis-h'></i>
                                                <div class='dropdownContainer' style='display: none;'>
                                                    <h3>Details</h3>
                                                    <div class='details'>

                                                      <div class='content'>
                                                        <p>Sender:</p>
                                                       </div>

                                                      <div class='value'>
                                                        <p><span>$fullName</span></p>
                                                       </div>

                                                      <div class='content'>
                                                        <p>Content:</p>
                                                      </div>

                                                      <div class='value'>
                                                        <p><span>Report to remove unit from available list</span></p>
                                                       </div>

                                                      <div class='content'>
                                                        <p>Date&Time: </p>
                                                      </div>

                                                      <div class='value'>
                                                        <p><span>$formatted_timestamp</span></p>
                                                       </div>

                                                    </div>
                                                </div>
                                                </button>   
                                            </div>
                                                </div>";
                                        echo "</div></td></tr>";

                                        $previousTimestamp = $timestamp;
                                    } else {
                                        echo "No profile image found.";
                                    }
                                }
                            } else {
                                echo "No report found.";
                            }

                            mysqli_close($conn);
                            ?>
                        </tr>
                    </tbody>
                </table>
           </div>
        </div>
    </div>

    <!-- sidebar show -->
    <div class="sidebar" id="sidebar" style="height: 35%;">
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
        function toggleDropdown(element) {
            const dropdownContainer = element.querySelector('.dropdownContainer');
            if (dropdownContainer.style.display === 'none') {
            dropdownContainer.style.display = 'block';
            } else {
            dropdownContainer.style.display = 'none';
            }
        }
    </script>
</body>
</html>
