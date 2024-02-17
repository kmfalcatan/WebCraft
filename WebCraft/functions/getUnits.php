<?php
// Include database connection
include_once "../dbConfig/dbconnect.php";

// Check if article is provided
if (isset($_GET['article'])) {
    $article = $_GET['article'];
    
    // Prepare SQL statement to fetch units for the selected article
    $sql = "SELECT unit_ID FROM units WHERE equipment_ID = (SELECT equipment_ID FROM equipment WHERE article = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $article);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch units into an array
    $units = array();
    while ($row = $result->fetch_assoc()) {
        // Format unit_ID with prefix and leading zeros
        $unitPrefix = 'UNIT';
        $defaultUnitID = '0000';
        $unitID = $unitPrefix . '-' . str_pad($row['unit_ID'], strlen($defaultUnitID), '0', STR_PAD_LEFT);
        // Add formatted unit_ID to the row
        $row['unit_ID'] = $unitID;
        $units[] = $row;
    }
    
    // Return units as JSON
    echo json_encode($units);
} else {
    // Return empty array if article is not provided
    echo json_encode(array());
}
?>
