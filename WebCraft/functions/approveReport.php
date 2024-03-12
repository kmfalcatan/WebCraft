<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["approve"])) {
    $user_ID = $_POST['user_ID'];
    $article = $_POST['article'];
    $unit_IDs = $_POST['unit_ID'] ?? [];
    $unit_issues = $_POST['unit_issue'] ?? [];

    $stmt_insert = $conn->prepare("INSERT INTO approved_report (user_ID, article, unit_ID, unit_issue) VALUES (?, ?, ?, ?)");
    $stmt_insert->bind_param("isss", $user_ID, $article, $unit_ID, $unit_issue);

    foreach ($unit_IDs as $index => $unit_ID) {
        $unit_issue = $unit_issues[$index] ?? null;
        $stmt_insert->execute();

        // Extract unit_ID
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

        $stmt_update_status = $conn->prepare("UPDATE unit_report SET status = 'Your report has been approved.' WHERE unit_ID = ? ");
        $stmt_update_status->bind_param("s", $unit_ID);
        $stmt_update_status->execute();
    }

    $stmt_insert->close();

    header("Location: ../admin panel/bin.php?id={$userID}");
    exit();
}
?>