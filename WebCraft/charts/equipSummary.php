<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Summary</title>
    <style>

        .equipment-container {
            display: inline-block;
            height: 5rem;
            width: 50%;
            margin: 0 1rem;
            padding: 1rem 5rem;
            background-color: #fff;
            border-radius: 0.5rem;
            text-align: center;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.15s;
        }

        .equipment-container h3{
            font-size: 2rem;
        }

        .equipment-container:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
        <?php
        include_once "../dbConfig/dbconnect.php";

        $query = "SELECT article, SUM(units) AS total_units FROM equipment GROUP BY article";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $totalUnits = $row['total_units'];
            $articleName = $row['article'];
            echo "<div class='equipment-container'>";
            echo "<h3>$totalUnits</h3>";
            echo "<p>$articleName</p>";
            echo "</div>";
        }
        ?>

    <script>
    function animateNumberCount(start, end, duration, element) {
        let range = end - start;
        let current = start;
        let increment = end > start ? 1 : -1;
        let stepTime = Math.abs(Math.floor(duration / range));
        let timer = setInterval(function() {
            current += increment;
            element.innerHTML = current;
            if (current === end) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const equipmentContainers = document.querySelectorAll('.equipment-container');

        equipmentContainers.forEach(container => {
            let totalUnitsElement = container.querySelector('h3');
            let totalUnitsValue = parseInt(totalUnitsElement.innerText);
            animateNumberCount(0, totalUnitsValue, 2000, totalUnitsElement);
        });
    });
</script>

</body>
</html>
