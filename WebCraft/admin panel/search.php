<?php
    include_once "../dbConfig/dbconnect.php";

    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM equipment WHERE article LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-year='{$row['year_received']}'>";
            echo "<td>{$row['article']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['deployment']}</td>";
            echo "<td>{$row['user']}</td>";
            echo "<td>{$row['property_number']}</td>";
            echo "<td>{$row['account_code']}</td>";
            echo "<td>{$row['units']}</td>";
            echo "<td>{$row['unit_value']}</td>";
            echo "<td>{$row['total_value']}</td>";
            echo "<td>{$row['remarks']}</td>";
            echo "<td class='actionContainer'>";
            echo "<a href='../admin panel/viewEquip.php?equipment_ID={$row['equipment_ID']}'><button class='action'>View</button></a>";
            echo "<button class='action'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        // No results found
        echo "<tr><td colspan='11'>No results found</td></tr>";
    }

    $conn->close();
?>
