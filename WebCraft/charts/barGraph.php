<?php
include_once "../dbConfig/dbconnect.php";

$query = "SELECT article, SUM(units) AS units FROM equipment GROUP BY article";
$result = mysqli_query($conn, $query);

$articleNames = [];
$unitPercentages = [];
$colors = [];

$totalUnits = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $totalUnits += $row['units'];
}

mysqli_data_seek($result, 0); 
while ($row = mysqli_fetch_assoc($result)) {
    $articleNames[] = $row['article'];
    $unitPercentages[] = ($row['units'] / $totalUnits) * 100;

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
    <title>Equipment Summary</title>

    <style>
        .container {
            width: 800px;
            height: 600px;
            margin: auto;
            position: relative; 
            border: 1px solid #ccc;
        }

        #barGraph {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
        <canvas id="barGraph" width="800" height="300"></canvas>

    <script>
        const equipmentData = {
            labels: <?php echo json_encode($articleNames); ?>,
            datasets: [{
                label: 'Equipment Summary',
                data: <?php echo json_encode($unitPercentages); ?>,
                backgroundColor: <?php echo json_encode($colors); ?>,
                borderColor: <?php echo json_encode($borderColors); ?>, 
                borderWidth: 1
            }]
        };

        const ctx = document.getElementById('barGraph').getContext('2d');
        const barGraph = new Chart(ctx, {
            type: 'bar',
            data: equipmentData,
            options: {
                responsive: true, 
                maintainAspectRatio: false, 
                scales: {
                    y: {
                        beginAtZero: true 
                    }
                }
            }
        });

        let isDragging = false;
        let offsetX, offsetY;
        const container = document.getElementById('container');

        container.addEventListener('mousedown', function (e) {
            isDragging = true;
            offsetX = e.clientX - container.getBoundingClientRect().left;
            offsetY = e.clientY - container.getBoundingClientRect().top;
        });

        document.addEventListener('mousemove', function (e) {
            if (isDragging) {
                const x = e.clientX - offsetX;
                const y = e.clientY - offsetY;
                container.style.left = `${x}px`;
                container.style.top = `${y}px`;
            }
        });

        document.addEventListener('mouseup', function () {
            isDragging = false;
        });
    </script>
</body>
</html>
