<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/WebCraft/assets/css/index.css">
</head>
<body>
    <div class="container1">
        <div class="headerContainer">
            <div class="subHeaderContainer">
                <div class="imageContainer">
                    <div class="subImageContainer">
                        <img class="image" src="/WebCraft/assets/img/417914173_1061244888319690_1028014099293182518_n-removebg-preview.png" alt="">
                    </div>

                    <div class="nameContainer">
                        <p class="companyName">MedEquip tracker</p>
                    </div>
                </div>

                <div class="profileContainer">
                    <div class="subProfileContainer">
                        <img class="image1" src="/WebCraft/assets/img/person-circle.png" alt="">
                    </div>

                    <div class="subProfileContainer">
                        <div class='menubarContainer' onclick='toggleMenu(this)'>
                            <div class='line'></div>
                            <div class='line'></div>
                            <div class='line'></div>
                        </div>

                        <p class="adminName">Admin</p>
                    </div>
                </div>
            </div>

            <div class='sideNavBarContainer'>
                <div class='sideNavBar1'>
                    <div class="subSideNavBar">
                        <a class='profile' href='addEquip.php'>
                            New Equipment
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/th-removebg-preview.png" alt="">
                        <img class="image5" src="/WebCraft/assets/img/plus-circle.png" alt="">
                    </div>
                </div>
        
                <div class='sideNavBar'>
                    <a class='profile' href=''>
                        <div class="subSideNavBar">
                                Inventory
                        </div>
                    </a>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/file-text-circle.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Users
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/person-circle.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Budget
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/th__1_-removebg-preview.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Appointment
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/calendar.png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Help
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/question-circle (2).png" alt="">
                    </div>
                </div>
                <div class='sideNavBar'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            About
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image4" src="/WebCraft/assets/img/about-us-icon-3.jpg" alt="">
                    </div>
                </div>
                <div class='sideNavBar2'>
                    <div class="subSideNavBar">
                        <a class='profile' href=''>
                            Setting
                        </a>
                    </div>

                    <div class="image2">
                        <img class="image3" src="/WebCraft/assets/img/vector-settings-icon-removebg-preview.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
           <div class="searchBarContainer">
                <input class="searchBar" type="text">
           </div>

           <div class="filterContainer">
                <div class="subFilterContainer">
                    <div class="sortContainer">
                        <img class="sort" src="/WebCraft/assets/img/th (2).jpg" alt="">
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
                            <th>ARTICLE</th>
                            <th>DESCRIPTION</th>
                            <th>DEPLOYMENT</th>
                            <th>USER</th>
                            <th>PROPERTY NUMBER</th>
                            <th>ACCOUNT CODE</th>
                            <th>UNITS</th>
                            <th>UNIT VALUE</th>
                            <th>TOTAL VALUE</th>
                            <th>REMARKS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>adasdasd</td>
                            <td>asdasdas</td>
                            <td>adasdasd</td>
                            <td>asdasdas</td>
                            <td>adasdasd</td>
                            <td>asdasdas</td>
                            <td>adasdasd</td>
                            <td>asdasdas</td>
                            <td>adasdasd</td>
                            <td>asdasdas</td>
                            <td>
                                <button class="action">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
           </div>
        </div>
    </div>



    <script src="/WebCraft/assets/js/index.js"></script>
</body>
</html>