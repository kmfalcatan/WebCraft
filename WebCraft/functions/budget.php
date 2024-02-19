<?php
include_once "../dbConfig/dbconnect.php";


if (!isset($_GET['request_ID']) || empty($_GET['request_ID'])) {
    echo "Request ID is not provided.";
    exit();
}

$requestID = $_GET['request_ID'];
$query = "SELECT * FROM approved_requests WHERE request_ID = $requestID";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $equipmentName = $row['equipment_name'];
    $dateApproved = $row['date_approved'];
    $detailsOfEquipment = $row['details_of_equipment'];
    $budget = $row['budget'];

    $unitQuery = "SELECT unit_ID FROM appointment WHERE request_ID = $requestID";
    $unitResult = $conn->query($unitQuery);
    $unitRow = $unitResult->fetch_assoc();
    $unit_ID = $unitRow['unit_ID'];

    $appointmentQuery = "SELECT fullname FROM appointment WHERE request_ID = $requestID";
    $appointmentResult = $conn->query($appointmentQuery);
    $appointmentRow = $appointmentResult->fetch_assoc();
    $requestedBy = $appointmentRow['fullname'];

    $maintenanceQuery = "SELECT admin_name FROM maintenance_contact WHERE request_ID = $requestID";
    $maintenanceResult = $conn->query($maintenanceQuery);
    $maintenanceRow = $maintenanceResult->fetch_assoc();
    $approvedBy = $maintenanceRow['admin_name'];
    
} else {
    echo "No record found for the provided Request ID.";
    exit();
}

$requestPrefix = 'REQ';
$defaultrequestID = '0000';
$requestID = $requestPrefix . '-' . str_pad($requestID, strlen($defaultrequestID), '0', STR_PAD_LEFT);

?>