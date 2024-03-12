<?php
include_once "../authentication/auth.php";
include_once "../dbConfig/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/newAnalytics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <div class="sideBarContainer">
            <a href="">
                <div class="subSideBarContainer" id="back">
                    <img class="image" src="../assets/img/left-arrow.png" alt="" style="height: 1.5rem; width: 1.5rem;">
                </div>
            </a>

            <a href="">
                <div class="subSideBarContainer">
                    <img class="image" src="../assets/img/barGraph.png" alt="">
                </div>
            </a>

            <a href="">
                <div class="subSideBarContainer">
                    <img class="image" src="../assets/img/pieGraph.png" alt="">
                </div>
            </a>

            <a href="">
                <div class="subSideBarContainer">
                    <img class="image" src="../assets/img/lineGraph.png" alt="">
                </div>
            </a>

            <a href="">
                <div class="subSideBarContainer">
                    <img class="image" src="../assets/img/sideBarGraph.png" alt="">
                </div>
            </a>
        </div>

        <div class="subContainer">
            <div class="graphContainer">
                <div class="subGraphContainer">
                    <div class="graphInfoContainer">
                        <?php include('../charts/equipSummary.php'); ?>
                    </div>
                </div>

                <div class="subGraphContainer1">
                    <div class="graphInfoContainer2">
                        <div class="subGraphInfoContainer1" >
                        <canvas id="costDoughnutChart"></canvas>
                        </div>
                    </div>

                    <div class="graphInfoContainer1">
                        <div class="subGraphInfoContainer2">
                            <canvas id="waveGraph" style="width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="subGraphContainer1">
                    <div class="graphInfoContainer1">
                        <div class="subGraphInfoContainer2">
                            
                        </div>
                    </div>

                    <div class="graphInfoContainer2">
                        <div class="subGraphInfoContainer1">
                            <canvas id="lineGraph"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="graphContainer1">
                <div class="subGraphContainer2" style="padding-top: 1rem; padding-left: 1rem;">
                <?php
                    $query = "SELECT u.username, u.fullname, u.id, u.profile_img, COALESCE(SUM(uu.units_handled), 0) AS total_units_handled 
                            FROM users u 
                            LEFT JOIN user_unit uu ON u.fullname = uu.user 
                            WHERE u.role = 'user' 
                            GROUP BY u.fullname";
                    $result = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        $username = $row['username'];
                        $fullname = $row['fullname'];
                        $id = $row['id'];
                        $totalUnitsHandled = $row['total_units_handled'];
                        $profileImg = $row['profile_img'];
                        $profileImgPath = ($profileImg != '') ? '../uploads/' . $profileImg : '../assets/img/pp_placeholder.png';
                        ?>
                    
                        <div class="userContainer">
                            <img class="userProfileImg" src="<?php echo $profileImgPath; ?>" alt="">
                            <p class="userName"><?php echo $username; ?></p>
                            <p class="userID">ID: <?php echo $id; ?></p>
                            <p class="unitsHandled">Units: <?php echo $totalUnitsHandled; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    <?php
    $query = "SELECT year_received, COUNT(article) as count FROM equipment GROUP BY year_received";
    $result = mysqli_query($conn, $query);
    
    $years = [];
    $articleCounts = [];
    
    while($row = mysqli_fetch_assoc($result)) {
        $years[] = $row['year_received'];
        $articleCounts[] = $row['count'];
    }
    ?>

    var lineGraphData = {
        labels: <?php echo json_encode($years); ?>,
        datasets: [{
            label: 'Number of Articles',
            data: <?php echo json_encode($articleCounts); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    var lineGraphOptions = {
        scales: {
            y: {
                beginAtZero: true,
                precision: 0
            }
        }
    };

    var lineGraphChart = new Chart(document.getElementById('lineGraph'), {
        type: 'line',
        data: lineGraphData,
        options: lineGraphOptions
    });
    </script>

<script>
    <?php
    // Retrieve the data for the doughnut chart
    $query = "SELECT article, total_value FROM equipment";
    $result = mysqli_query($conn, $query);

    // Prepare the data arrays for the doughnut chart
    $articles = [];
    $totalValues = [];

    while($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row['article'];
        $totalValues[] = $row['total_value'];
    }
    ?>

    var costDoughnutData = {
        // labels: <?php echo json_encode($articles); ?>,
        datasets: [{
            label: 'Total Value',
            data: <?php echo json_encode($totalValues); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    };

    var costDoughnutOptions = {
        responsive: true,
        plugins: {
            legend: {
                position: 'right',
                align: 'start'
            },
            title: {
                display: true,
                text: 'Total Value of Articles'
            }
        }
    };


    var costDoughnutChart = new Chart(document.getElementById('costDoughnutChart'), {
        type: 'doughnut',
        data: costDoughnutData,
        options: costDoughnutOptions
    });
</script>


<script>
    <?php
    // Fetch data for the wave graph
    $query = "SELECT article, SUM(total_unit) as total_units FROM equipment GROUP BY article";
    $result = mysqli_query($conn, $query);

    // Prepare data arrays for the wave graph
    $articles = [];
    $totalUnits = [];

    while($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row['article'];
        $totalUnits[] = $row['total_units'];
    }
    ?>

    // Wave graph data
    var waveGraphData = {
        labels: <?php echo json_encode($articles); ?>,
        datasets: [{
            label: 'Total Units',
            data: <?php echo json_encode($totalUnits); ?>,
            fill: false,
            borderColor: 'rgba(54, 162, 235, 1)',
            tension: 0.4,
            borderWidth: 2
        }]
    };

    // Wave graph options
    var waveGraphOptions = {
        scales: {
            y: {
                beginAtZero: true,
                precision: 0
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    };

    // Render the wave graph
    var waveGraphChart = new Chart(document.getElementById('waveGraph'), {
        type: 'line',
        data: waveGraphData,
        options: waveGraphOptions
    });
    </script>
</body>
</html>
