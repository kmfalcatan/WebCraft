<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";


$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;

function retrieveUnitInfo($conn, $unit_ID)
{
    $unitInfo = array();
    
    $query = "SELECT units.unit_ID, units.equipment_name, units.status, equipment.image 
              FROM units 
              JOIN equipment ON units.equipment_ID = equipment.equipment_ID
              WHERE units.unit_ID = '$unit_ID'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $unitInfo['unit_ID'] = $row['unit_ID'];
        $unitInfo['equipment_name'] = $row['equipment_name'];
        $unitInfo['status'] = $row['status'];
        $unitInfo['image'] = '../uploads/' . $row['image'];
    }
    
    return $unitInfo;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unit_ID = $_POST['unit_ID'];
    $status = $_POST['status'];
    
    $updateStatusQuery = "UPDATE units SET status = '$status' WHERE unit_ID = '$unit_ID'";
    if ($conn->query($updateStatusQuery) === TRUE) {
        echo "Status updated successfully";
        
        $userInfo = getUserInfo($conn, $userID);
        $role = $userInfo['role'];

        if ($role === 'admin') {
            header("Location: ../admin panel/viewEquip.php?equipment_ID={$equipment_ID}&id={$userID}");
        } else {
            header("Location: ../user panel/viewEquip.php?equipment_ID={$equipment_ID}&id={$userID}");
        }
        exit();
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

$unit_ID = isset($_GET['unit_ID']) ? $_GET['unit_ID'] : null;
$unitInfo = retrieveUnitInfo($conn, $unit_ID);
$equipment_name = $unitInfo['equipment_name'];
$status = $unitInfo['status'];
$image = $unitInfo['image'];


?>