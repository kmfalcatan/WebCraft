<?php
    include_once "../dbConfig/dbconnect.php";
    include_once "../authentication/auth.php";

    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM equipment WHERE article LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1; 
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-year='{$row['year_received']}' onclick=\"location.href='../user panel/viewEquip.php?equipment_ID={$row['equipment_ID']}&id={$userID}'\">";
            echo "<td>{$count}</td>";
            echo "<td>{$row['article']}</td>";
            // echo "<td>{$row['description']}</td>";
            // echo "<td>{$row['deployment']}</td>";
            // echo "<td>{$row['user']}</td>";
            echo "<td>{$row['property_number']}</td>";
            echo "<td>{$row['account_code']}</td>";
            echo "<td>{$row['units']}</td>";
            echo "<td>{$row['unit_value']}</td>";
            echo "<td>{$row['total_value']}</td>";
            echo "<td>{$row['remarks']}</td>";
            echo "<td class='actionContainer' style='display: flex;'>";
            echo "<a href='../user panel/equipOtherInfo.php?equipment_ID={$row['equipment_ID']}&id={$userID}'>
                    <img src='../assets/img/view.png' alt='View' class='action-img' style='width: 2.5rem; height: 1.rem;'>
                    </a>";
            // echo "<img src='../assets/img/trash.png' alt='View' class='action-img' style='width: 1.7rem; height: 1.7rem;'>";
            echo "</td>";
            echo "</tr>";
            $count++; 
        }
    } else {
        // No results found
        echo "<tr><td colspan='11'>No results found</td></tr>";
    }

    $conn->close();
?>