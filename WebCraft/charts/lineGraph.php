<?php
include_once "../dbConfig/dbconnect.php";

$query = "SELECT year_received, COUNT(*) AS equipment_count FROM equipment GROUP BY year_received";
$result = mysqli_query($conn, $query);

$yearsReceived = [];
$equipmentCounts = [];
$colors = [];

$pieChartColors = ['#ff7f0e', '#1f77b4', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf'];

while ($row = mysqli_fetch_assoc($result)) {
    $yearsReceived[] = $row['year_received'];
    $equipmentCounts[] = $row['equipment_count'];

    $colors[] = $pieChartColors[array_rand($pieChartColors)];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Distribution by Year Received</title>
    
</head>
<body>
    <canvas id="lineGraph" width="300" height="300"></canvas>

    <script>
        const equipmentData = {
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

        const ctx = document.getElementById('lineGraph').getContext('2d');

        const lineGraph = new Chart(ctx, {
            type: 'line',
            data: equipmentData,
            options: {
                responsive: false, 
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true 
                    }
                }
            }
        });
    </script>
</body>
</html>
