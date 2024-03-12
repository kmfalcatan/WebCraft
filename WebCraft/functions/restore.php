<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";

$unitID = $_POST['unitID'];
$article = $_POST['article'];
$fullname = $_POST['fullname'];
$equipmentID = $_POST['equipmentID'];
$userID = $_POST['userID'];

$unitIDNumeric = (int)substr($unitID, strpos($unitID, '-') + 1);

$query_insert = "INSERT INTO units (unit_ID, equipment_name, user, equipment_ID) VALUES ('$unitIDNumeric', '$article', '$fullname', '$equipmentID')";
$result_insert = mysqli_query($conn, $query_insert);

if ($result_insert) {
    $query_update = "UPDATE equipment SET total_unit = total_unit + 1 WHERE equipment_ID = '$equipmentID'";
    $result_update = mysqli_query($conn, $query_update);

    if ($result_update) {
        $query_delete = "DELETE FROM approved_report WHERE unit_ID = '$unitID'";
        $result_delete = mysqli_query($conn, $query_delete);

        if ($result_delete) {
            header("Location: ../admin panel/viewEquip.php?equipment_ID={$equipmentID}&id={$userID}");
            exit();
        } else {
            echo "Failed to delete row from approved_report table: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to update total_unit in equipment table: " . mysqli_error($conn);
    }
} else {
    echo "Failed to insert data into units table: " . mysqli_error($conn);
}
?>