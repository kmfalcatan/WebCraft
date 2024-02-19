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
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Distribution by Year Received</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 800px; height: 600px; margin: auto;">
        <canvas id="equipmentLineChart" width="400" height="400"></canvas>
    </div>

    <script>
        const equipmentData = {
            labels: <?php echo json_encode($yearsReceived); ?>,
            datasets: [{
                label: 'Equipment Distribution by Year Received',
                data: <?php echo json_encode($equipmentCounts); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', 
                borderColor: 'rgba(54, 162, 235, 1)', 
                borderWidth: 2,
                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                pointRadius: 5,
                pointHoverRadius: 7, 
            }]
        };

        const ctx = document.getElementById('equipmentLineChart').getContext('2d');

        const equipmentLineChart = new Chart(ctx, {
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
