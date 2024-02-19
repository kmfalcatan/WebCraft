<?php
include_once "../dbConfig/dbconnect.php";

$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $article = $_POST['article'];
    $deployment = $_POST['deployment'];
    $property_number = $_POST['property_number'];
    $account_code = $_POST['account_code'];
    $new_units = $_POST['units'];
    $unit_value = $_POST['unit_value'];
    $total_value = $_POST['total_value'];
    $remarks = $_POST['remarks'];
    $description = $_POST['description'];

    $sqlOldUnits = "SELECT units FROM equipment WHERE equipment_ID = '$equipment_ID'";
    $resultOldUnits = $conn->query($sqlOldUnits);
    $rowOldUnits = $resultOldUnits->fetch_assoc();
    $old_units = $rowOldUnits['units'];

    $unitsDiff = $new_units - $old_units;

    $sql = "UPDATE equipment SET 
            user = '$user',
            article = '$article',
            deployment = '$deployment',
            property_number = '$property_number',
            account_code = '$account_code',
            units = '$new_units',
            unit_value = '$unit_value',
            total_value = '$total_value',
            remarks = '$remarks',
            description = '$description'
            WHERE equipment_ID = '$equipment_ID'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    if ($unitsDiff != 0) {
        $sqlEquipmentName = "SELECT article FROM equipment WHERE equipment_ID = '$equipment_ID'";
        $resultEquipmentName = $conn->query($sqlEquipmentName);
        $rowEquipmentName = $resultEquipmentName->fetch_assoc();
        $equipment_name = $rowEquipmentName['article'];

        if ($unitsDiff > 0) {
            for ($i = 0; $i < $unitsDiff; $i++) {
                $sqlInsertUnit = "INSERT INTO units (equipment_ID, equipment_name, status) VALUES ('$equipment_ID', '$equipment_name', 'Available')";
                if ($conn->query($sqlInsertUnit) !== TRUE) {
                    echo "Error adding unit: " . $conn->error;
                }
            }
        } else {
            $sqlDeleteUnits = "DELETE FROM units WHERE equipment_ID = '$equipment_ID' ORDER BY unit_ID DESC LIMIT " . abs($unitsDiff);
            if ($conn->query($sqlDeleteUnits) !== TRUE) {
                echo "Error deleting units: " . $conn->error;
            }
        }
    }

    header("Location: ../admin panel/EquipOtherInfo.php?equipment_ID=" . $equipment_ID);
    exit();
}

$sql = "SELECT * FROM equipment WHERE equipment_ID = '$equipment_ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageFilename = $row['image'];
    $imageURL = "../uploads/" . $imageFilename;
    $user = $row['user'];
    $article = $row['article'];
    $deployment = $row['deployment'];
    $property_number = $row['property_number'];
    $account_code = $row['account_code'];
    $units = $row['units'];
    $unit_value = $row['unit_value'];
    $total_value = $row['total_value'];
    $remarks = $row['remarks'];
    $description = $row['description'];
} else {
}
?>
