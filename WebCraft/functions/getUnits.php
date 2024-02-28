<?php
include_once "../dbConfig/dbconnect.php";

if (isset($_GET['article'])) {
    $article = $_GET['article'];
    
    $sql = "SELECT unit_ID FROM units WHERE equipment_ID = (SELECT equipment_ID FROM equipment WHERE article = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $article);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $units = array();
    while ($row = $result->fetch_assoc()) {
        $unitPrefix = 'UNIT';
        $defaultUnitID = '0000';
        $unitID = $unitPrefix . '-' . str_pad($row['unit_ID'], strlen($defaultUnitID), '0', STR_PAD_LEFT);
       
        $row['unit_ID'] = $unitID;
        $units[] = $row;
    }
    
    echo json_encode($units);
} else {
    echo json_encode(array());
}
?>
