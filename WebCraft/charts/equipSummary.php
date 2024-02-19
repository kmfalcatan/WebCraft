<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Summary</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .outer-container {
            overflow-x: auto;
            white-space: nowrap;
            width: 80%;
            padding: 1.25rem 0;
            margin: auto;
        }

        .equipment-container {
            display: inline-block;
            width: 12.5rem;
            margin: 0 1rem;
            padding: 1rem;
            background-color: #f4f4f4;
            border-radius: 0.5rem;
            text-align: center;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .equipment-container h3{
            font-size: 2rem;
        }

        .equipment-container:hover {
            transform: scale(1.1);
        }

        .enlarged {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .enlarged .equipment-container {
            width: 25rem;
            height: 18.75rem;
            transform: scale(1);
            z-index: 1001;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .enlarged .equipment-container h3 {
            font-size: 6rem;
            margin-bottom: 3rem;
        }

        .enlarged .equipment-container p {
            font-size: 2rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="outer-container">
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

        mysqli_close($conn);
        ?>
    </div>

    <div class="enlarged" style="display: none;">
        <div class="equipment-container"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const equipmentContainers = document.querySelectorAll('.equipment-container');
            const enlargedContainer = document.querySelector('.enlarged');

            equipmentContainers.forEach(container => {
                container.addEventListener('click', function() {
                    enlargedContainer.querySelector('.equipment-container').innerHTML = container.innerHTML;
                    enlargedContainer.style.display = 'flex';
                });
            });

            enlargedContainer.addEventListener('click', function() {
                this.style.display = 'none';
            });
        });
    </script>
</body>
</html>
