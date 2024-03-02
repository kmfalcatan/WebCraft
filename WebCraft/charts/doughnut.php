<?php
include_once "../dbConfig/dbconnect.php";

$query = "SELECT article, total_value FROM equipment";

$result = mysqli_query($conn, $query);

$equipmentNames = [];
$equipmentBudgets = [];

while ($row = mysqli_fetch_assoc($result)) {
    $equipmentNames[] = $row['article'];
    $equipmentBudgets[] = $row['total_value'];
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
            max-width: 300px; 
            max-height: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer; 
            transition: all 0.3s; 
            position: relative; 
        }
        /* .container.full-size {
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
        } */
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            margin-top: 3rem;
        }
        canvas {
            width: 100%; 
            max-width: 30rem;
            max-height: 300px; 
            border: 1px solid #000;
        }
        .chart-center {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, 40%);
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- <div class="container">
        <h3>Equipment Budget Analytics</h3> -->
        <canvas id="equipmentBudgetChart"></canvas>
            <div class="chart-center">
                <h3>Total: <br><?php echo array_sum($equipmentBudgets); ?></h3>
            </div>
    </div>

    <script>
        const equipmentBudgetData = {
            // labels: <?php echo json_encode($equipmentNames); ?>,
            datasets: [{
            data: <?php echo json_encode($equipmentBudgets); ?>,
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

        const options = {
            responsive: true,
            maintainAspectRatio: false
        };

        const ctx = document.getElementById('equipmentBudgetChart').getContext('2d');
        const equipmentBudgetChart = new Chart(ctx, {
            type: 'doughnut',
            data: equipmentBudgetData,
            options: options
        });
    </script>
</body>
</html>