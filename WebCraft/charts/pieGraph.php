<?php
include_once "../dbConfig/dbconnect.php";

$query = "SELECT article, SUM(units) AS total_units FROM equipment GROUP BY article";
$result = mysqli_query($conn, $query);

$articleNames = [];
$unitPercentages = [];
$colors = [];

$totalUnits = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $totalUnits += $row['total_units'];
}

mysqli_data_seek($result, 0); 
while ($row = mysqli_fetch_assoc($result)) {
    $articleNames[] = $row['article'];
    $unitPercentages[] = ($row['total_units'] / $totalUnits) * 100;

    $grayShade = rand(50, 200); 
    $colors[] = "rgba($grayShade, $grayShade, $grayShade, 0.8)";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Summary</title>
  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 600px;
            height: 600px;
            margin: auto;
            border: 2px #000 solid;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <canvas id="equipmentChart" width="600" height="600"></canvas>
    </div>

    <script>
        const equipmentData = {
            labels: <?php echo json_encode($articleNames); ?>,
            datasets: [{
                label: 'Equipment Summary',
                data: <?php echo json_encode($unitPercentages); ?>,
                backgroundColor: <?php echo json_encode($colors); ?>,
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        };

        const ctx = document.getElementById('equipmentChart').getContext('2d');

        const equipmentChart = new Chart(ctx, {
            type: 'pie',
            data: equipmentData,
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right',
                        align: 'center',
                        labels: {
                            padding: 30,
                            boxWidth: 10,
                            usePointStyle: true,
                            pointStyle: 'circle',
                            font: {
                                size: 14,
                                weight: 'bold'
                            },
                            color: 'gray'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>