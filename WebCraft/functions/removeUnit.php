<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";

if (isset($_POST['approve'])) {
    $user_ID = $_POST['user_ID'];
    $unit_ID = $_POST['unit_ID'];
    $article = $_POST['article'];
    $unit_issue = $_POST['unit_issue'];
    $problem_desc = $_POST['problem_desc'];

    $query = "INSERT INTO approved_report (user_ID, unit_ID, article, unit_issue, problem_desc) VALUES ('$user_ID', '$unit_ID', '$article', '$unit_issue', '$problem_desc')";
    $result = mysqli_query($conn, $query);

    $unit_ID_numeric = intval(substr($unit_ID, 5));

        $stmt_get_equipment_id = $conn->prepare("SELECT equipment_ID FROM units WHERE unit_ID = ?");
        $stmt_get_equipment_id->bind_param("i", $unit_ID_numeric);
        $stmt_get_equipment_id->execute();
        $stmt_get_equipment_id->bind_result($equipment_ID);
        $stmt_get_equipment_id->fetch();
        $stmt_get_equipment_id->close();

        $stmt_delete = $conn->prepare("DELETE FROM units WHERE unit_ID = ?");
        $stmt_delete->bind_param("i", $unit_ID_numeric);
        $stmt_delete->execute();

        $stmt_update_total_unit = $conn->prepare("UPDATE equipment SET total_unit = total_unit - 1 WHERE equipment_ID = ?");
        $stmt_update_total_unit->bind_param("i", $equipment_ID);
        $stmt_update_total_unit->execute();


    header("Location: ../admin panel/bin.php?id={$userID}");
    exit();
}
?>