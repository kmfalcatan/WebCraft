<?php
require_once "/WebCraft/dbConfig/dbconnect.php";

$image = isset($_POST['image']) ? $_POST['image'] : '';
$userName = isset($_POST['user_name']) ? $_POST['user_name'] : '';
$article = isset($_POST['article']) ? $_POST['article'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$propertyNumber = isset($_POST['property_number']) ? $_POST['property_number'] : '';
$accountCode = isset($_POST['account_code']) ? $_POST['account_code'] : '';
$units = isset($_POST['units']) ? $_POST['units'] : '';
$unitValue = isset($_POST['unit_value']) ? $_POST['unit_value'] : '';
$totalValue = isset($_POST['total_value']) ? $_POST['total_value'] : '';
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';
$otherInformation = isset($_POST['other_information']) ? $_POST['other_information'] : '';

$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = '/WebCraft/uploads/';
    $targetFile = $targetDir . basename($_FILES['image']['name']); 

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
     
        if ($stmt = $conn->prepare("INSERT INTO equipment (image, user_name, article, description, property_number, account_code, units, unit_value, total_value, remarks, other_information) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $stmt->bind_param("sssssssssss", $targetFile, $userName, $article, $description, $propertyNumber, $accountCode, $units, $unitValue, $totalValue, $remarks, $otherInformation);
            if ($stmt->execute()) {
                $successMessage = "Equipment added successfully!";
                header("Location: /WebCraft/adminPanel/dashboard.php");
                exit();
            } else {
                echo "Error executing the SQL statement: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing the SQL statement: " . $conn->error;
        }
    } else {
        
        echo "Error uploading image.";
    }
}

$conn->close();
?>