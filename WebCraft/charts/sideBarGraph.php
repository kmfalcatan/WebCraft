<?php
include_once "../dbConfig/dbconnect.php";

$query = "SELECT e.article, SUM(b.budget) AS total_budget_spent, e.total_value
          FROM equipment e
          LEFT JOIN budget b ON e.article = b.equipment_name
          GROUP BY e.article";

$result = mysqli_query($conn, $query);

$equipmentNames = [];
$totalBudgetSpent = [];
$totalBudget = [];

while ($row = mysqli_fetch_assoc($result)) {
    $equipmentNames[] = $row['article'];
    $totalBudgetSpent[] = $row['total_budget_spent'];
    $totalBudget[] = $row['total_value'];
}

$queryTotal = "SELECT SUM(b.budget) AS total_budget_spent_all
               FROM budget b";

$resultTotal = mysqli_query($conn, $queryTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$totalBudgetSpentAll = $rowTotal['total_budget_spent_all'];

mysqli_close($conn);
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
            max-width: 600px; 
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer; 
            transition: all 0.3s; 
        }
        .container.full-size {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            max-width: none;
            margin: 0;
            padding: 20px;
            border-radius: 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            margin-top: 3rem;
        }
        canvas {
            width: 100%; 
            max-height: 400px; 
            margin-top: 10px; 
        }
    </style>
</head>
<body>
<div class="container" onclick="toggleFullScreen(this)">
    <h1>Equipment Budget Analytics</h1>
    <canvas id="budgetAnalyticsChart"></canvas>
    <p>Total Budget Spent for Maintenance: <?php echo $totalBudgetSpentAll; ?></p>
</div>

<script>
    const equipmentBudgetData = {
        labels: <?php echo json_encode($equipmentNames); ?>,
        datasets: [{
            label: 'Total Budget Spent',
            data: <?php echo json_encode($totalBudgetSpent); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.5)', 
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Total Budget',
            data: <?php echo json_encode($totalBudget); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.5)', 
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    const options = {
        indexAxis: 'y', 
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                beginAtZero: true
            }
        }
    };

   
    const ctx = document.getElementById('budgetAnalyticsChart').getContext('2d');

    const budgetAnalyticsChart = new Chart(ctx, {
        type: 'bar',
        data: equipmentBudgetData,
        options: options
    });
    
    function toggleFullScreen(container) {
        container.classList.toggle('full-size');
    }
</script>
</body>
</html>
