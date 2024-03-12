<?php
include_once '../dbConfig/dbconnect.php';
include_once '../functions/header.php';
include_once '../authentication/auth.php';

$userID = $_SESSION['user_id'];

$reportQuery = "SELECT DISTINCT timestamp, report_ID FROM unit_report WHERE user_ID = '$userID'";
$reportResult = mysqli_query($conn, $reportQuery);

if (mysqli_num_rows($reportResult) > 0) {
    $row = mysqli_fetch_assoc($reportResult);
    $timestamp = $row['timestamp'];
    $reportID = $row['report_ID'];

    echo "Timestamp: " . $timestamp;

} else {
    echo "No report found.";
}

$imageQuery = "SELECT profile_img FROM users WHERE id = '$userID'";
$imageResult = mysqli_query($conn, $imageQuery);

if (mysqli_num_rows($imageResult) > 0) {
    $row = mysqli_fetch_assoc($imageResult);
    $image = $row['profile_img'];

    echo "<br>Profile Image: <img src='../uploads/" . ($image ? $image : 'placeholder.jpg') . "' alt='Profile Image'>";
} else {
    echo "<br>Profile image not found.";
}

mysqli_close($conn);
?>