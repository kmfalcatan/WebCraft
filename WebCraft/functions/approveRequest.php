<?php
include_once "../dbConfig/dbconnect.php";

function approveRequest($conn, $userID, $requestID, $equipImg, $equipmentName, $budget, $detailsOfEquipment) {
    $stmt = $conn->prepare("INSERT INTO approved_requests (request_ID, equip_img, equipment_name, budget, details_of_equipment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $requestID, $equipImg, $equipmentName, $budget, $detailsOfEquipment);
    $stmt->execute();
    $stmt->close();

    $updateStmt = $conn->prepare("UPDATE appointment SET status = 'processing' WHERE request_ID = ?");
    $updateStmt->bind_param("i", $requestID);
    $updateStmt->execute();
    $updateStmt->close();

     $updateStmt = $conn->prepare("UPDATE appointment SET status = 'approved' WHERE request_ID = ?");
     $updateStmt->bind_param("i", $requestID);
     $updateStmt->execute();
     $updateStmt->close();

    header("Location: budget.php?id=$userID");
    exit();
}

if (!isset($_GET['request_ID']) || !($row = $conn->query("SELECT * FROM appointment WHERE request_ID = {$_GET['request_ID']}")->fetch_assoc())) {
    echo "Request ID is not provided or no appointment found with the provided ID.";
    exit();
}

$equipment_name = $row['article'] ?? '';
$date_of_appointment = $row['date_request'] ?? '';
$details_of_equipment = $row['description'] ?? '';

$budgetResult = $conn->query("SELECT * FROM budget WHERE request_ID = {$_GET['request_ID']}");
$budgetRow = $budgetResult->fetch_assoc();
$budget = $budgetRow['budget'] ?? '';

$maintenanceResult = $conn->query("SELECT * FROM maintenance_contact WHERE request_ID = {$_GET['request_ID']}");
$maintenanceRow = $maintenanceResult->fetch_assoc();
$admin_name = $maintenanceRow['admin_name'] ?? '';
$admin_contact = $maintenanceRow['admin_contact'] ?? '';
$maintenance_name = $maintenanceRow['maintenance_name'] ?? '';
$maintenance_email = $maintenanceRow['maintenance_email'] ?? '';
$contact_number = $maintenanceRow['contact_number'] ?? '';

if (isset($_POST['approve'])) {
    approveRequest($conn, $userID, $_GET['request_ID'], $row['equip_img'], $equipment_name, $budget, $details_of_equipment);
}

if (!empty($equipment_name) && !empty($date_of_appointment) && !empty($details_of_equipment) && !empty($budget) && !empty($admin_name) && !empty($admin_contact) && !empty($maintenance_name) && !empty($maintenance_email) && !empty($contact_number)) {
    $updateStmt = $conn->prepare("UPDATE appointment SET status = 'processing' WHERE request_ID = ?");
    $updateStmt->bind_param("i", $_GET['request_ID']);
    $updateStmt->execute();
    $updateStmt->close();
}

?>