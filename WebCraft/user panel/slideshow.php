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

    <a href="../user panel/userEquip.php?id=<?php echo $userID; ?>">
       <div class="logout-menu">
            <div class="logout-icon">
                <img src="../assets/img/file-text-circle.png" alt=""> 
            </div> 
            <p>My units</p>
        </div>
    </a>

    <div class="logout-menu" onclick="showLogoutConfirmation()">
        <div class="logout-icon">
            <img src="../assets/img/logout.png" alt=""> 
        </div> 
        <p>Log out</p>
    </div>