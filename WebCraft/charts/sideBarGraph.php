<?php
include_once "../dbConfig/dbconnect.php";

$query = "SELECT e.article, COALESCE(SUM(b.budget), 0) AS total_budget_spent, e.budget
          FROM equipment e
          LEFT JOIN budget b ON e.article = b.equipment_name
          GROUP BY e.article";

$result = mysqli_query($conn, $query);

$equipmentNames = [];
$totalBudgetSpent = [];
$remainingBudget = [];

while ($row = mysqli_fetch_assoc($result)) {
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
</div>

<script>
    const equipmentBudgetData = {
        labels: <?php echo json_encode($equipmentNames); ?>,
        datasets: [{
            label: 'Maintenance Budget Spent',
            data: <?php echo json_encode($totalBudgetSpent); ?>,
            backgroundColor: 'rgba(200, 200, 200, 0.8)', 
            borderWidth: 1
        }, {
            label: 'Remaining Budget',
            data: <?php echo json_encode($remainingBudget); ?>,
            backgroundColor: 'rgba(10, 10, 10, 0.5)', 
            borderColor: 'rgba(200, 200, 200, 1)',
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
    
    // function toggleFullScreen(container) {
    //     container.classList.toggle('full-size');
    // }
</script>
</body>
</html>
