<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/recycle.css">
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
                        <p class="companyName">MedEquip tracker</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="searchBarContainer">
                <input class="searchBar" type="text" id="searchInput" placeholder="Search..." oninput="liveSearch()">
            </div>

            <div class="filterContainer">
                <div class="subFilterContainer">
                    <div class="sortContainer">
                        <img class="sort" src="../assets/img/th (2).jpg" alt="">
                    </div>

                    <div class="filter" onclick="filterByYear('all')">
                        <p class="year">All</p>
                    </div>

                    <div class="filter" onclick="filterByYear(2024)">
                        <p class="year">2024</p>
                    </div>

                    <div class="filter" onclick="filterByYear(2023)">
                        <p class="year">2023</p>
                    </div>

                    <div class="filter" onclick="filterByYear(2022)">
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

                    <tbody">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class='actionContainer'>
                            <a href=''><button class='action'>Restore</button></a>
                            <button class='action'>Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="buttonContainer1">
                <a href="../admin panel/setting.php">
                    <button class="button2">Back</button>
                </a>
            </div>
        </div>
    </div>
    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>