<?php
require_once '../dbConfig/dbconnect.php';
require_once '../functions/header.php';
require_once '../authentication/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $unitIDs = explode("\n", $_POST['unit_ID']);
    $newHandlers = explode("\n", $_POST['new_handler']);
    $reasons = explode("\n", $_POST['reason']);

    $equipment_ID = $_POST['equipment_ID'];
    $user_ID = $_POST['user_ID'];

    $timestamp = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO transfer_unit (timestamp, equipment_ID, user_ID, unit_ID, new_handler, reason) VALUES (?, ?, ?, ?, ?, ?)");

    for ($i = 0; $i < count($unitIDs); $i++) {
        if (!empty($unitIDs[$i]) && !empty($newHandlers[$i]) && !empty($reasons[$i])) {
            $stmt->bind_param("siiiss", $timestamp, $equipment_ID, $user_ID, $unitIDs[$i], $newHandlers[$i], $reasons[$i]);
            $stmt->execute();
        }
    }
    $stmt->close();
}

$userID = $_SESSION['user_id']; 
$userInfo = getUserInfo($conn, $userID); 
$role = $userInfo['role'];

if ($role === 'user') {
    header("Location: ../user panel/reportSent.php?id={$userID}");
    exit();
} else {
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
