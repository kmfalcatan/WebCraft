<?php
require_once "/Web/Craft/dbConfig/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'] ?? '';
    $article = $_POST['article'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';
    $deployment = $_POST['deployment'] ?? '';
    $units = $_POST['units'] ?? '';
    $accountCode = $_POST['account_code'] ?? '';
    $propertyNumber = $_POST['property_number'] ?? '';
    $unitValue = $_POST['unit_value'] ?? '';
    $totalValue = $_POST['total_value'] ?? '';
    $remarks = $_POST['remarks'] ?? '';
    $yearReceived = $_POST['year_received'] ?? '';

    $warrantyStart = isset($_POST['warranty_start']) ? $_POST['warranty_start'] : '';
    $warrantyEnd = isset($_POST['warranty_end']) ? $_POST['warranty_end'] : '';
    $budget = isset($_POST['budget']) ? $_POST['budget'] : '';
    $instruction = isset($_POST['instruction']) ? $_POST['instruction'] : '';

    $stmt = $conn->prepare("INSERT INTO equipment (user, article, description, image, deployment, units, account_code, property_number, unit_value, total_value, remarks, year_received, warranty_start, warranty_end, budget, instruction, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp())");
    $stmt->bind_param("ssssssssssssssss", $user, $article, $description, $image, $deployment, $units, $accountCode, $propertyNumber, $unitValue, $totalValue, $remarks, $yearReceived, $warrantyStart, $warrantyEnd, $budget, $instruction);

    if ($stmt->execute()) {
        header("Location: /Web/Craft/adminPanel/dashboard.php");
        exit();
    } else {
        echo "Error executing the SQL statement: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
