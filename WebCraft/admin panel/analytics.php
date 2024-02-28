<?php
include_once "../authentication/auth.php";
include_once "../dbConfig/dbconnect.php";

$queryEquipment = "SELECT year_received, COUNT(*) as total_equipment FROM equipment GROUP BY year_received ORDER BY year_received";
    $resultEquipment = mysqli_query($conn, $queryEquipment);
    $data = array();
    while ($row = mysqli_fetch_assoc($resultEquipment)) {
        $data[$row['year_received']] = $row['total_equipment'];
    }   

$queryMaintenance = "SELECT e.article, COALESCE(SUM(b.budget), 0) AS total_budget_spent, e.budget
    FROM equipment e
    LEFT JOIN budget b ON e.article = b.equipment_name
    GROUP BY e.article";
    $resultMaintenance = mysqli_query($conn, $queryMaintenance);
    $equipmentNames = [];
    $totalBudgetSpent = [];
    $remainingBudget = [];
    while ($row = mysqli_fetch_assoc($resultMaintenance)) {
        $equipmentNames[] = $row['article'];
        if (is_numeric($row['total_budget_spent']) && is_numeric($row['budget'])) {
            $totalBudgetSpent[] = $row['total_budget_spent'];
            $remainingBudget[] = $row['budget'] - $row['total_budget_spent'];
        } else {
            $totalBudgetSpent[] = 0;
            $remainingBudget[] = 0;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/analytics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .total-budget {
            position: absolute;
            top: 50%;
            left: 35%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        } 
    </style>
</head>
<body>
    <div class="sideBarContainer">
        <div class="subSideBarContainer">
            <a href="../admin panel/dashboard.php?id=<?php echo $userID; ?>">
                <img class="back-icon" src="../assets/img/left-arrow.png" alt="">
            </a>
        </div>

        <div class="subSideBarContainer">
            <img class="image" id="bar-graph" src="../assets/img/barGraph.png" alt="">
        </div>

        <div class="subSideBarContainer">
            <a href="">
                <img class="image" id="doughnut-graph" src="../assets/img/pieGraph.png" alt="">
            </a>
        </div>

        <div class="subSideBarContainer">
            <a href="">
                <img class="image" id="line-graph" src="../assets/img/lineGraph.png" alt="">
            </a>
        </div>

        <div class="subSideBarContainer">
            <a href="">
                <img class="image" id="side-bar-graph" src="../assets/img/sideBarGraph.png" alt="">
            </a>
        </div>
    </div>

    <div class="subContainer">
        <div class="graphContainer">
            <?php include('../charts/equipSummary.php'); ?>
        </div>

        <div class="graphContainer1">
            <div class="subGraphContainer1" id="barGraphContainer">
                <?php include('../charts/barGraph.php'); ?>
            </div>

            <div class="subGraphContainer2">
                <canvas id="budgetDoughnutChart"></canvas>
                <div id="totalBudget" class="total-budget">Total Budget: <br> ₱<?php echo array_sum($remainingBudget); ?></div>
            </div>
        </div>

        <div class="graphContainer2">
            <div class="subGraphContainer4">
                <canvas id="lineGraph"></canvas>
            </div>

            <div class="subGraphContainer3">
                <canvas id="maintenanceBarChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Line graph
        var data = <?php echo json_encode($data); ?>;
        var canvas = document.getElementById("lineGraph");
        var lineGraph = new Chart(canvas, {
            type: 'line',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Total Equipment',
                    data: Object.values(data),
                    backgroundColor: 'rgba(0, 0, 0, 0.2)',
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(0, 0, 0, 1)',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Side bar Graph (Maintenance)
        var maintenanceData = {
            labels: <?php echo json_encode($equipmentNames); ?>,
            datasets: [{
                label: 'Maintenance Budget Spent',
                data: <?php echo json_encode($totalBudgetSpent); ?>,
                backgroundColor: '#999999',
                borderColor: '#999999',
                borderWidth: 1
            }, {
                label: 'Remaining Budget',
                data: <?php echo json_encode($remainingBudget); ?>,
                backgroundColor: '#5C5C5C',
                borderColor: '#5C5C5C',
                borderWidth: 1
            }]
        };

        const maintenanceOptions = {
            indexAxis: 'y', 
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        };

        var maintenanceCanvas = document.getElementById("maintenanceBarChart");
        var maintenanceBarChart = new Chart(maintenanceCanvas, {
            type: 'bar',
            data: maintenanceData,
            options: maintenanceOptions
        });

        // Doughnut Chart for budget
        var budgetData = {
            labels: <?php echo json_encode($equipmentNames); ?>,
            datasets: [{
                label: 'Budget',
                data: <?php echo json_encode($remainingBudget); ?>,
                backgroundColor: ['#999999', '#707070', '#404040', '#666666', '#292929', '#6B6B6B', '#3D3D3D'],
                borderWidth: 1
            }]
        };

        var totalBudget = <?php echo array_sum($remainingBudget); ?>;

        var doughnutOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right', 
                }
                // title: {
                //     display: false,
                // }
            }
        };

        var doughnutCanvas = document.getElementById("budgetDoughnutChart");
        var budgetDoughnutChart = new Chart(doughnutCanvas, {
            type: 'doughnut',
            data: budgetData,
            options: doughnutOptions
        });

        var legend = document.getElementById('legend');
        budgetData.labels.forEach(function(label, index) {
            var div = document.createElement('div');
            div.innerHTML = '<span style="background-color:' + budgetData.datasets[0].backgroundColor[index] + '"></span>' + label;
            legend.appendChild(div);
        });
    </script>

</body>
</html>
