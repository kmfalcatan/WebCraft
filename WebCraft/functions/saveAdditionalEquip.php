<?php
require_once "/WebCraft/dbConfig/dbconnect.php";

$warrantyStart = isset($_POST['warranty_start']) ? $_POST['warranty_start'] : '';
$warrantyEnd = isset($_POST['warranty_end']) ? $_POST['warranty_end'] : '';
$budget = isset($_POST['budget']) ? $_POST['budget'] : '';
$instruction = isset($_POST['instruction']) ? $_POST['instruction'] : '';

$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO equipment (warranty_start, warranty_end, budget, instruction) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $warrantyStart, $warrantyEnd, $budget, $instruction);

    if ($stmt->execute()) {
        $successMessage = "Warranty information added successfully!";
        header("Location: /WebCraft/adminPanel/dashboard.php");
        exit();
    } else {
        echo "Error executing the SQL statement: " . $stmt->error;
        echo "SQL Query: INSERT INTO equipment (warranty_start, warranty_end, budget, instruction) VALUES ('$warrantyStart', '$warrantyEnd', '$budget', '$instruction')";
    }

    $stmt->close();
}

$conn->close();
?>
