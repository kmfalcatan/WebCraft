<?php
include_once "../dbConfig/dbconnect.php";

$approved_ID = $_GET['approved_ID'] ?? null;

$user_ID = null;
$unit_ID = null;
$unit_issue = null;
$article = null;
$problem_desc = null;

    if ($approved_ID) {
        $query = "SELECT user_ID, unit_ID, unit_issue, problem_desc, article FROM approved_report WHERE approved_ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $approved_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row_approved = $result->fetch_assoc();
            $user_ID = $row_approved['user_ID'];
            $unit_ID = $row_approved['unit_ID'];
            $unit_issue = $row_approved['unit_issue'];
            $problem_desc = $row_approved['problem_desc'];
            $article = $row_approved['article'];

        $query_users = "SELECT fullname FROM users WHERE id = ?";
        $stmt_users = $conn->prepare($query_users);
        $stmt_users->bind_param("i", $user_ID);
        $stmt_users->execute();
        $result_users = $stmt_users->get_result();

        if ($result_users && $result_users->num_rows > 0) {
            $row_users = $result_users->fetch_assoc();
            $fullname = $row_users['fullname'];
        }

        $query_equipment = "SELECT deployment, description, property_number, account_code, image FROM equipment WHERE article = ?";
        $stmt_equipment = $conn->prepare($query_equipment);
        $stmt_equipment->bind_param("s", $article);
        $stmt_equipment->execute();
        $result_equipment = $stmt_equipment->get_result();

        if ($result_equipment && $result_equipment->num_rows > 0) {
            $row_equip = $result_equipment->fetch_assoc();
            $deployment = $row_equip['deployment'];
            $description = $row_equip['description'];
            $property_number = $row_equip['property_number'];
            $account_code = $row_equip['account_code'];
            $image_url = $row_equip['image'];
        }
    }
}
?>