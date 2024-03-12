<?php
include_once "../authentication/auth.php";
?>

<div class='sideNavBarContainer'>
    <div class='sideNavBar1'>
        <div class="subSideNavBar">
            <a class='profile' href='../admin panel/analytics.php?id=<?php echo $userID; ?>'>
                Dashboard
            </a>
        </div>

        <div class="image2">
            <img class="image3" src="../assets/img/dashboard.png" alt="">
        </div>
    </div>

    <div class='sideNavBar'>
        <div class="subSideNavBar">
            <a class='profile' href='../admin panel/addEquip.php?id=<?php echo $userID; ?>'>
                New Equipment
            </a>
        </div>

        <div class="image2">
            <img class="image3" src="../assets/img/th-removebg-preview.png" alt="">
            <img class="image5" src="../assets/img/plus-circle.png" alt="">
        </div>
    </div>

    <div class='sideNavBar'>
        <div class="subSideNavBar">
            <a class='profile' href='../admin panel/dashboard.php?id=<?php echo $userID; ?>'>
                Inventory
            </a>
        </div>

        <div class="image2">
            <img class="image3" src="../assets/img/file-text-circle.png" alt="">
        </div>
    </div>
    <div class='sideNavBar'>
        <div class="subSideNavBar">
            <a class='profile' href='../admin panel/userAccount.php?id=<?php echo $userID; ?>'>
                Users
            </a>
        </div>

        <div class="image2">
            <img class="image3" src="../assets/img/person-circle.png" alt="">
        </div>
    </div>
    <div class='sideNavBar'>
        <div class="subSideNavBar">
            <a class='profile' href='../admin panel/reportList.php?id=<?php echo $userID; ?>'>
                Report
            </a>
        </div>

        <div class="image2">
            <img class="image3" src="../assets/img/calendar.png" alt="">
        </div>
    </div>
    <div class='sideNavBar'>
        <div class="subSideNavBar">
            <a class='profile' href='../admin panel/admin-guide.php?id=<?php echo $userID; ?>'>
                Help
            </a>
        </div>

        <div class="image2">
            <img class="image3" src="../assets/img/question-circle (2).png" alt="">
        </div>
    </div>
    <div class='sideNavBar'>
        <div class="subSideNavBar">
            <a class='profile' href="../admin panel/about.php?id=<?php echo $userID; ?>">
                About
            </a>
        </div>

        <div class="image2">
            <img class="image4" src="../assets/img/about-us-icon-3.jpg" alt=""  style="width: 2.5rem; height:2rem;">
        </div>
    </div>
    <div class='sideNavBar2'>
        <div class="subSideNavBar">
            <a class='profile' href='../admin panel/setting.php?id=<?php echo $userID; ?>'>
                Setting
            </a>
        </div>

        <div class="image2">
            <img class="image3" src="../assets/img/vector-settings-icon-removebg-preview.png" alt="">
        </div>
    </div>
</div>