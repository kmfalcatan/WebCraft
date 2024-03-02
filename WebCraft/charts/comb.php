<?php
include_once "../dbConfig/dbconnect.php";

$queryBar = "SELECT e.article, COALESCE(SUM(b.budget), 0) AS total_budget_spent, e.budget
          FROM equipment e
          LEFT JOIN budget b ON e.article = b.equipment_name
          GROUP BY e.article";

$resultBar = mysqli_query($conn, $queryBar);

$equipmentNamesBar = [];
$totalBudgetSpentBar = [];
$remainingBudgetBar = [];

while ($row = mysqli_fetch_assoc($resultBar)) {
    $equipmentNamesBar[] = $row['article'];

    if (is_numeric($row['total_budget_spent']) && is_numeric($row['budget'])) {
        $totalBudgetSpentBar[] = $row['total_budget_spent'];
        $remainingBudgetBar[] = $row['budget'] - $row['total_budget_spent'];
    } else {
        $totalBudgetSpentBar[] = 0;
        $remainingBudgetBar[] = 0;
    }
}

$queryDoughnut = "SELECT article, total_value FROM equipment";
$resultDoughnut = mysqli_query($conn, $queryDoughnut);

$equipmentNamesDoughnut = [];
$equipmentBudgetsDoughnut = [];

while ($row = mysqli_fetch_assoc($resultDoughnut)) {
    $equipmentNamesDoughnut[] = $row['article'];
    $equipmentBudgetsDoughnut[] = $row['total_value'];
}

$queryLine = "SELECT year_received, COUNT(*) AS equipment_count FROM equipment GROUP BY year_received";
$resultLine = mysqli_query($conn, $queryLine);

$yearsReceived = [];
$equipmentCounts = [];

while ($row = mysqli_fetch_assoc($resultLine)) {
    $yearsReceived[] = $row['year_received'];
    $equipmentCounts[] = $row['equipment_count'];
}

$queryBar2 = "SELECT article, SUM(units) AS total_units FROM equipment GROUP BY article";
$resultBar2 = mysqli_query($conn, $queryBar2);

$articleNames = [];
$unitPercentages = [];
$colors = [];

$totalUnits = 0;
while ($row = mysqli_fetch_assoc($resultBar2)) {
    $totalUnits += $row['total_units'];
}

mysqli_data_seek($resultBar2, 0); 
while ($row = mysqli_fetch_assoc($resultBar2)) {
    $articleNames[] = $row['article'];
    $unitPercentages[] = ($row['total_units'] / $totalUnits) * 100;

    $shade = rand(50, 200);
    $grayColor = "rgb($shade, $shade, $shade)";
    $colors[] = $grayColor;
}

$borderColors = array_map(function($color) {
    list($r, $g, $b) = sscanf($color, "rgb(%d, %d, %d)");
    $r = min(255, $r + 30);
    $g = min(255, $g + 30);
    $b = min(255, $b + 30);
    return "rgba($r, $g, $b, 1)";
}, $colors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Budget Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px auto;
            max-width: 800px;
        }

        .chart-container {
            width: 400px;
            height: 400px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="chart-container">
        <canvas id="barChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="doughnutChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="lineChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="secondBarChart"></canvas>
    </div>
</div>

<script>
    const barData = {
        labels: <?php echo json_encode($equipmentNamesBar); ?>,
        datasets: [{
            label: 'Maintenance Budget Spent',
            data: <?php echo json_encode($totalBudgetSpentBar); ?>,
            backgroundColor: 'rgba(200, 200, 200, 0.8)', 
            borderWidth: 1
        }, {
            label: 'Remaining Budget',
            data: <?php echo json_encode($remainingBudgetBar); ?>,
            backgroundColor: 'rgba(10, 10, 10, 0.5)', 
            borderColor: 'rgba(200, 200, 200, 1)',
            borderWidth: 1
        }]
    };

    const doughnutData = {
        labels: <?php echo json_encode($equipmentNamesDoughnut); ?>,
        datasets: [{
            data: <?php echo json_encode($equipmentBudgetsDoughnut); ?>,
            backgroundColor: [
                'rgba(128, 128, 128, 0.9)',
                'rgba(169, 169, 169, 0.9)',
                'rgba(192, 192, 192, 0.9)', 
                'rgba(211, 211, 211, 0.9)', 
                'rgba(220, 220, 220, 0.9)', 
                'rgba(245, 245, 245, 0.9)'  
            ],
            borderColor: [
                'rgba(128, 128, 128, 1)',
                'rgba(169, 169, 169, 1)',
                'rgba(192, 192, 192, 1)', 
                'rgba(211, 211, 211, 1)', 
                'rgba(220, 220, 220, 1)', 
                'rgba(245, 245, 245, 1)'  
            ],
            borderWidth: 1,
            weight: 100
        }]
    };

    const lineData = {
        labels: <?php echo json_encode($yearsReceived); ?>,
        datasets: [{
            label: 'Equipment Distribution by Year Received',
            data: <?php echo json_encode($equipmentCounts); ?>,
            backgroundColor: 'rgba(0, 0, 0, 0.2)', 
            borderColor: 'rgba(0, 0, 0, 1)', 
            borderWidth: 2,
            pointBackgroundColor: 'rgba(0, 0, 0, 1)',
            pointRadius: 5,
            pointHoverRadius: 7, 
        }]
    };

    const secondBarData = {
        labels: <?php echo json_encode($articleNames); ?>,
        datasets: [{
            label: 'Equipment Summary',
            data: <?php echo json_encode($unitPercentages); ?>,
            backgroundColor: <?php echo json_encode($colors); ?>,
            borderColor: <?php echo json_encode($borderColors); ?>, 
            borderWidth: 1
        }]
    };

    const options = {
        indexAxis: 'y', 
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true 
            }
        }
    };

    const barCtx = document.getElementById('barChart').getContext('2d');
    const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    const secondBarCtx = document.getElementById('secondBarChart').getContext('2d');

    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: options
    });

    const doughnutChart = new Chart(doughnutCtx, {
        type: 'doughnut',
        data: doughnutData,
        options: options
    });

    const lineChart = new Chart(lineCtx, {
        type: 'line',
        data: lineData,
        options: options
    });

    const secondBarChart = new Chart(secondBarCtx, {
        type: 'bar',
        data: secondBarData,
        options: options
    });
</script>
</body>
</html>
