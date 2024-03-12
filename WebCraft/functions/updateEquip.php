<?php
include_once "../dbConfig/dbconnect.php";
include_once "../functions/header.php";
include_once "../authentication/auth.php";

$equipment_ID = isset($_GET['equipment_ID']) ? $_GET['equipment_ID'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article = $_POST['article'];
    $deployment = $_POST['deployment'];
    $property_number = $_POST['property_number'];
    $account_code = $_POST['account_code'];
    $unit_value = $_POST['unit_value'];
    $total_value = $_POST['total_value'];
    $remarks = $_POST['remarks'];
    $description = $_POST['description'];

    $sql = "UPDATE equipment SET 
            article = '$article',
            deployment = '$deployment',
            property_number = '$property_number',
            account_code = '$account_code',
            unit_value = '$unit_value',
            total_value = '$total_value',
            remarks = '$remarks',
            description = '$description'
            WHERE equipment_ID = '$equipment_ID'";

            $userInfo = getUserInfo($conn, $userID);
            $role = $userInfo['role'];

            if ($role === 'admin') {
                header("Location: ../admin panel/equipOtherInfo.php?equipment_ID={$equipment_ID}&id={$userID}");
            } else {
                header("Location: ../user panel/equipOtherInfo.php?equipment_ID={$equipment_ID}&id={$userID}");
            }
            exit();
        }

    function getUserUnitInfo($conn, $article) {
        $userInfo = array();
        $sql = "SELECT user, units_handled FROM user_unit WHERE article = '$article'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userInfo[] = array(
                    'user' => $row['user'],
                    'units_handled' => $row['units_handled']
                );
            }
        }
        return $userInfo;
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
        $units = $row['total_unit'];
        $unit_value = $row['unit_value'];
        $total_value = $row['total_value'];
        $remarks = $row['remarks'];
        $description = $row['description'];
        $instruction = $row['instruction'];
    
        $userInfo = getUserUnitInfo($conn, $article);
    } else {
    }
?>
